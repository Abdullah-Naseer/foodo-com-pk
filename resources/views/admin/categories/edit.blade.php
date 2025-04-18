@extends('layouts.admin')
@section('title', isset($category) ? 'Edit Category' : 'Create Category')

@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            @php
                $action = isset($category)
                    ? route('admin.categories.update', $category)
                    : route('admin.categories.store');
                $method = isset($category) ? 'PUT' : 'POST';
            @endphp

            <div class="d-flex align-items-center justify-content-between mb-4">
                <h1 class="h3">{{ isset($category) ? 'Edit' : 'Create' }} Category</h1>
                <a href="{{ route('admin.categories.index') }}" class="btn btn-primary">Back</a>
            </div>

            <form class="standart-form" action="{{ $action }}" method="POST">
                @csrf
                @if (isset($category))
                    @method('PUT')
                @endif
                <div class="card card-solid">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6 mb-4">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" name="name"
                                        value="{{ $category->name ?? '' }}" placeholder="name...">
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
