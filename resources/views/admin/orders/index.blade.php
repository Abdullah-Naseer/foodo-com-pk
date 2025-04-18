@extends('layouts.admin')
@section('title', 'orders')


@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-3">All Orders</h1>
                @can('trash')
                    <a href="{{ route('admin.orders', ['trash' => request('trash') ? null : 'true']) }}"
                        class="btn {{ request('trash') ? 'btn-success' : 'btn-danger' }} me-2">
                        {{ request('trash') ? 'View All' : 'View Trash' }}
                    </a>
                @endcan
            </div>

            <div class="card card-solid">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="ordersDataTable" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Type</th>
                                    <th>Customer Name</th>
                                    <th>Customer Email</th>
                                    <th>Phone</th>
                                    <th>Delivery Adress</th>
                                    <th>Expected Start Date</th>
                                    <th>Persons</th>
                                    <th>Details</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
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
    <script src="{{ asset('public/admin/js/orders.js') }}"></script>
@endpush
