@extends('layouts.admin')
@section('title', 'Sitemap')

@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <form class="standart-menu-form" action="{{ route('admin.sitemap.upload') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="card card-solid">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6 mb-4">
                                <div class="form-group">
                                    <label for="sitemap_file">Upload Sitemap XML:</label>
                                    <input type="file" class="form-control" name="sitemap_file" id="sitemap_file"
                                        accept=".xml">
                                        <span data-field="sitemap_file" class="invalid-feedback"></span>
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
