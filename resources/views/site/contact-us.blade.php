@extends('layouts.app')

@section('content')
    @push('styles')
        <style>
            .banner {
                background: url('public/assets/images/meet-chef.webp') center center/cover no-repeat;
                height: 250px;
                display: flex;
                align-items: center;
                justify-content: center;
                position: relative;
                color: white;
                text-align: center;
            }

            .banner::before {
                content: "";
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-color: rgba(7, 28, 52, 0.7);
                z-index: 1;
            }

            .banner h1 {
                z-index: 2;
                font-size: 40px;
                font-weight: 700;
                text-transform: uppercase;
                color: #fff
            }
        </style>
    @endpush

    <div class="banner">
        <h1>Contact Us</h1>
    </div>

    <section class="contact-page-sec py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-4 d-flex">
                    <div class="contact-info-item h-100 w-100">
                        <div class="contact-info-icon">
                            <i class="fas fa-map-marked"></i>
                        </div>
                        <div class="contact-info-text">
                            <h2>Address</h2>
                            <span> <a href="https://g.co/kgs/jPXq4ns" class="text-white"> Nathain Pind, H no 1 St, 6 Firdous
                                    Mkt Rd, Gulberg III, Lahore, 54660, Pakistan</a></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 d-flex">
                    <div class="contact-info-item h-100 w-100">
                        <div class="contact-info-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="contact-info-text">
                            <h2>Email</h2>
                            <span> <a href="mailto:info@foodo.com.pk" class="text-white">info@foodo.com.pk </a></span>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 d-flex">
                    <div class="contact-info-item h-100 w-100">
                        <div class="contact-info-icon">
                            <i class="fas fa-phone"></i>
                        </div>
                        <div class="contact-info-text">
                            <h2>Phone</h2>
                            <span> <a href="tel:+92 337 0777019" class="text-white">tel:+92 337 0777019 </a></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="contact-page-form mt-5">
                <h2>Get in Touch</h2>

                @if (session('success') || session('error'))
                    <div class="alert alert-{{ session('success') ? 'success' : 'danger' }} alert-dismissible fade show"
                        role="alert">
                        <strong>{{ session('success') ? 'Thank you!' : 'Oops!' }}</strong>
                        {{ session('success') ?? session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <form action="{{ route('contactForm') }}" method="POST">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-4">
                            <input type="text" name="name" placeholder="Your Name" required>
                        </div>
                        <div class="col-md-4">
                            <input type="email" name="email" placeholder="E-mail" required>
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="phone" placeholder="Phone Number" required>
                        </div>

                        <div class="col-md-12">
                            <textarea name="message" placeholder="Write Your Message" rows="5" required></textarea>
                        </div>
                        <div class="col-md-12">
                            <input type="submit" value="Send Now">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
