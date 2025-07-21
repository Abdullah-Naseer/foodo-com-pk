@extends('layouts.app')

@section('content')
    <div class="banner">
        <div class="container ">
            <div class="row justify-content-between">
                <div class="col-md-7">
                    <h4 class="p-title text-white">Latest Blog & Articles</h4>
                    <p class="desc text-white">Explore a wide range of blog posts and articles that will help you gain
                        valuable
                        insights on various topics.</p>
                </div>
                <!-- Search Bar -->
                <div class="col-md-4">
                    <form action="{{ route('search') }}" method="GET" id="searchForm">
                        <div class="search position-relative">
                            <h2 class="sr-heading mb-3 text-end">Search <span>Blogs</span></h2>
                            <input type="text" class="form-control" placeholder="Search blog posts..." name="q">
                            <button class="search-btn" type="submit">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>

                        <div class="filter-dropdown">
                            <div class="input-group p-0 mt-3 justify-content-end">
                                <div class="filter">
                                    <div class="align-items-center d-flex ">
                                        <button class="btn  bg-white border-0 rounded-circle m-1" type="button">
                                            <img loading="lazy" src="{{ asset('public/assets/images/filter.png') }}"
                                                alt="" width="16" height="16">
                                        </button>
                                    </div>
                                    <div class="pr-3">
                                        <select name="sort" id="sortBy" class="from-select border-0 pl-3  pr-3">
                                            <option value="">None</option>
                                            <option value="asc" {{ request()->sort == 'asc' ? 'selected' : '' }}>
                                                Oldest
                                            </option>
                                            <option value="desc" {{ request()->sort == 'desc' ? 'selected' : '' }}>
                                                Latest
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Blog Section -->
    <div class="rts-blog-area rts-blog-area-2 rts-section-gap" id="blog">
        <div class="container">
            <div class="row">
                <!-- Main Content (Blog Posts) -->
                <div class="col-md-8">
                    <div class="row">
                        @forelse ($blogs as $item)
                            <div class="col-md-6 mb-5 scale-card">
                                <div class="card blog-card blog-top-radius blog-bottom-radius">
                                    <div class="card-header bg-transparent card-header p-0">
                                        <img src="{{ asset($item->image) }}" alt="blog"
                                            class="h-100 w-100 object-fit-cover blog-top-radius">
                                    </div>
                                    <div class="card-body pb-0">

                                        <!-- Content Part -->
                                        <div class="content text-start p-3 ">
                                            <h5 class="fs-3 mb-md-4 m-0"><a href="{{ route('blogs.index', $item->slug) }}">
                                                    {{ $item->title }}
                                                </a></h5>
                                            <div class="blog-detail">

                                                <p class="py-md-2 m-0 fs-5 p-0">
                                                    {{ \Str::limit(strip_tags($item->content), 150) }}...</p>
                                            </div>
                                            <div class="card-footer border-0 p-0 bg-transparent">

                                                <div
                                                    class="d-flex justify-content-between align-items-center border-top p-0 pt-2"">
                                                    <div>
                                                        <a href="{{ route('blogs.index', $item->slug) }}"
                                                            class="service-link text-danger text-uppercase fs-5 fw-bold">
                                                            Read more <i class="fa-solid fa-arrow-right"></i>
                                                        </a>
                                                    </div>
                                                    <p class="m-0 fs-5"><i
                                                            class="fa fa-clock pe-2"></i>{{ $item->created_at->format('d M Y') }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p>No blogs available.</p>
                        @endforelse
                    </div>
                </div>

                <!-- Sidebar Section -->
                <div class="col-md-4">
                    <h2 class="widget-title text-capitalize text-primary">Blog <span>Categories.</span></h2>

                    <!-- Categories -->
                    <div class="mb-4">
                        <div class="post-categori ul-li-block">
                            <ul>

                                <li class="cat-item @routeis('blogs.index')
                                    active
                                    @endrouteis "><a
                                        href="{{ route('blogs.index') }}">All</a></li>
                                @forelse ($categories as $item)
                                    <li class="cat-item"><a
                                            href="{{ route('blogs.category', [
                                                'category' => $item->slug,
                                            ]) }}"
                                            class="text-dark">{{ $item->name }}</a></li>
                                @empty
                                @endforelse
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="couse-pagination text-center ul-li">
                {{ $blogs->links() }}
            </div>
        </div>
    </div>
    </div>
@endsection

@push('scripts')
    <script>
        $("#sortBy").change(function(e) {
            e.preventDefault();

            $("#searchForm").submit();
        });
    </script>
@endpush
