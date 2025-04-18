@extends('layouts.admin')
@section('title', 'Users')

@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div class="d-flex align-items-center justify-content-between mb-4">
                <h1 class="h3">All Admins</h1>
                <div>
                    @can('trash')
                        <a href="{{ route('admin.users.index', ['trash' => request('trash') ? null : 'true']) }}"
                            class="btn {{ request('trash') ? 'btn-success' : 'btn-danger' }} me-2">
                            {{ request('trash') ? 'View All' : 'View Trash' }}
                        </a>
                    @endcan
                    <a href="{{ route('admin.users.create') }}" class="btn btn-primary">Add New</a>
                </div>
            </div>

            <div class="card card-solid">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="usersDataTable" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Roles</th>
                                    <th>Permissions</th>
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
    <script src="{{ asset('public/admin/js/users.js') }}"></script>
@endpush
