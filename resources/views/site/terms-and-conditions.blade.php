@extends('layouts.app')

@section('content')
    @push('styles')
        <style>
            .banner {
                background: url('https://images.unsplash.com/photo-1498654896293-37aacf113fd9?auto=format&fit=crop&w=1470&q=80') center center/cover no-repeat;
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
                font-size: 42px;
                font-weight: bold;
                color: #fff
            }
        </style>
    @endpush

    <div class="banner">
        <h1>Terms & Conditions</h1>
    </div>

    <section class="terms-section">
        <div class="container">
            <p>Welcome to <strong>FOODO</strong>! These Terms and Conditions ("Terms") govern your use of our website and
                services, including our homemade meal deliveries and catering. By using our site or services, you agree to
                these terms.</p>
            <p>The Terms and Conditions outlined here are important, so we recommend reading and understanding them. They
                are intended to guide everyone on the proper route. If you have any questions, please contact us at any
                time.</p>
            <h2>Definitions</h2>
            <ul>
                <li><strong>"We"</strong>, <strong>"us"</strong>, <strong>"our"</strong>, <strong>"the Company"</strong>
                    Refers to <strong>FOODO</strong>, the provider of homemade meals and catering services.</li>
                <li><strong>"You"</strong>, <strong>"your"</strong>, <strong>"Customer"</strong>, <strong>"Client"</strong>
                    refer to any user who browses our site, places an order, subscribes to our services, or engages with our
                    catering options.</li>
                <li><strong>Services</strong> refers to daily lunch deliveries, customized corporate plans, and catering
                    services for events.</li>
            </ul>
            <h2>All applicable laws. </h2>
            <p class="mb-4">The current terms and conditions. </p>
            <p>Any other terms that apply to a specific program that is accessible by, related to, or affiliated with the
                Site, which (together) form an agreement between you and us. Your continued access to or use of the Site
                following any modifications to this agreement signifies your acceptance of the changes. If you find these
                terms to be unacceptable, please do not access, engage, or use the Site. </p>


            <h2>General Terms</h2>
            <ul>
                <li>Users are strongly encouraged to read and understand the Terms and Conditions applicable to the use of
                    this website or making orders for daily lunch or catering services. Users may not duplicate, change, or
                    republish content present on this website, including the Terms. </li>
                <li>All materials on the site (including photographs, menus, branding, and text) are the intellectual
                    property of <strong>FOODO</strong> and are subject to applicable laws of copyright and trademark.</li>
                <li><strong>FOODO</strong> is committed to providing the best possible homemade foods and delivery/catering
                    services. We reserve the right to change the service, prices, delivery zones, and any other aspect of
                    the platform at our discretion, with or without warning. We will never bill you for services without
                    clearly explaining the charges. </li>
            </ul>
            <p>In addition, we reserve the right to modify the Terms and Conditions from time to time. We rely on your usage
                of our services to indicate acceptance of the terms and conditions following changes to the terms and
                conditions.</p>

            <h2>User Content</h2>
            <ul>
                <li>When you submit any content on our website or any other associated site, including reviews, comments,
                    suggestions, images, or feedback, you provide FOODO with, non-exclusive, royalty-free, perpetual, and
                    worldwide licensing to use, reproduce, change, and display the content for improvement of our services,
                    marketing, or any lawful purpose. </li>
                <li>Users are prohibited from posting or sharing any content that is offensive, deceptive, illegal, or
                    violates the rights of others. Although we have the absolute right to monitor, edit, or delete
                    user-generated content at our sole discretion, we are not obliged to do so, or to remove any particular
                    user-generated content.</li>
                <li>The user assumes full responsibility for any content posted and agrees to hold harmless
                    <strong>FOODO</strong>, any of its affiliates, and their respective officers, directors, and employees,
                    from any claims due to their submitted content.
                </li>
            </ul>

            <h2>Service Terms</h2>
            <ul>
                <li><strong>Upfront Payment Required:</strong> Full, final payment is required for all orders before
                    delivery or service. No preparation or shipping will occur until your payment has cleared.</li>
                <li><strong>No Refund Policy:</strong> Certain factors will not result in a refund in the event of a
                    cancellation, change, or issue due to the client. This may include, but is not limited to, incorrect
                    delivery information, changing the guest count, a last-minute change in the guest count, cancellation,
                    etc. Please double-check all order information before confirming.</li>
                <li><strong>Tasting Session:</strong> We offer a tasting of our food before committing to regular food
                    service, event catering services, etc. You and or your guest will be able to taste the food and ensure
                    that it meets your expectations of taste, quality, and portion sizes.
                </li>
                <li><strong>Delivery Radius:</strong> Our food delivery area is currently located within a 5 km distance
                    from our kitchen located in Gulberg, Lahore. If you are located outside of our delivery radius, please
                    contact us directly to see what arrangements can be made.</li>
                <li><strong>Minimum Order Required:</strong> There is a minimum of 30 persons to satisfy any order for all
                    services, i.e., daily food deliveries, catering for events, etc. Should a minimum order of 30 persons
                    cause a concern, please consult with us to see if an exception can be considered, but only if arranged
                    in advance.</li>
            </ul>
        </div>
    </section>
@endsection
