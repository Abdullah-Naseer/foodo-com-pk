$(function () {
    let $table = $("#menusDataTable");
    let table = $table.DataTable({
        paging: true,
        lengthChange: true,
        searching: true,
        ordering: true,
        info: true,
        autoWidth: false,
        order: [[0, "asc"]],
        columns: [
            {
                data: null,
                name: "id",
                searchable: false,
                render: function (data, type, row, meta) {
                    return meta.row + 1 + meta.settings._iDisplayStart;
                },
            },
            { data: "name", name: "name" },
            { data: "type", name: "type" },
            { data: "week", name: "week" },
            { data: "day", name: "day" },
            { data: "image", name: "image" },
            {
                data: "action",
                name: "action",
                searchable: true,
                bSortable: false,
            },
        ],
        processing: true,
        serverSide: true,
        ajax: "",
    });
});

$(".standart-menu-form").on("submit", async function (e) {
    e.preventDefault();

    let $form = $(this);
    let $submitBtn = $form.find('button[type="submit"]');
    let formData = new FormData(this);

    try {
        $submitBtn.prop("disabled", true).html(`<i class="fas fa-spinner fa-spin"></i> Uploading...`);

        let response = await $.ajax({
            type: $form.attr("method"),
            url: $form.attr("action"),
            data: formData,
            processData: false,
            contentType: false,
            dataType: "json",
            beforeSend: function () {
                $(".invalid-feedback").hide();
                $(".invalid").removeClass("invalid");
            },
            error: function (jqXHR) {
                let response = jqXHR.responseJSON;
                if (response?.errors) {
                    $.each(response.errors, function (field, value) {
                        $('.invalid-feedback[data-field="' + field + '"]', $form)
                            .text(value[0])
                            .show();
                        $('[name="' + field + '"]', $form).addClass("invalid");
                    });
                }
            },
        });

        if (response.success) {
            Swal.fire("Success!", response.message, "success").then(() => {
                if (response.reload) {
                    window.location.reload();
                }
                if (response.redirect) {
                    window.location.href = response.redirect;
                }
            });
        } else {
            Swal.fire("Error!", response.message, "error");
        }

    } catch (e) {
        console.error(e);
        Swal.fire("Error!", "Something went wrong.", "error");
    } finally {
        $submitBtn.prop("disabled", false).html("Save");
    }
});


// menu types
$(function () {
    let $table = $("#menuTypesDataTable");
    let table = $table.DataTable({
        paging: true,
        lengthChange: true,
        searching: true,
        ordering: true,
        info: true,
        autoWidth: false,
        order: [[0, "asc"]],
        columns: [
           {
                data: null,
                name: "id",
                searchable: false,
                render: function (data, type, row, meta) {
                    return meta.row + 1 + meta.settings._iDisplayStart;
                },
            },
            { data: "type", name: "type" },
            {
                data: "action",
                name: "action",
                searchable: false,
                bSortable: false,
            },
        ],
        processing: true,
        serverSide: true,
        ajax: "",
    });
});

$(document).ready(function () {
    $("#menu_type_id, #week").on("change", function () {
        const menuTypeId = $("#menu_type_id").val();
        const week = $("#week").val();

        if (menuTypeId && week) {
            $.ajax({
                url: "/admin/menus/available-days",
                method: "GET",
                data: {
                    menu_type_id: menuTypeId,
                    week: week,
                },
                success: function (response) {
                    $("#day")
                        .empty()
                        .append('<option value="">Select Day</option>');
                    response.availableDays.forEach((day) => {
                        $("#day").append(
                            `<option value="${day}">${day}</option>`
                        );
                    });
                },
            });
        }
    });

});
