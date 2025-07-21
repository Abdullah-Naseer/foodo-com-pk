$(".standart-form").on("submit", async function (e) {
    e.preventDefault();

    let $form = $(this);
    let $submitBtn = $form.find('button[type="submit"]');
    let originalText = $submitBtn.html();
    $submitBtn.data("original-text", originalText);

    try {
        $submitBtn
            .prop("disabled", true)
            .html(`<i class="fas fa-spinner fa-spin"></i> Processing...`);

        let response = await $.ajax({
            type: $form.attr("method"),
            url: $form.attr("action"),
            data: $form.serialize(),
            dataType: "json",
            beforeSend: function () {
                $(".invalid-feedback").hide();
                $(".invalid").removeClass("invalid");
            },
            error: function (jqXHR) {
                let response = jqXHR.responseJSON;
                if (response?.errors) {
                    $.each(response.errors, function (field, value) {
                        $(
                            '.invalid-feedback[data-field="' + field + '"]',
                            $form
                        )
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
    } catch (error) {
        console.error(error);
        Swal.fire("Error!", "Something went wrong.", "error");
    } finally {
        $submitBtn
            .prop("disabled", false)
            .html($submitBtn.data("original-text"));
    }
});

$(document).on("click", ".removeItem", async function (e) {
    e.preventDefault();

    let $button = $(this);
    let $form = $button.closest("form");

    let result = await swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
    });

    if (result.value) {
        let response = await $.ajax({
            url: $form.attr("action"),
            type: "POST",
            data: $form.serialize(),
            success: function (response) {
                if (response.success) {
                    $form.closest("tr").remove();
                    swal.fire("Deleted!", "", "success");
                } else {
                    swal.fire("Error", response.message, "error");
                }
            },
            error: function () {
                swal.fire(
                    "Error!",
                    "There was an issue deleting this item.",
                    "error"
                );
            },
        });
    }
});

$(document).ready(function () {
    $(".select2").select2();
});
