@extends('layouts.admin')
@section('title', isset($isEdit) ? 'Edit Blog' : 'Create Blog')

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
                    <form action="{{ $action }}" method="POST" enctype="multipart/form-data"
                        class="standart-menu-form">
                        @csrf
                        @if ($isEdit)
                            @method('PUT')
                        @endif

                        <div class="row">
                            <div class="col-sm-4 mb-4">
                                <label for="title">Title</label>
                                <input id="title" type="text" class="form-control" name="title"
                                    value="{{ old('title', $blog->title ?? '') }}" placeholder="Enter title...">
                                <span data-field="title" class="invalid-feedback"></span>
                            </div>

                            <div class="col-sm-4 mb-3">
                                <label for="category_id">Category</label>
                                <select id="category_id" class="form-control" name="category_id">
                                    <option value="">Select category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ old('category_id', $blog->category_id ?? '') == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <span data-field="category_id" class="invalid-feedback"></span>
                            </div>

                            <div class="col-sm-4 mb-4">
                                <label for="image">Image (max size 10MB)</label>
                                <input id="image" type="file" class="form-control" name="image" accept="image/*">
                                @if ($isEdit && $blog->image)
                                    <p class="mt-2">Current Image:<br><img src="{{ asset($blog->image) }}"
                                            alt="Blog Image" width="100"></p>
                                @endif
                                <span data-field="image" class="invalid-feedback"></span>
                            </div>

                            <div class="col-sm-12 mb-4">
                                <label for="editor">Content</label>
                                <textarea id="editor" name="content" class="form-control" rows="6" placeholder="Enter content">{{ old('content', $blog->content ?? '') }}</textarea>
                                <span data-field="content" class="invalid-feedback"></span>
                            </div>

                            <div class="col-sm-12 mb-4">
                                <label for="tags-input">Tags</label>
                                <input id="tags-input" type="text" class="form-control"
                                    value="{{ old('tags', isset($blog) ? $blog->tags->pluck('name')->implode(', ') : '') }}"
                                    placeholder="Enter tags separated by commas">
                                <div id="tags-display" class="tags-display"></div>
                                <input type="hidden" name="tags" id="tags-hidden"
                                    value="{{ old('tags', isset($blog) ? $blog->tags->pluck('name')->implode(', ') : '') }}">
                            </div>

                            <div class="col-sm-12 mb-4">
                                <label for="meta_title">Meta Title</label>
                                <input id="meta_title" type="text" name="meta_title" class="form-control"
                                    value="{{ old('meta_title', $blog->meta_title ?? '') }}"
                                    placeholder="Enter meta title">
                            </div>

                            <div class="col-sm-12 mb-4">
                                <label for="meta_description">Meta Description</label>
                                <textarea id="meta_description" name="meta_description" class="form-control" rows="6"
                                    placeholder="Enter meta description">{{ old('meta_description', $blog->meta_description ?? '') }}</textarea>
                            </div>

                            <div class="col-sm-12 mb-4">
                                <label for="meta_keywords">Meta Keywords</label>
                                <textarea id="meta_keywords" name="meta_keywords" class="form-control" rows="6" placeholder="Enter meta keywords">{{ old('meta_keywords', $blog->meta_keywords ?? '') }}</textarea>
                            </div>

                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-info">{{ $isEdit ? 'Update' : 'Publish' }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </section>
@endsection

@push('js')
    <script src="{{ asset('public/admin/js/blog.js') }}"></script>
    <script src="{{ asset('public/admin/js/menu.js') }}"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>


    <script>
        $(document).on('change', 'input[type="file"]', function() {
            const maxSizeKB = 10240;
            for (const file of this.files) {
                if ((file.size / 1024) > maxSizeKB) {
                    alert(`"${file.name}" exceeds the maximum file size of 10MB.`);
                    $(this).val('');
                    break;
                }
            }
        });

        ClassicEditor
            .create(document.querySelector('#editor'), {
                ckfinder: {
                    uploadUrl: '{{ route('admin.ckeditor.upload') }}?_token={{ csrf_token() }}',
                }
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endpush
