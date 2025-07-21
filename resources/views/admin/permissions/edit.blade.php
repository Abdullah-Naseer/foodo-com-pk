@extends('layouts.admin')
@section('title', isset($permission) ? 'Edit Permission' : 'Create Permission')

@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            @php
                $action = isset($permission)
                    ? route('admin.permissions.update', $permission)
                    : route('admin.permissions.store');
                $method = isset($permission) ? 'PUT' : 'POST';
            @endphp


            <div class="d-flex align-items-center justify-content-between mb-4">
                <h1 class="h3">{{ isset($permission) ? 'Edit' : 'Create' }} Permission</h1>
                <a href="{{ route('admin.permissions.index') }}" class="btn btn-primary">Back</a>
            </div>

           <form class="standart-form" action="{{ $action }}" method="POST">
                @csrf
                @if (isset($permission))
                    @method('PUT')
                @endif
                <div class="card card-solid">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6 mb-2">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" name="name"
                                        value="{{ $permission->name ?? '' }}" placeholder="Permission name...">
                                    <span data-field="name" class="invalid-feedback"></span>
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
