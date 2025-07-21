$(function () {
    let $table = $('#categoryDataTable');
    let table = $table.DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "order": [[0, "asc"]],
        "columns"   : [
         {
                data: null,
                name: "id",
                searchable: false,
                render: function (data, type, row, meta) {
                    return meta.row + 1 + meta.settings._iDisplayStart;
                },
            },
            {data: 'name', name: 'name'},
            {data: 'action', name: 'action',searchable: false ,  bSortable: false}
        ],
        "processing": true,
        "serverSide": true,
        "ajax": ""
    });
});
