@extends('layouts.app')
@section('content')
    <!-- banner start -->
    <div class="rts-banner-main-area-swiper banner-four">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="banner-left-image">
                        <span class="w-food-itilanio">Welcome To Foodo</span>
                        <h1 class="p-title"><span class="text-danger">Homemade Khana</span> <span class="fw-normal">Right to
                                Your Office</span></h1>
                        <p class="desc fs-1">Make Your Teams Happy with Ghar ka Khana</p>
                        <div class="banner-home-button d-flex">
                            <a href="{{ url('contact-us') }}" class="order-btn-contact text-uppercase">Contact Us</a>
                            <a href="#menu-section" class="order-btn-see-menu text-uppercase">SEE Menu</a>
                        </div>
                        <div></div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class=" d-none d-md-block" data-sal="zoom-in" data-sal-delay="600" data-sal-duration="600">
                        <img src="{{ asset('public/assets/images/banner/home-banner-image.webp') }}"
                            alt="banner-right-image">
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="ms-5 m-md-0">
                        <ul class="d-flex list-unstyled m-0">
                            <li>
                                <a target="_blank" href="https://www.facebook.com/foodoofficial1/">
                                    <img src="{{ asset('public/assets/images/social/facebook.webp') }}" alt="img"
                                        class="w-75 me-3">
                                </a>
                            </li>
                            <li>
                                <a target="_blank" href="https://www.instagram.com/foodoofficial1/">
                                    <img src="{{ asset('public/assets/images/social/instagram.webp') }}" alt="img"
                                        class="w-75 me-3">
                                </a>
                            </li>
                            <li>
                                <a target="_blank" href="https://www.linkedin.com/company/foodoofficial1/">
                                    <img src="{{ asset('public/assets/images/social/In.svg') }}" alt="img" class="w-75 me-3">
                                </a>
                            </li>
                        </ul>
                        <p class="fs-4 text-dark">Follow Our Socials</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- banner end -->

    <div class="rts-about-area rts-section-gapTopBotm bg-white" id="about">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="row shadow">
                        <div class="col-md-6 p-0">
                            <div class="home-about-one-img">
                                <img src="{{ asset('public/assets/images/about/home-about-image.webp') }}" alt="about">
                            </div>
                        </div>
                        <div class="col-md-6 home-about-heading pb-3">
                            <div class="ps-4">
                                <h3 class="p-title">A Well-Fed Team Is a Happy Team</h3>
                                <p class="desc text-danger fs-5 fw-bold">Book Delicious & Fresh Lunch Goodness for Your
                                    Corporate Teams</p>
                                <h4 class="p-title border-danger border-start ps-4 border-5">Craving Ghar ka Khana at Lunch?
                                </h4>
                                <p>Register your group for an amazing lunchtime</p>
                                <ul class="list-style-auto">
                                    <li>Select your chosen menu</li>
                                    <li>Place your order with the team *Minimum order restriction apply</li>
                                    <li>Enjoy your food at the designated time</li>
                                </ul>
                                <br>
                                <div class="banner-home-button text-center">
                                    <a href="tel:+92 337 0777019"
                                        class="btn btn-site-primary w-auto text-uppercase px-5 py-3 fs-5 booking-btn">Get
                                        Started</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="rts-about-area rts-section-gapTopBotm bg-white">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="">
                        <h5 class="p-title d-flex">
                            <img src="{{ asset('public/assets/images/home/qoute.webp') }}" alt="qoute"
                                class="me-3 qoute-img">
                            The Food You Eat Should Be Perfect,
                            And This Is Our Responsibility
                        </h5>
                        <p class="desc mb-4">At Foodo, we are dedicated to providing the best food by sourcing top-quality
                            ingredients from our selected vendors. It helps to ensure freshness with an irresistible taste
                            that savors your hunger.</p>
                        <div class="d-block my-3">
                            <div class="d-flex justify-content-between">
                                <p class="mb-2 fw-bold text-black">Quality Food</p>
                                <p>92%</p>
                            </div>
                            <div class="progress">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 92%" aria-valuenow="92"
                                    aria-valuemin="0" aria-valuemax="92"></div>
                            </div>
                        </div>
                        <div class="d-block my-3">
                            <div class="d-flex justify-content-between">
                                <p class="mb-2 fw-bold text-black">Various Menus</p>
                                <p>90%</p>
                            </div>
                            <div class="progress">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 90%" aria-valuenow="90"
                                    aria-valuemin="0" aria-valuemax="90"></div>
                            </div>
                        </div>
                        <p class="desc mb-3">We consider it our responsibility to provide you with a nutritious meal and the
                            comfort of “Ghar ka Khana”. By ensuring all the basic requirements, we make the food easily
                            affordable within your set budget.</p>
                        <br>
                        <div class="banner-home-button pb-3">
                            <a href="{{ url('about-us
                            ') }}"
                                class="btn btn-site-primary w-auto text-uppercase px-5 py-3 fs-5 booking-btn">About Us</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="home-about-one-img">
                        <img src="{{ asset('public/assets/images/about/home-about-img-2.webp') }}" alt="about">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="rts-about-area rts-section-gapTopBotm" style="background-color: #F9F7F2;" id="services">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="">
                        <span class="w-foods-itilanio">Our Services</span>
                        <h4 class="p-title">Premium Catering Services For Your Taste Only</h4>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="home-about-one-img">
                        <p class="desc fs-5 mb-4">
                            Foodo offers an absolute dining experience with premium corporate lunch catering services that
                            exclusively match your taste. From an elegant menu to unmatchable service, we guarantee you a
                            lasting impression.
                        </p>
                        <div class="banner-home-button mt-5">
                            <a href="#" class="order-btn-contact text-uppercase">All Services</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-10 mt-5">
                    <!--desktop screen-->
                    <div class="row d-none d-md-flex">
                        <!-- Corporate Events Section -->
                        <div class="col-12 col-sm-6 col-md-4 mb-3">
                            <div class="our-services-grid-border">
                                <img src="{{ asset('public/assets/images/about/Corporate-Events-Icon.svg') }}"
                                    alt="Corporate Events" />
                                <h6 class="py-4 m-0">Corporate Events</h6>
                                <p class="desc mb-4">Elevate your corporate event with our premium catering services and
                                    customized menu.</p>
                                <a href="#" class="service-link">
                                    Read more
                                    <i class="fa-solid fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>

                        <!-- Wedding Events Section -->
                        <div class="col-12 col-sm-6 col-md-4 mb-3">
                            <div class="our-services-grid-border">
                                <img src="{{ asset('public/assets/images/about/Wedding-Events-Icon.svg') }}"
                                    alt="Wedding Events" />
                                <h6 class="py-4 m-0">Wedding Events</h6>
                                <p class="desc mb-4">Uplift your event with an exquisite menu that lightens the space and
                                    boosts your energy.</p>
                                <a href="#" class="service-link">
                                    Read more
                                    <i class="fa-solid fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>

                        <!-- Social Events Section -->
                        <div class="col-12 col-sm-6 col-md-4 mb-3">
                            <div class="our-services-grid-border">
                                <img src="{{ asset('public/assets/images/about/Social-Events-Icon.svg') }}"
                                    alt="Social Events" />
                                <h6 class="py-4 m-0">Social Events</h6>
                                <p class="desc mb-4">Grace your social events with our personalized services that fulfill
                                    all the requirements.</p>
                                <a href="#" class="service-link">
                                    Read more
                                    <i class="fa-solid fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Mobile screen carousel -->
                    <div id="mobile-carousel" class="carousel slide d-md-none" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <!-- Corporate Events Slide -->
                            <div class="carousel-item active">
                                <div class="our-services-grid-border">
                                    <img src="{{ asset('public/assets/images/about/Corporate-Events-Icon.svg') }}"
                                        alt="Corporate Events" />
                                    <h6 class="py-4 m-0">Corporate Events</h6>
                                    <p class="desc mb-4">Elevate your corporate event with our premium catering services
                                        and customized menu.</p>
                                    <a href="#" class="service-link">
                                        Read more
                                        <i class="fa-solid fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                            <!-- Wedding Events Slide -->
                            <div class="carousel-item">
                                <div class="our-services-grid-border">
                                    <img src="{{ asset('public/assets/images/about/Wedding-Events-Icon.svg') }}"
                                        alt="Wedding Events" />
                                    <h6 class="py-4 m-0">Wedding Events</h6>
                                    <p class="desc mb-4">Uplift your event with an exquisite menu that lightens the space
                                        and boosts your energy.</p>
                                    <a href="#" class="service-link">
                                        Read more
                                        <i class="fa-solid fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                            <!-- Social Events Slide -->
                            <div class="carousel-item">
                                <div class="our-services-grid-border">
                                    <img src="{{ asset('public/assets/images/about/Social-Events-Icon.svg') }}"
                                        alt="Social Events" />
                                    <h6 class="py-4 m-0">Social Events</h6>
                                    <p class="desc mb-4">Grace your social events with our personalized services that
                                        fulfill all the requirements.</p>
                                    <a href="#" class="service-link">
                                        Read more
                                        <i class="fa-solid fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>

    <!-- menu area start -->
    <div class="rts-about-area rts-section-gapTopBotm bg-white menu-bg" id="menu-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 text-center">
                    <span class="w-foods-itilanio text-site-primary">Our Menu</span>
                    <h5 class="p-title text-white">Finalize Your Menu</h5>
                    <p class="desc text-white">We obtain the best ingredients from our selected vendors and cook the <br>
                        dishes carefully
                        to craft perfection that can be served to your teams.</p>
                </div>
                <div class="col-md-10 p-0 mt-5" style="min-height: 44em;">
                    <div class="shadow bg-white">
                        <ul class="nav nav-tabs menu-tab " id="myTab" role="tablist">
                            @php
                                $menuTypes = \App\Models\MenuType::all();
                            @endphp
                            @foreach ($menuTypes as $key => $menuType)
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link menu-links py-4 {{ $key == 0 ? 'active' : '' }}"
                                        id="Menu{{ $menuType->id }}-tab" data-bs-toggle="tab"
                                        data-bs-target="#Menu{{ $menuType->id }}" type="button" role="tab"
                                        aria-controls="Menu{{ $menuType->id }}" aria-selected="true"
                                        data-type="{{ $menuType->is_custom }}">
                                        {{ $menuType->type }}
                                    </button>
                                </li>
                            @endforeach
                        </ul>
                        <div class="tab-content py-5" id="myTabContent">
                            @foreach ($menuTypes as $key => $menuType)
                                <div class="tab-pane fade {{ $key == 0 ? 'show active' : '' }}"
                                    id="Menu{{ $menuType->id }}" role="tabpanel"
                                    aria-labelledby="Menu{{ $menuType->id }}-tab">
                                    <div class="row justify-content-center px-2 getRow menuRow{{ $menuType->id }}"
                                        data-menurow="{{ $menuType->id }}">
                                        @php
                                            $menuArr['type_id'][$menuType->id]['weeks'] = $menuType->menus->groupBy(
                                                'week',
                                            );
                                        @endphp
                                        @if ($menuType->is_custom != 1)
                                            <div class="col-md-11 menuTab{{ $menuType->id }} menuTab">
                                                <div class="owl{{ $key }} owl-carousel">
                                                    @foreach ($menuType->menus->groupBy('week') as $weekNum => $week)
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <h5 class="text-site-danger">Week {{ $weekNum }}</h5>
                                                            </div>
                                                            @php
                                                                $dayOrder = [
                                                                    'Mon',
                                                                    'Tue',
                                                                    'Wed',
                                                                    'Thu',
                                                                    'Fri',
                                                                    'Sat',
                                                                    'Sun',
                                                                ];
                                                                $sortedWeek = $week->sortBy(function ($menu) use (
                                                                    $dayOrder,
                                                                ) {
                                                                    return array_search($menu->day, $dayOrder);
                                                                });
                                                            @endphp

                                                            @foreach ($sortedWeek as $menu)
                                                                <div class="col-md-6 my-4">
                                                                    <div class="d-flex">
                                                                        <div class="col-3 px-2">
                                                                            <img src="{{ asset($menu->image) }}"
                                                                                alt="placeholder img"
                                                                                class="rounded-circle px-2">
                                                                        </div>
                                                                        <div class="col-9 px-2">
                                                                            <div class="menu-title mb-2">
                                                                                <p class="menu-name">{{ $menu->name }}
                                                                                </p>
                                                                                <div class="menu-divider"></div>
                                                                                <p class="menu-day text-site-danger">
                                                                                    {{ $menu->day }}</p>
                                                                            </div>
                                                                            <div class="menu-desc">
                                                                                {{ $menu->description }}</div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    @endforeach
                                                </div>
                                                <div class="row pt-5">
                                                    <div class="col-md-6 col-4 text-start">
                                                        <div class="custom-owl-nav d-inline-flex">
                                                            <button type="button" role="presentation"
                                                                class="custom-owl-prev me-1"
                                                                data-number="{{ $key }}">
                                                                <i class="fa fa-arrow-left" aria-hidden="true"></i>
                                                            </button>
                                                            <button type="button" role="presentation"
                                                                class="custom-owl-next ms-1"
                                                                data-number="{{ $key }}">
                                                                <i class="fa fa-arrow-right" aria-hidden="true"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-8 text-end">
                                                        <button
                                                            class="btn btn-lg text-uppercase p-4 rounded-5 btn-site-primary w-auto selectMenu"
                                                            data-id="{{ $menuType->id }}">Select
                                                            Menu as Above</button>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <div class="col-md-11 menuTab{{ $menuType->id }} menuTab">
                                                <div class="row">
                                                    <div class="col-md-7">
                                                        <div id="customStepFrom">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <div class="row mb-4">
                                                            <div class="col-12">
                                                                <h5 class="text-site-danger mb-2">Select Your Meal</h5>
                                                            </div>
                                                            <div class="col-6">
                                                                <input type="text" name="meal"
                                                                    class="site-input required from-control-lg"
                                                                    id="meal" placeholder="Search Meals">
                                                            </div>
                                                            <div class="col-6">
                                                                <select name="type"
                                                                    class="site-select custom-meal-selector"
                                                                    id="type">
                                                                    @foreach ($menuTypes as $key => $menuTypeItem)
                                                                        @if ($menuTypeItem->is_custom != 1)
                                                                            <option value="{{ $menuTypeItem->id }}"
                                                                                data-count="{{ $menuTypeItem->days_count }}">
                                                                                {{ $menuTypeItem->type }}</option>
                                                                        @endif
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="row mealUl" style="max-height: 30em; overflow-y:auto">
                                                            @foreach ($menuType->menus->unique('name') as $menu)
                                                                <div class="col-12 my-3 meal-item"
                                                                    data-name="{{ $menu->name }}"
                                                                    data-id="{{ $menu->id }}">
                                                                    <div class="d-flex">
                                                                        <div class="col-3 px-2">
                                                                            <img src="{{ asset($menu->image) }}"
                                                                                alt="placeholder img"
                                                                                class="rounded-circle">
                                                                        </div>
                                                                        <div class="col-9 px-2">
                                                                            <div class="menu-title mb-2">
                                                                                <p class="menu-name">{{ $menu->name }}
                                                                                </p>
                                                                                <div class="menu-divider"></div>
                                                                            </div>
                                                                            <div class="menu-desc">
                                                                                {{ $menu->description }}</div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end menu area start -->

    {{-- <div class="rts-about-area rts-section-gapTopBotm"> --}}
    <div class="rts-about-area">
        <div class="container">
            {{-- hide our services --}}
            {{-- <div class="row">
                <div class="col-md-12 text-center">
                    <span class="w-foods-itilanio">Our Work</span>
                    <h3 class="p-title">Our Working Proccess</h3>
                    <p class="desc">We obtain the best ingredients from our selected vendors and cook the <br> dishes
                        carefully
                        to craft perfection that can be served to your teams.</p>
                </div>
            </div>
            <br />

            <div class="row pt-5 text-center d-none d-md-flex">
                <div class="col-md-4 mb-4">
                    <div>
                        <span class="bg-danger rounded-circle p-4 text-white fw-bold">
                            01
                        </span>
                        <div class="border border-2 border-danger p-5 position-relative m-auto working-process">
                            <img src="{{ asset('public/assets/images/working-process/appointment.svg') }}"
                                alt="placeholder img" />
                        </div>
                    </div>
                    <h6 class="my-3">Make an Appointment</h6>
                    <p class="desc px-5 fs-5">Book an appointment with us to get the best-cooked and flavorous meals
                        for your teams</p>
                </div>
                <div class="col-md-4 mb-4">
                    <div>
                        <span class="bg-danger rounded-circle p-4 text-white fw-bold">
                            02
                        </span>
                        <div class="border border-2 border-danger p-5 position-relative m-auto working-process">
                            <img src="{{ asset('public/assets/images/working-process/food.svg') }}"
                                alt="placeholder img" />
                        </div>
                    </div>
                    <h6 class="my-3">Pay Your Catering</h6>
                    <p class="desc px-5 fs-5">We offer secure payment options for corporate lunch catering services to
                        ensure a hassle-free process.</p>
                </div>
                <div class="col-md-4 mb-4">
                    <div>
                        <span class="bg-danger rounded-circle p-4 text-white fw-bold">
                            03
                        </span>
                        <div class="border border-2 border-danger p-5 position-relative m-auto working-process">
                            <img src="{{ asset('public/assets/images/working-process/catering.svg') }}"
                                alt="placeholder img" />
                        </div>
                    </div>
                    <h6 class="my-3">Enjoy Your Food</h6>
                    <p class="desc px-5 fs-5">Order the flavorful food and enjoy it with your team and boost the energy
                        of your workspace.</p>
                </div>
            </div> --}}

            <!-- Mobile Carousel View -->
            <div id="workingProcessCarousel" class="carousel slide d-md-none" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <!-- Step 1 -->
                    <div class="carousel-item active">
                        <div class="text-center">
                            <span class="bg-danger rounded-circle p-4 text-white fw-bold">01</span>
                            <div class="border border-2 border-danger p-5 position-relative m-auto working-process">
                                <img src="{{ asset('public/assets/images/working-process/appointment.svg') }}"
                                    alt="placeholder img" />
                            </div>
                            <h6 class="my-3">Make an Appointment</h6>
                            <p class="desc px-5 fs-5">Book an appointment with us to get the best-cooked and flavorous
                                meals for your teams</p>
                        </div>
                    </div>
                    <!-- Step 2 -->
                    <div class="carousel-item">
                        <div class="text-center">
                            <span class="bg-danger rounded-circle p-4 text-white fw-bold">02</span>
                            <div class="border border-2 border-danger p-5 position-relative m-auto working-process">
                                <img src="{{ asset('public/assets/images/working-process/food.svg') }}"
                                    alt="placeholder img" />
                            </div>
                            <h6 class="my-3">Pay Your Catering</h6>
                            <p class="desc px-5 fs-5">We offer secure payment options for corporate lunch catering
                                services to ensure a hassle-free process.</p>
                        </div>
                    </div>
                    <!-- Step 3 -->
                    <div class="carousel-item">
                        <div class="text-center">
                            <span class="bg-danger rounded-circle p-4 text-white fw-bold">03</span>
                            <div class="border border-2 border-danger p-5 position-relative m-auto working-process">
                                <img src="{{ asset('public/assets/images/working-process/catering.svg') }}"
                                    alt="placeholder img" />
                            </div>
                            <h6 class="my-3">Enjoy Your Food</h6>
                            <p class="desc px-5 fs-5">Order the flavorful food and enjoy it with your team and boost
                                the energy of your workspace.</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- testimonial area start -->
    <div class="rts-testimonial-area rts-section-gap">
        <div class="container-fluid p-0">
            <div class="testimonial-area-inner">
                <div class="banner-one-wrapper">
                    <h4 class="mb-5" data-sal="slide-up" data-sal-delay="170" data-sal-duration="800">
                        Our Taste Speaks Through <br> <span class="text-danger">Hundreds of Clients</span>
                    </h4>
                </div>

                <div class="swiper-testimonial-main-wrapper">
                    <div class="swiper swiper-testimonials-1" data-sal="slide-up" data-sal-delay="1500"
                        data-sal-duration="800">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="testimonial-wrapper">
                                    <div class="content">
                                        <span class="w-foods-itilanio">Testimonial</span>
                                        <h4 class="text-danger">What They Say</h4>
                                        <img src="{{ asset('public/assets/images/team/01.webp') }}"
                                            class="rounded-circle border border-2 border-danger testimonial-img m-auto"
                                            alt="placeholder img">
                                        <div class="rating my-3">
                                            <i class="fa-solid fa-star text-danger"></i>
                                            <i class="fa-solid fa-star text-danger"></i>
                                            <i class="fa-solid fa-star text-danger"></i>
                                            <i class="fa-solid fa-star text-danger"></i>
                                            <i class="fa-solid fa-star text-danger"></i>
                                        </div>
                                        <h3>
                                            <em>Foodo's lunch service is a game-changer! Fresh, flavorful, and perfectly
                                                portioned meals delivered on time every day. The variety in their menu keeps
                                                me excited for lunch. Highly recommended for anyone seeking quality and
                                                convenience!</em>
                                        </h3>
                                    </div>
                                    <div class="author text-center m-0 p-0">
                                        <h5 class="title fs-4">Ayesha Khan:</h5>
                                        <p class="sub-title fs-6 fw-light">Corporate Employee</p>
                                    </div>
                                </div>
                            </div>

                            <div class="swiper-slide">
                                <div class="testimonial-wrapper">
                                    <div class="content">
                                        <span class="w-foods-itilanio">Testimonial</span>
                                        <h4 class="text-danger">What They Say</h4>
                                        <img src="{{ asset('public/assets/images/team/01.webp') }}"
                                            class="rounded-circle border border-2 border-danger testimonial-img m-auto"
                                            alt="placeholder img">
                                        <div class="rating my-3">
                                            <i class="fa-solid fa-star text-danger"></i>
                                            <i class="fa-solid fa-star text-danger"></i>
                                            <i class="fa-solid fa-star text-danger"></i>
                                            <i class="fa-solid fa-star text-danger"></i>
                                            <i class="fa-solid fa-star text-danger"></i>
                                        </div>
                                        <h3>
                                            <em>Foodo takes the hassle out of lunch planning. Their delicious and healthy
                                                meals have become the highlight of my workday. With Foodo, I can focus on my
                                                work without worrying about what to eat. Truly satisfying and worth every
                                                penny!</em>
                                        </h3>
                                    </div>
                                    <div class="author text-center m-0 p-0">
                                        <h5 class="title fs-4">Ali Raza:</h5>
                                        <p class="sub-title fs-6 fw-light">Corporate Employee</p>
                                    </div>
                                </div>
                            </div>

                            <div class="swiper-slide">
                                <div class="testimonial-wrapper">
                                    <div class="content">
                                        <span class="w-foods-itilanio">Testimonial</span>
                                        <h4 class="text-danger">What They Say</h4>
                                        <img src="{{ asset('public/assets/images/team/01.webp') }}"
                                            class="rounded-circle border border-2 border-danger testimonial-img m-auto"
                                            alt="placeholder img">
                                        <div class="rating my-3">
                                            <i class="fa-solid fa-star text-danger"></i>
                                            <i class="fa-solid fa-star text-danger"></i>
                                            <i class="fa-solid fa-star text-danger"></i>
                                            <i class="fa-solid fa-star text-danger"></i>
                                            <i class="fa-solid fa-star text-danger"></i>
                                        </div>
                                        <h3>
                                            <em>I love Foodo's variety and quality. The taste reminds me of homemade food,
                                                and the convenience is unmatched. Their punctual delivery and attention to
                                                detail make them my go-to lunch service every day!</em>
                                        </h3>
                                    </div>
                                    <div class="author text-center m-0 p-0">
                                        <h5 class="title fs-4">Sana Ahmed:</h5>
                                        <p class="sub-title fs-6 fw-light">Corporate Employee</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- testimonial area end -->

    <div class="rts-about-area rts-section-gapTopBotm" style="background-color: #F9F7F2;" id="pricing">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 text-center mb-4">
                    <span class="w-foods-itilanio">Our Packages</span>
                    <h4 class="p-title">Choose Your Menu – Choices for <br>Foodies Like You!</h4>
                </div>
                <!-- Desktop Grid View -->
                <div class="row pt-5 text-center d-none d-md-flex justify-content-center">
                    <div class="col-md-3">
                        <div class="px-3 py-5 border border-danger text-center d-grid my-3"
                            style="border-radius:15px; min-height: 25em;">
                            <div>
                                <h5 class="fs-4 mb-3">Hostel Menu</h5>
                                <h4 class="text-danger fs-3 mb-0">30 Individuals</h4>
                                <p class="m-0 fw-light fs-6 border-bottom">Minimum</p>
                            </div>
                            <ul class="list-unstyled">
                                <li><i class="fa fa-check me-4 text-danger"></i>7 days a week</li>
                                <li><i class="fa fa-check me-4 text-danger"></i>Selected items only</li>
                                <li><i class="fa fa-check me-4 text-danger"></i>Free Delivery</li>
                            </ul>
                            <a href="tel:+92 337 0777019"
                                class="btn btn-site-primary w-auto text-uppercase px-5 py-3 fs-5 booking-btn">Book Now</a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="px-3 py-5 border border-danger text-center d-grid my-3"
                            style="border-radius:15px; min-height: 25em;">
                            <div>
                                <h5 class="fs-4 mb-3">Corporate Menu</h5>
                                <h4 class="text-danger fs-3 mb-0">30 Individuals</h4>
                                <p class="m-0 fw-light fs-6 border-bottom">Minimum</p>
                            </div>
                            <ul class="list-unstyled">
                                <li><i class="fa fa-check me-4 text-danger"></i>5 days a week</li>
                                <li><i class="fa fa-check me-4 text-danger"></i>8 Main Course Menu</li>
                                <li><i class="fa fa-check me-4 text-danger"></i>All Menu Items</li>
                                <li><i class="fa fa-check me-4 text-danger"></i>Free Delivery</li>
                            </ul>
                            <a href="tel:+92 337 0777019"
                                class="btn btn-site-primary w-auto text-uppercase px-5 py-3 fs-5 booking-btn">Book Now</a>
                        </div>
                    </div>
                </div>

                <!-- Mobile Carousel View -->
                <div id="menuCarousel" class="carousel slide d-md-none" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <!-- Hostel Menu -->
                        <div class="carousel-item active">
                            <div class="text-center">
                                <div class="px-3 py-5 border border-danger text-center d-grid my-3"
                                    style="border-radius:15px; min-height: 25em;">
                                    <div>
                                        <h5 class="fs-4 mb-3">Hostel Menu</h5>
                                        <h4 class="text-danger fs-3 mb-0">30 Individuals</h4>
                                        <p class="m-0 fw-light fs-6 border-bottom">Minimum</p>
                                    </div>
                                    <ul class="list-unstyled">
                                        <li><i class="fa fa-check me-4 text-danger"></i>7 days a week</li>
                                        <li><i class="fa fa-check me-4 text-danger"></i>Selected items only</li>
                                        <li><i class="fa fa-check me-4 text-danger"></i>Free Delivery</li>
                                    </ul>
                                    <a href="tel:+92 337 0777019"
                                        class="btn btn-site-primary w-auto text-uppercase px-5 py-3 fs-5 booking-btn">Book
                                        Now</a>
                                </div>
                            </div>
                        </div>
                        <!-- Corporate Menu -->
                        <div class="carousel-item">
                            <div class="text-center">
                                <div class="px-3 py-5 border border-danger text-center d-grid my-3"
                                    style="border-radius:15px; min-height: 25em;">
                                    <div>
                                        <h5 class="fs-4 mb-3">Corporate Menu</h5>
                                        <h4 class="text-danger fs-3 mb-0">30 Individuals</h4>
                                        <p class="m-0 fw-light fs-6 border-bottom">Minimum</p>
                                    </div>
                                    <ul class="list-unstyled">
                                        <li><i class="fa fa-check me-4 text-danger"></i>5 days a week</li>
                                        <li><i class="fa fa-check me-4 text-danger"></i>8 Main Course Menu</li>
                                        <li><i class="fa fa-check me-4 text-danger"></i>All Menu Items</li>
                                        <li><i class="fa fa-check me-4 text-danger"></i>Free Delivery</li>
                                    </ul>
                                    <a href="tel:+92 337 0777019"
                                        class="btn btn-site-primary w-auto text-uppercase px-5 py-3 fs-5 booking-btn">Book
                                        Now</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

    <div class="rts-about-area rts-section-gapTopBotm bg-white booking-bg mb-lg-0 mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7 text-center">
                    <h5 class="p-title text-white">Ready to Book The Catering For <br> Your Special Event?</h5>
                    <p class="desc text-white">Get our best corporate lunch catering services for your special event and
                        ensure a <br>smooth interplay of flavors and aromas emanating from our delicious food.</p>
                    <a href="tel:+92 337 0777019"
                        class="btn btn-warning border-none w-auto py-3 px-5 fs-4 rounded-0 text-uppercase">Schedule Taste
                        Testing</a>
                </div>
            </div>
        </div>
    </div>
    <!-- blog area start -->
    @include('site.inc.blogs')
    <!-- blog area end -->
    <input type="hidden" value="{{ json_encode($menuArr) }}" id="menues">
    <input type="hidden" value="{{ json_encode($menuTypes) }}" id="menueTypes">
@endsection
@push('scripts')
    <script src="{{ asset('public/assets/js/index.js') }}"></script>
@endpush
