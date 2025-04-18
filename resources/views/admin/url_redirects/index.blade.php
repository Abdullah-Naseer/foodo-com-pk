@extends('layouts.admin')
@section('title', 'Url Redirects')


@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h1 class="h3">All Url Redirects</h1>
                <div>
                    @can('trash')
                        <a href="{{ route('admin.url-redirects.index', ['trash' => request('trash') ? null : 'true']) }}"
                            class="btn {{ request('trash') ? 'btn-success' : 'btn-danger' }} me-2">
                            {{ request('trash') ? 'View All' : 'View Trash' }}
                        </a>
                    @endcan
                    @can('add page')
                        <a href="{{ route('admin.url-redirects.create') }}" class="btn btn-primary">Add New</a>
                    @endcan
                </div>
            </div>
            <div class="card card-solid">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="UrlRedirectDataTable" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>From URL</th>
                                    <th>To URL</th>
                                    <th>Status</th>
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
    <script src="{{ asset('public/admin/js/url-redirects.js') }}"></script>
@endpush
