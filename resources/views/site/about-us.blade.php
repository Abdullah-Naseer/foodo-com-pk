@extends('layouts.app')

@section('content')
    @push('styles')
        <style>
            .banner {
                background: url('public/assets/images/about-us-banner.webp') center center/cover no-repeat;
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
                position: relative;
                z-index: 2;
                font-size: 48px;
                font-weight: 700;
                text-transform: uppercase;
                color: #fff;
            }

            .about-section {
                padding: 60px 0;
            }
        </style>
    @endpush

    <div class="banner">
        <h1>About Us</h1>
    </div>

    <section class="about-section">
        <div class="container">
            <p>Welcome to FOODO, your first choice for clean, fresh homemade food delivered to your doorstep right in the
                middle of Gulberg, Lahore. We are proud to be the top hygiene lunch service provider in Gulberg Lahore,
                offering healthy, clean, and nutritious food to hostels, corporate offices.</p>
            <div class="row align-items-center g-5">
                <div class="col-md-6">
                    <h2>Our Story</h2>
                    <p>
                        As with great ideas, all great ideas stem from a simple observation: food shouldn't be complicated -
                        it simply should be fresh, clean, and made with love. In today’s fast-paced lifestyle, especially in
                        corporate culture, healthy eating is often compromised for convenience. That’s where FOODO steps in.
                    <p>
                        We saw the need for healthy homemade food in Gulberg for the hostel and corporate offices, and came
                        up with a solution for bringing healthy, home-cooked meals to working professionals and students.
                        Our mission is to ensure people are energetic, alert, and happy without sacrificing their health for
                        unhealthy takeout meals or skipping meals altogether.
                    </p>
                </div>
                <div class="col-md-6">
                    <img src="{{ asset('public/assets/images/about-us1.webp') }}" alt="Our Story" class="about-img">
                </div>
            </div>
        </div>
    </section>

    <section class="about-section bg-light">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-md-6">
                    <img src="{{ asset('public/assets/images/about-us2.webp') }}" alt="Our Vision" class="about-img">
                </div>
                <div class="col-md-6">
                    <h2>What sets FOODO apart</h2>
                    <p>
                        We don't just deliver meals; we also deliver care, hygiene, and comfort with every box. We have a
                        dedicated team of chefs, nutritionists, and delivery agents to ensure every meal is nutritious,
                        tasty, and delivered at the right time.
                    </p>
                    <p>
                        The following are the characteristics of FOODO that differentiate it from the other lunch program
                        vendors:
                    </p>
                    <ul style="padding-left: 1rem;">
                        <li><strong>Freshly Prepared Meals:</strong> We make our food fresh every day with fresh local
                            ingredients. No preservatives, no shortcuts. Just real food made by real people.</li>
                        <li><strong>Office-focused business:</strong> We build corporate meal plans for office professionals
                            to deliver consistent quality and punctuality. We understand how an office operates and adjust
                            our service accordingly.</li>
                        <li><strong>Student & hostel friendly:</strong> We serve the hostel residents who miss the feel of
                            home-cooked meals. Your lunch will be prepared like mom's home cooked meals at FOODO, with care.
                        </li>
                        <li><strong>Affordable and Fast Lunch Delivery in Lahore Gulberg:</strong> We price our lunch boxes
                            cheaply and still do not sacrifice quality. Whether you're a large business or ordering for
                            yourself, we’ve got you covered.</li>
                        <li><strong>The best hygiene lunch service provider:</strong> Cleanliness and safety are the most
                            important elements to us. Every step from the kitchen to the table follows the highest hygiene
                            standards.</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection
