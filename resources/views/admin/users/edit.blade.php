@extends('layouts.admin')
@section('title', isset($user) ? 'Edit User' : 'Create User')

@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            @php
                $action = isset($user) ? route('admin.users.update', $user) : route('admin.users.store');
                $method = isset($user) ? 'PUT' : 'POST';
            @endphp

            <div class="d-flex align-items-center justify-content-between mb-4">
                <h1 class="h3">{{ isset($user) ? 'Edit' : 'Create' }} Admin</h1>
                <a href="{{ route('admin.users.index') }}" class="btn btn-primary">Back</a>
            </div>

             <form class="standart-form" action="{{ $action }}" method="POST">
                @csrf
                @if (isset($user))
                    @method('PUT')
                @endif
                <div class="card card-solid">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6 mb-2">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" name="name"
                                        value="{{ $user->name ?? '' }}" placeholder="User name...">
                                    <span data-field="name" class="invalid-feedback"></span>
                                </div>
                            </div>
                            <div class="col-sm-6 mb-2">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" class="form-control" name="email"
                                        value="{{ $user->email ?? '' }}" placeholder="User email...">
                                    <span data-field="email" class="invalid-feedback"></span>
                                </div>
                            </div>

                            @empty($user)
                                <div class="col-sm-6 mb-3">
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control" name="password"
                                            placeholder="User password...">
                                        <span data-field="password" class="invalid-feedback"></span>
                                    </div>
                                </div>
                            @endempty

                            <div class="col-sm-6 mb-3">
                                <div class="form-group">
                                    <label for="role">Role</label>

                                    <select class="form-control select2" name="roles[]" multiple="multiple"
                                        data-placeholder="Select a role">
                                        <option value="" disabled>Select a role</option>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->name }}"
                                                @if (isset($user) && $user->roles->contains('id', $role->id)) selected @endif>
                                                {{ $role->name }}
                                            </option>
                                        @endforeach
                                    </select>

                                    <span data-field="roles" class="invalid-feedback"></span>
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
