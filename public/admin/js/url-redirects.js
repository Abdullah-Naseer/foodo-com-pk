$(function () {
    let $table = $('#UrlRedirectDataTable');
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
            {data: 'from_url', name: 'from_url'},
            {data: 'to_url', name: 'to_url'},
            {data: 'status', name: 'status'},
            {data: 'action', name: 'action',searchable: false ,  bSortable: false}
        ],
        "processing": true,
        "serverSide": true,
        "ajax": ""
    });
});
