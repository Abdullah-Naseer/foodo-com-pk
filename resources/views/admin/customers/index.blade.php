@extends('layouts.admin')
@section('title', 'Users')

@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div class="d-flex align-items-center justify-content-between mb-4">
                <h1 class="h3">All Customers</h1>
                <div>
                    <a href="{{ route('admin.customers.create') }}" class="btn btn-primary">Add New</a>
                </div>
            </div>


            <div class="card card-solid">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="customersDataTable" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Company</th>
                                    <th>Phone</th>
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
    <script src="{{ asset('public/admin/js/customers.js') }}"></script>
@endpush
