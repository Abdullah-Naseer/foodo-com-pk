@extends('layouts.admin')
@section('title', isset($role) ? 'Edit Role' : 'Create Role')

@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            @php
                $action = isset($role) ? route('admin.roles.update', $role) : route('admin.roles.store');
                $method = isset($role) ? 'PUT' : 'POST';
            @endphp

            <div class="d-flex align-items-center justify-content-between mb-4">
                <h1 class="h3">{{ isset($role) ? 'Edit' : 'Create' }} Role</h1>
                <a href="{{ route('admin.roles.index') }}" class="btn btn-primary">Back</a>
            </div>

            <form class="standart-form" action="{{ $action }}" method="POST">
                @csrf
                @if (isset($role))
                @method('PUT')
            @endif
                <div class="card card-solid">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6 mb-4">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" name="name"
                                        value="{{ $role->name ?? '' }}" placeholder="Role name...">
                                    <span data-field="name" class="invalid-feedback"></span>
                                </div>
                            </div>


                        </div>
                        <!-- Permissions -->
                        @if (count($permissions) > 0)
                            <div class="col-sm-12">
                                <label for="permissions">Assign Permissions</label>
                                <div class="form-group">
                                    <div class="row">
                                        @foreach ($permissions as $permission)
                                            <div class="col-sm-4">
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input"
                                                        id="permission_{{ $permission->id }}" name="permissions[]"
                                                        value="{{ $permission->id }}"
                                                        @if (isset($role) && $role->permissions->contains($permission->id)) checked @endif>
                                                    <label class="form-check-label" for="permission_{{ $permission->id }}">
                                                        {{ $permission->name }}
                                                    </label>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endif
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
