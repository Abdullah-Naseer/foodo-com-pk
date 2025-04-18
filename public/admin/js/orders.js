$(function () {
    let $table = $("#ordersDataTable");
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
            { data: "name", name: "name" },
             { data: "email", name: "email" },
            { data: "phone", name: "phone" },
            { data: "delivery_address", name: "delivery_address" },
            { data: "start_date", name: "start_date" },
            { data: "persons", name: "persons" },
            { data: "details", name: "details" },
            {
                data: "status",
                name: "status",
                render: function (data, type, row) {
                    const isDisabled = data === "completed" ? "disabled" : "";
                    return `
                        <select class="form-select order-status" data-order-id="${
                            row.id
                        }" ${isDisabled}>
                            <option value="pending" ${
                                data === "pending" ? "selected" : ""
                            }>Pending</option>
                            <option value="in-progress" ${
                                data === "in-progress" ? "selected" : ""
                            }>In Progress</option>
                            <option value="completed" ${
                                data === "completed" ? "selected" : ""
                            }>Completed</option>
                            <option value="cancelled" ${
                                data === "cancelled" ? "selected" : ""
                            }>Cancelled</option>
                        </select>
                    `;
                },
                searchable: false,
                orderable: false,
            },
            {
                data: "action",
                name: "action",
                searchable: false,
                orderable: false,
                 render: function (data, type, row) {
                    return row.status === "completed" ? "" : data;
                },
            },
        ],
        processing: true,
        serverSide: true,
        ajax: "",
    });

    $table.on("change", ".order-status", async function () {
        const orderId = $(this).data("order-id");
        const newStatus = $(this).val();

        let result = await swal.fire({
            title: "Are you sure?",
            text: "You want to change the status!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes!",
        });
        if (result.value) {
            $.ajax({
                url: `/admin/update-order-status/${orderId}`,
                type: "GET",
                data: { status: newStatus },
                success: function (response) {
                    Swal.fire({
                        title: "Success!",
                        text: response.message,
                        icon: "success",
                    });
                    table.ajax.reload();
                },
                error: function (xhr) {
                    Swal.fire({
                        title: "Error!",
                        text: "Failed to update status. Please try again.",
                        icon: "error",
                    });
                    console.error(xhr.responseJSON);
                },
            });
        }
    });
});
