@extends('layouts.app')

@section('content')
@section('noIndex')
    <meta name="robots" content="noindex, nofollow">
@endsection
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
                color: #fff;
            }
        </style>
    @endpush

    <div class="banner">
        <h1>Privacy and Policies</h1>
    </div>

    <section class="privacy-section">
        <div class="container">
            <p><strong>At FOODO</strong>, we value your privacy and online safety. This Privacy & Policy page outlines our
                privacy policies when you visit our website and use our services. By accessing our website, you agree to the
                practices stated in this policy.</p>

            <h2>Information We Collect</h2>
            <p><strong>Personal Information:</strong> When you place an order or contact us, we might collect personal
                information that we will need to process your orders, such as:</p>
            <ul>
                <li>Your name</li>
                <li>Delivery address</li>
                <li>Email address</li>
                <li>Telephone number</li>
                <li>Payment information</li>
            </ul>
            <p>We need this information to understand your needs, support you as our customer, and communicate with you over
                the phone or email regarding our services.</p>

            <h2>How We Use Your Information</h2>
            <p>We use the data we collect for few reasons, including:</p>
            <ul>
                <li><strong>Order Fulfillment:</strong> To execute your orders, verify your details, and ensure your order
                    is delivered promptly.</li>
                <li><strong>Customer Services:</strong> To respond to your queries, feedback, or service requests. </li>
                <li><strong>Marketing and Promotions:</strong> With your consent, we may send you promotional emails or
                    newsletters about our services, new products, or special deals, and you will always have the option to
                    unsubscribe from these communications. </li>
                <li><strong>Improving Our Services:</strong> To enhance our website performance, explore how our website is
                    being used, and improve our food.</li>
            </ul>

            <h2>Data Protection and Security</h2>
            <p>We take your privacy very seriously and demand serious security measures when protecting your data. Sensitive
                data, like payment information, is encrypted by secure technology (SSL) to keep your transactions secure.
                While we take all possible measures to protect your information, please note, no service is completely
                secure, and we cannot ensure absolute security.</p>

            <h2>Links to Third-Party Websites</h2>
            <p>This site may have links to third-party sites. Links are provided for your convenience only, and we are not
                responsible for the privacy practices of these external websites. We encourage you to review the privacy
                policies of any third-party sites you visit, because even if you enter them from this site, those policies
                could differ from ours.</p>

            <h2>Your Rights and Choices</h2>
            <p>You have the right to:</p>
            <ul>
                <li><strong>Access and Amend Your Information:</strong> You may ask to see the personal information we hold
                    about you and correct/ amend any errors.
                </li>
                <li><strong>Opt Out of Marketing communications:</strong> If you no longer want to receive marketing
                    communications, you may unsubscribe using the link provided in our emails or contact us directly.</li>
                <li><strong>Request Deletion of Your Data:</strong> You may request that we delete your personal
                    information, except when we are required to keep it for legal or contractual reasons.
                </li>
            </ul>

            <h2>Changes to This Privacy Policy</h2>
            <p>We may update this privacy policy from time to time to reflect changes to our practices or applicable legal
                requirements. Modifications will be uploaded to this page, and the
                "Effective Date" will be updated. We encourage you to review our policy regularly to ensure that you are
                aware of how we secure your information.
            </p>

            <h2>Contact Us</h2>
            <p>If you have any questions, concerns, or requests regarding our privacy policy or how we handle your data,
                please contact us.</p>
        </div>
    </section>
@endsection
