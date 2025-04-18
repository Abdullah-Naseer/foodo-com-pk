@extends('layouts.admin')
@section('title', isset($page) ? 'Edit Page' : 'Create Page')

@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            @php
                $action = isset($page) ? route('admin.pages.update', $page) : route('admin.pages.store');
                $method = isset($page) ? 'PUT' : 'POST';
            @endphp

            <div class="d-flex align-items-center justify-content-between mb-4">
                <h1 class="h3">{{ isset($page) ? 'Edit' : 'Create' }} Page</h1>
                <a href="{{ route('admin.pages.index') }}" class="btn btn-primary">Back</a>
            </div>

            <form class="standart-form" action="{{ $action }}" method="POST">
                @csrf
                   @if (isset($page))
                    @method('PUT')
                @endif
                <div class="card card-solid">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6 mb-4">
                                <div class="form-group">
                                    <label>Page title</label>
                                    <input type="text" class="form-control" name="title"
                                        value="{{ $page->title ?? '' }}" placeholder="Page title...">
                                    <span data-field="title" class="invalid-feedback"></span>
                                </div>
                            </div>
                            @role('Super-admin')
                            <div class="col-sm-6 mb-4">
                                <div class="form-group">
                                    <label>URL</label>
                                    <input type="text" class="form-control" name="slug"
                                        value="{{ $page->slug ?? '' }}" placeholder="URL...">
                                    <span data-field="slug" class="invalid-feedback"></span>
                                </div>
                            </div>
                            @endrole
                            <div class="col-sm-6 mb-4">
                                <div class="form-group">
                                    <label>Meta title</label>
                                    <input type="text" class="form-control" name="meta_title"
                                        value="{{ $page->meta_title ?? '' }}" placeholder="Meta title...">
                                    <span data-field="meta_title" class="invalid-feedback"></span>
                                </div>
                            </div>
                            <div class="col-sm-6 mb-4">
                                <div class="form-group">
                                    <label>Meta description</label>
                                    <input type="text" class="form-control" name="meta_description"
                                        value="{{ $page->meta_description ?? '' }}" placeholder="Meta description...">
                                    <span data-field="meta_description" class="invalid-feedback"></span>
                                </div>
                            </div>
                            <div class="col-sm-6 mb-4">
                                <div class="form-group">
                                    <label>Meta keywords</label>
                                    <input type="text" class="form-control" name="meta_keywords"
                                        value="{{ $page->meta_keywords ?? '' }}" placeholder="Meta keywords...">
                                    <span data-field="meta_keywords" class="invalid-feedback"></span>
                                </div>
                            </div>
                            @role('Super-admin')
                            <div class="col-sm-6 mb-4">
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control" style="width: 100%;" name="status">
                                        @foreach (\App\Models\Page::$statuses as $k => $v)
                                            <option value="{{ $k }}"
                                                {{ isset($page->status) && $k == $page->status ? 'selected' : '' }}>
                                                {{ $v }}</option>
                                        @endforeach
                                    </select>
                                    <span data-field="status" class="invalid-feedback"></span>
                                </div>
                            </div>

                            <div class="col-sm-6 mb-4">
                                <div class="form-group">
                                    <label>View Path</label>
                                    <input type="text" class="form-control" name="view_path"
                                        value="{{ $page->view_path ?? '' }}" placeholder="View Path...">
                                    <span data-field="view_path" class="invalid-feedback"></span>
                                </div>
                            </div>
                            @endrole

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
