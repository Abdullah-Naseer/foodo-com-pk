@extends('layouts.admin')
@section('title', 'Budget & Profit - List')


@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h1 class="h3">All Budget & Profit</h1>
                <div>
                        <a href="{{ route('admin.budget.update') }}" class="btn btn-primary">Add New</a>
                </div>
            </div>
            <div class="card card-solid">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="categoryDataTable" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Client Name</th>
                                    <th>Package Name</th>
                                    <th>Amount Received</th>
                                    <th>Expense</th>
                                    <th>Profit</th>
                                    <th>Profit %</th>
                                    <th>Month</th>
                                    <th>Year</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection

@push('js')
    <script>
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
                    {data: 'client_name', name: 'client_name' ,searchable: false ,  bSortable: false},
                    {data: 'package_name', name: 'package_name' ,searchable: false ,  bSortable: false},
                    {data: 'amount_received', name: 'amount_received'},
                    {data: 'monthly_expense', name: 'monthly_expense'},
                    {data: 'profit', name: 'profit',searchable: false ,  bSortable: false},
                    {data: 'profit_percentage', name: 'profit_percentage',searchable: false ,  bSortable: false},
                    {data: 'month', name: 'month'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'action', name: 'action',searchable: false ,  bSortable: false}
                ],
                "processing": true,
                "serverSide": true,
                "ajax": ""
            });
        });
    </script>
@endpush
