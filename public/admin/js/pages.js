$(function () {
    let $table = $('#pagesDataTable');
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
            {data: 'title', name: 'title'},
            {data: 'meta_title', name: 'meta_title'},
            {data: 'meta_description', name: 'meta_description'},
            {data: 'meta_keywords', name: 'meta_keywords'},
            {data: 'status', name: 'status'},
            {data: 'action', name: 'action',searchable: false ,  bSortable: false}
        ],
        "processing": true,
        "serverSide": true,
        "ajax": ""
    });
});
