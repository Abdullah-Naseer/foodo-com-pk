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

            .faq-section {
                padding: 60px 0;
            }
        </style>
    @endpush

    <div class="banner">
        <h1>Frequently Asked Questions</h1>
    </div>

    <section class="faq-section">
        <div class="container">
            <div class="text-center mb-4 mx-auto" style="max-width: 700px;">
                <h2 class="fs-1 fw-bold mb-2">Got questions? We've got answers!</h2>
                <p class="text-secondary">Before you send us a message, check out these quick FAQs — we might already have
                    your lunch plans sorted.</p>
            </div>


            @php
                $faqs = [
                    'What type of food are you serving?' =>
                        'At Foodo, we serve homemade meals—the meals you might recognize as something you would get at home for lunch, not in a box that comes from the microwave that left you wondering if you should have just called for takeout. Our menus rotate weekly and include a mixture of desi classics, healthy options, and feel-good comfort food.',
                    'Is your food homemade?' =>
                        'Yes! There are no factories, frozen batches waiting for your order. Our meals are freshly made on the day that you order them using all of the local ingredients that passionate home chefs can source from the market, homes, and their community, prepared how they would for their own families. With just a few clicks, we will bring their love to your desk.',
                    'How do I order?' =>
                        'That’s the easy part! You can order online or just WhatsApp us. For those who join on a corporate package, we will organize your weekly plan so you can simply wait for the meals to meet you!',
                    'Where do you deliver?' =>
                        'We currently deliver in Gulberg, Johar Town, and the area surrounding Lahore. If your office is just past our delivery area, then send us a message, and we can see what options we can offer!',
                    'Does your food become boring after some time?' =>
                        "Never! Our menu rotates every week, and we keep it interesting with surprise items added to the menu, as well as seasonal favorites and different spins on what you liked. If you're feeling aloo gosht, you may see a chicken lasagna or a daal makhni roll in your next box.",
                    'Can we have a trial before subscribing?' =>
                        "Seriously!! We totally understand that you want to taste it first before committing to subscribe, just message us and we'll send you a sample lunch for a one-day trial. No pressure, just flavor.",
                    'Do you have meals for night shifts or late workers?' =>
                        'Currently, we are only catering to the lunch/ daytime delivery segment, and we know that late-night warriors deserve love too. If there is sufficient demand, we are totally in. You can even register your interest and we will keep you informed.',
                    'Can we get Foodo for a team meeting or office event?' =>
                        'Yes. We cater for group orders, meetings, training, and office parties. Just give us a shout, and we will set you up with something special. You can expect more variety, larger portions, and food that makes everyone want to stay for the meeting (seriously!).',
                    'Do you have any guilt-free or diet-conscious meals?' =>
                        'Yes! We offer lighter meals, clean eating options, and veggie-packed combos for those watching their carbs or calories. Think grilled proteins, lentil bowls, and wholesome khichdi that tastes good.',
                    'Who do I contact if there’s an issue with my order?' =>
                        'Oh no! That’s rare, but if it happens, we’re just a message away. You can WhatsApp us or use the contact form on our site. We’re real people and we care. Promise.',
                ];
            @endphp

            <div class="accordion" id="faqAccordion">
                @foreach ($faqs as $question => $answer)
                    @php $id = Str::slug($question, '-'); @endphp
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading-{{ $id }}">
                            <button class="accordion-button {{ !$loop->first ? 'collapsed' : '' }}" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapse-{{ $id }}"
                                aria-expanded="{{ $loop->first ? 'true' : 'false' }}"
                                aria-controls="collapse-{{ $id }}">
                                {{ $question }}
                            </button>
                        </h2>
                        <div id="collapse-{{ $id }}"
                            class="accordion-collapse collapse {{ $loop->first ? 'show' : '' }}"
                            aria-labelledby="heading-{{ $id }}" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                {{ $answer }}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
