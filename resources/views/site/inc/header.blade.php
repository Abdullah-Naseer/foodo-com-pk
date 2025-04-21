    <!-- header area start -->
    <header class="header-four header--sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="header-main-wrapper">
                        <div class="logo-area">
                            <a href="{{ url('/') }}" class="logo">
                                <img src="{{ asset('public/assets/images/logo/foodo-logo.webp') }}" alt="image-logo">
                            </a>
                        </div>
                        <div class="rts-header-mid">
                            <!-- nav area start -->
                            <div class="main-nav-desk nav-area">
                                <nav>
                                    <ul>
                                        <li><a class="nav-link" href="{{ url('/') }}">Home</a></li>
                                        {{-- <li><a class="nav-link" href="#services">Services</a></li> --}}
                                        <li><a class="nav-link" href="{{ url('/') }}#menu-section">Menu</a></li>
                                        {{-- <li><a class="nav-link" href="#pricing">Pricing</a></li> --}}
                                        <li><a class="nav-link" href="{{ url('blogs') }}">Blog</a></li>
                                        <li><a class="nav-link" href="{{ url('about-us') }}">About Us</a></li>
                                        <li><a class="nav-link" href="{{ url('contact-us') }}">Contact</a></li>
                                    </ul>
                                </nav>
                            </div>
                            <!-- nav-area end -->
                        </div>
                        <!-- header right start -->
                        <div class="rts-header-right">
                            <div class="query-list rounded-0 px-5">
                                <a href="tel:+92 337 0777019" class="m-0"><span class="text-heading text-uppercase">Get Started</span></a>
                            </div>
                            <div class="menu-area d-md-none d-block" id="menu-btn">
                                <a href="#" class="nav-menu-link menu-button">
                                    <span class="dot1"></span>
                                    <span class="dot2"></span>
                                    <span class="dot3"></span>
                                    <span class="dot4"></span>
                                </a>
                            </div>
                        </div>
                        <!-- header right end -->
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header area end -->

    <!-- side bar for desktop -->
    <div id="side-bar" class="side-bar header-one">
        <div class="inner">
            <button class="close-icon-menu"><i class="far fa-times"></i></button>
            <!-- mobile menu area start -->
            <div class="mobile-menu d-block d-lg-none">
                <nav class="nav-main mainmenu-nav mt--30">
                    <ul class="mainmenu" id="mobile-menu-active">
                        <li><a class="nav-link" href="{{ url('/') }}">Home</a></li>
                        <li><a class="nav-link" href="#about">About Us</a></li>
                        <li><a class="nav-link" href="#services">Services</a></li>
                        <li><a class="nav-link" href="#menu-section">Menu</a></li>
                        <li><a class="nav-link" href="#pricing">Pricing</a></li>
                        <li><a class="nav-link" href="#blog">Blog</a></li>
                        <li><a class="nav-link" href="tel:+92 337 0777019">Contact</a></li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- mobile menu area end -->
    </div>
    <!-- header style two End -->
