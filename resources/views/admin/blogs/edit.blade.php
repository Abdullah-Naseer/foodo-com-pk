@extends('layouts.admin')
@section('title', isset($blog) ? 'Edit Blog' : 'Create Blog')

@section('content')
    <section class="content">
        <div class="container-fluid">

            @php
                $isEdit = isset($blog);
                $action = $isEdit ? route('admin.blogs.update', $blog->id) : route('admin.blogs.store');
                $method = $isEdit ? 'PUT' : 'POST';
            @endphp

            <div class="d-flex align-items-center justify-content-between mb-4">
                <h1 class="h3">{{ $isEdit ? 'Edit' : 'Create' }} Blog</h1>
                <a href="{{ route('admin.blogs.index') }}" class="btn btn-primary">Back</a>
            </div>

            <div class="card">
                <div class="card-body">
                    <form class="standart-menu-form" action="{{ $action }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @if ($isEdit)
                            @method('PUT')
                        @endif

                        <div class="row">
                            <div class="col-sm-6 mb-4">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" class="form-control" name="title"
                                        value="{{ $blog->title ?? '' }}" placeholder="Enter title...">
                                    <span data-field="title" class="invalid-feedback"></span>
                                </div>
                            </div>

                            <div class="col-sm-6 mb-3">
                                <div class="form-group">
                                    <label for="category_id">Category</label>
                                    <select id="category_id" class="form-control" name="category_id">
                                        <option value="">Select category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ isset($blog) && $blog->category_id == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <span data-field="category_id" class="invalid-feedback"></span>
                                </div>
                            </div>

                            <div class="col-sm-6 mb-4">
                                <div class="form-group">
                                    <label>Slug</label>
                                    <input type="text" class="form-control" name="slug"
                                        value="{{ $blog->slug ?? '' }}" placeholder="Enter slug...">
                                    <span data-field="slug" class="invalid-feedback"></span>
                                </div>
                            </div>

                            <div class="col-sm-6 mb-4">
                                <div class="form-group">
                                    <label>Image (max image size 10MB)</label>
                                    <input type="file" class="form-control" name="image">
                                    @if ($isEdit && $blog->image)
                                        <p class="mt-2">Current Image: <img src="{{ asset($blog->image) }}"
                                                alt="Blog Image" width="100"></p>
                                    @endif
                                    <span data-field="image" class="invalid-feedback"></span>
                                </div>
                            </div>

                            <div class="col-sm-12 mb-4">
                                <div class="form-group">
                                    <label for="content">Content</label>
                                    <textarea id="content" name="content" class="form-control editor" rows="6" placeholder="Enter content">{{ $blog->content ?? '' }}</textarea>
                                    <span data-field="content" class="invalid-feedback"></span>
                                </div>
                            </div>

                            <div class="col-sm-12 mb-4">
                                <div class="form-group">
                                    <label for="tags">Tags</label>
                                    <input type="text" id="tags-input" class="form-control"
                                        value="{{ isset($blog) ? $blog->tags->pluck('name')->implode(', ') : '' }}"
                                        placeholder="Enter a tag">
                                    <div id="tags-display" class="tags-display"></div>
                                    <input type="hidden" name="tags" id="tags-hidden"
                                        value="{{ isset($blog) ? $blog->tags->pluck('name')->implode(', ') : '' }}">
                                </div>
                            </div>


                            <div class="col-sm-12 mb-4">
                                <div class="form-group">
                                    <label for="meta_title">Meta Title</label>
                                    <input type="text" name="meta_title" class="form-control"
                                        value="{{ $blog->meta_title ?? '' }}" placeholder="Enter meta title">
                                </div>
                            </div>

                            <div class="col-sm-12 mb-4">
                                <div class="form-group">
                                    <label for="meta_description">Meta Description</label>
                                    <textarea id="meta_description" name="meta_description" class="form-control" rows="6"
                                        placeholder="Enter meta description">{{ $blog->meta_description ?? '' }}</textarea>
                                </div>
                            </div>

                            <div class="col-sm-12 mb-4">
                                <div class="form-group">
                                    <label for="meta_keywords">Meta Keywords</label>
                                    <textarea id="meta_keywords" name="meta_keywords" class="form-control" rows="6" placeholder="Enter meta keywords">{{ $blog->meta_keywords ?? '' }}</textarea>
                                </div>
                            </div>

                            <!-- Submit and Reset Buttons -->
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-info">
                                    {{ $isEdit ? 'Update' : 'Publish' }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            @include('admin.inc.ckeditor')
        </div><!-- /.container-fluid -->
    </section>

    <!-- /.content -->
@endsection
@push('js')
    <script src="{{ asset('public/admin/js/blog.js') }}"></script>
    <script src="{{ asset('public/admin/js/menu.js') }}"></script>
    <script>
        var uploadField = $('input[type="file"]');

        $(document).on('change', 'input[type="file"]', function() {
            var $this = $(this);
            $(this.files).each(function(key, value) {
                if ((value.size / 1024) > 10240) {
                    alert('"' + value.name + '"' + 'exceeds limit of maximum file upload size')
                    $this.val("");
                }
            })
        })
    </script>
@endpush
