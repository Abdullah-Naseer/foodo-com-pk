@extends('layouts.app')
@section('title', $blog->meta_title)
@section('seo_description', $blog->meta_description)
@section('meta_keywords', $blog->meta_keywords)

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


    <section id="blog-detail" class="mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="blog-details-content pr-md-4">
                                <div class="post-content-details">
                                    @if ($blog->image)
                                        <img src="{{ asset($blog->image) }}" alt="{{ $blog->title }}"
                                            class="img-fluid mb-4 rounded">
                                    @endif

                                    <h1 class="detail-title">{{ $blog->title }}</h1>

                                    <div class="date-meta text-uppercase">
                                        <span class="mr-md-5"><img loading="lazy"
                                                src="{{ url('public/assets/images/calendar.png') }}" class="me-3"
                                                alt="fi-rr-calendar" width="15"
                                                class="mr-2">{{ $blog->created_at->format('d M Y') }}</span>

                                        <span class="mr-md-5"><img loading="lazy"
                                                src="{{ url('public/assets/images/reading.png') }}" alt="reading"
                                                width="15" class="me-3">1 min read</span>
                                    </div>
                                    <p>
                                        {!! $blog->content !!}
                                    </p>

                                </div>
                                <div class="blog-share-tag">
                                    <div class="share-text float-left">
                                        Share:
                                    </div>

                                    <div class="share-social ul-li float-right">
                                        <ul class="d-flex justify-content-beteen list-unstyled">
                                            <li><a target="_blank" href="#"><i
                                                        class="social-color fab fa-facebook-f"></i></a>
                                            </li>
                                            <li><a target="_blank" href="#"><i
                                                        class="social-color fab fa-twitter"></i></a>
                                            </li>
                                            <li><a target="_blank" href="#"><i
                                                        class="social-color fab fa-linkedin"></i></a>
                                            </li>
                                            <li><a target="_blank" href="#"><i
                                                        class="social-color fab fa-whatsapp"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-md-4">

                    <!-- Categories -->
                    <div class="mb-4">
                        <div class="post-categori-detail ul-li-block">

                            <ul>
                                <p class="cat-item active mb-0 ps-3">
                                    Categories</p>
                                @forelse ($categories as $item)
                                    <li class="cat-item @if (isset($category) && $item->name == $category->name) active @endif ps-3">
                                        <a href="{{ route('blogs.category', ['category' => $item->slug]) }}">
                                            <div class="d-flex justify-content-between">
                                                <p class="m-0">
                                                    {{ $item->name }}
                                                </p>
                                                <p class="m-0">
                                                    ({{ $item->blogs->count() }})
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                @empty
                                @endforelse
                            </ul>
                            </ul>
                        </div>
                    </div>

                    <div class="mb-4 mt--50">
                        <div class="post-categori-detail ul-li-block">

                            <ul>
                                <p class="cat-item active mb-0 ps-3">
                                    Latest Blog</p>
                                @forelse ($latest_news as $latestBlog)
                                    <li class="cat-item ps-3">
                                        <a href="{{ route('blogs.index', ['slug' => $latestBlog->slug]) }}">
                                            <div class="row">
                                                <div
                                                    class="best-course-pic col-md-4 d-flex align-items-center  pr-md-0 pl-md-2">
                                                    <img loading="lazy" src="{{ asset($latestBlog->image) }}"
                                                        class="img-fluid" alt="">
                                                </div>
                                                <div class="col-md-8 pl-md-2">
                                                    <div class="headline">
                                                        <span
                                                            class="text-secondary small">{{ $latestBlog->created_at->format('d M, Y') }}</span>
                                                        <p class="m-0 small font-weight-bold">{{ $latestBlog->title }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                @empty
                                @endforelse
                            </ul>
                        </div>
                    </div>
                </div>


            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="blog-recent-post about-teacher-2 pt-5">
                        <div class="section-title-2  headline text-left">
                            <h2 class="p-title fs-1"> Realted News</h2>
                        </div>
                        <div class="recent-post-item">
                            <div class="row">
                                @forelse ($related_news as $item)
                                    <div class="col-md-4 mb-5 scale-card">
                                        <div class="card blog-card blog-top-radius blog-bottom-radius">
                                            <div class="card-header bg-transparent card-header p-0">
                                                <img src="{{ asset($item->image) }}" alt="blog"
                                                    class="h-100 w-100 object-fit-cover blog-top-radius">
                                            </div>
                                            <div class="card-body pb-0">

                                                <!-- Content Part -->
                                                <div class="content text-start p-3 ">
                                                    <h5 class="fs-3 mb-md-4 m-0"><a
                                                            href="{{ route('blogs.index', $item->slug) }}">
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
                                    <p class="mb-5">No blogs available.</p>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


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
