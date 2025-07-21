@extends('layouts.admin')
@section('title', 'Sitemap')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Generate Sitemap</h3>
                </div>
                <form class="standart-form" action="{{ route('admin.sitemap.generate') }}" method="POST">
                    @csrf
                    <div class="card-body py-0">
                        <p class="m-0">This will generate a fresh <code>sitemap.xml</code> file based on your current site URLs.</p>
                    </div>
                    <div class="card-footer text-end">
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-sync-alt"></i> Generate Sitemap
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </section>
@endsection
