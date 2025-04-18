@extends('layouts.guest')
@section('title', '404')
@section('content')
<div class="text-dark">
    <div class="d-flex align-items-center justify-content-center min-vh-100 px-2">
        <div class="text-center">
            <h1 class="display-1 fw-bold">404</h1>
            <p class="fs-2 fw-medium mt-4">Oops! Page not found</p>
            <p class="mt-4 mb-5">The page you're looking for doesn't exist or has been moved.</p>
            <a href="{{ url('/') }}" class="btn btn-primary border-0 fw-semibold  px-4 py-2" style="background: #c73938">
                Go Home
            </a>
        </div>
    </div>
</div>
@endsection
