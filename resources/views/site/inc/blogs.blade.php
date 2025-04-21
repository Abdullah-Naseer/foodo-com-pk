<div class="rts-blog-area rts-blog-area-2 rts-section-gap d-lg-block d-none" id="blog">
    <div class="container">
        <div class="row text-center justify-content-center">
            <div class="col-md-12 text-center mb-5">
                <span class="w-foods-itilanio">Our Blogs</span>
                <h4 class="p-title">Latest Blog & Articles</h4>
                <p class="desc">Learn more about our processes and stay informed about the latest <br> trends in the
                    food industry.</p>
            </div>
            @forelse ($blogs as $item)
                <div class="col-md-5 mb-5">
                    <div class="blog-wrapper d-flex">
                        <div class="image-part col-5">
                            <img src="{{ asset($item->image) }}" alt="blog" class="h-100 w-100 obj-fit-contain">
                        </div>
                        <div class="content text-start p-3 col-7">
                            <h5 class="fs-3 mb-md-4 m-0">{{ $item->title }}</h5>
                            <p class="m-0 fs-5"><i class="fa fa-clock pe-2"></i>{{ $item->created_at->format('d M Y') }}
                            </p>
                            <p class="py-md-3 m-0 fs-5"> {!! strip_tags(mb_substr($item->content, 0, 100)) . '...' !!}</p>
                            <a href="{{ route('blogs.index', $item->slug) }}"
                                class="service-link text-danger text-uppercase fs-5 fw-bold">
                                Read more
                                <i class="fa-solid fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @empty
            @endforelse
            <div class="col-12 text-center mt-4">
                <a href="{{ url('blogs') }}"
                    class="btn btn-site-primary w-auto text-uppercase px-5 py-3 fs-5 booking-btn">Read More</a>
            </div>
        </div>
    </div>
</div>
