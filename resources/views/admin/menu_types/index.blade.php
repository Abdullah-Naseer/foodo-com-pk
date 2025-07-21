@extends('layouts.admin')
@section('title', 'Menu Types')


@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="d-flex align-items-center justify-content-between mb-4">
                @php $trash = request()->get('trash') @endphp

                <h1 class="h3">All Menu Types</h1>
                <div>
                    @can('trash')
                        <a href="{{ route('admin.menu-types.index', ['trash' => request('trash') ? null : 'true']) }}"
                            class="btn {{ request('trash') ? 'btn-success' : 'btn-danger' }} me-2">
                            {{ request('trash') ? 'View All' : 'View Trash' }}
                        </a>
                    @endcan
                                        @can('add page')
                    <a href="{{ route('admin.menu-types.create') }}" class="btn btn-primary">Add New</a>
                    @endcan
                </div>
            </div>
            <div class="card card-solid">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="menuTypesDataTable" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
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
    <script src="{{ asset('public/admin/js/menu.js') }}"></script>
@endpush
