@extends('layouts.admin')
@section('title', isset($menuType) ? 'Edit Menu Type' : 'Create Menu Type')

@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            @php
                $action = isset($menuType) ? route('admin.menu-types.update', $menuType) : route('admin.menu-types.store');
                $method = isset($menuType) ? 'PUT' : 'POST';
            @endphp

            <div class="d-flex align-items-center justify-content-between mb-4">
                <h1 class="h3">{{ isset($menuType) ? 'Edit' : 'Create' }} Menu Type</h1>
                <a href="{{ route('admin.menu-types.index') }}" class="btn btn-primary">Back</a>
            </div>

            <form class="standart-form" action="{{ $action }}" method="POST">
                @csrf
                @if (isset($menuType))
                    @method('PUT')
                @endif
                <div class="card card-solid">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6 mb-4">
                                <div class="form-group">
                                    <label>Type</label>
                                    <input type="text" class="form-control" name="type"
                                        value="{{ $menuType->type ?? '' }}" placeholder="Type...">
                                    <span data-field="type" class="invalid-feedback"></span>
                                </div>
                            </div>
                            
                            <div class="col-sm-6 mb-4">
                                <div class="form-group">
                                    <label>Days Count</label>
                                    <input type="text" class="form-control" name="days_count"
                                        value="{{ $menuType->days_count ?? '' }}" placeholder="Days count...">
                                    <span data-field="days_count" class="invalid-feedback"></span>
                                </div>
                            </div>
                            
                            
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <div class="row">
                    <div class="col-12 text-end">
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </div>
            </form>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
@push('js')
    <script src="{{ asset('public/admin/js/menu.js') }}"></script>
@endpush
