@extends('layouts.admin')
@section('title', isset($page) ? 'Edit Url Redirects' : 'Create Url Redirects')

@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            @php
                $action = isset($UrlRedirect) ? route('admin.url-redirects.update', $UrlRedirect) : route('admin.url-redirects.store');
                $method = isset($UrlRedirect) ? 'PUT' : 'POST';
            @endphp

            <div class="d-flex align-items-center justify-content-between mb-4">
                <h1 class="h3">{{ isset($UrlRedirect) ? 'Edit' : 'Create' }} Url Redirects</h1>
                <a href="{{ route('admin.url-redirects.index') }}" class="btn btn-primary">Back</a>
            </div>

            <form class="standart-form" action="{{ $action }}" method="POST">
                @csrf
                   @if (isset($UrlRedirect))
                    @method('PUT')
                @endif
                <div class="card card-solid">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6 mb-4">
                                <div class="form-group">
                                    <label>From URL</label>
                                    <input type="text" class="form-control" name="from_url"
                                        value="{{ $UrlRedirect->from_url ?? '' }}" placeholder="From url...">
                                    <span data-field="from_url" class="invalid-feedback"></span>
                                </div>
                            </div>

                            <div class="col-sm-6 mb-4">
                                <div class="form-group">
                                    <label>To URL</label>
                                    <input type="text" class="form-control" name="to_url"
                                        value="{{ $UrlRedirect->to_url ?? '' }}" placeholder="From url...">
                                    <span data-field="to_url" class="invalid-feedback"></span>
                                </div>
                            </div>

                            <div class="col-sm-6 mb-4">
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control" style="width: 100%;" name="status">
                                        @foreach (\App\Models\Page::$statuses as $k => $v)
                                            <option value="{{ $k }}"
                                                {{ isset($UrlRedirect->status) && $k == $UrlRedirect->status ? 'selected' : '' }}>
                                                {{ $v }}</option>
                                        @endforeach
                                    </select>
                                    <span data-field="status" class="invalid-feedback"></span>
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
