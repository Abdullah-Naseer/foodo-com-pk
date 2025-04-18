<!DOCTYPE html>
<html lang="en">
@include('site.inc.header-head')


<body class="home-four">

    @include('site.inc.header')
    @yield('content')
    <!-- footer -->
    @include('site.inc.footer')

    <!-- jquery js -->
    <script src="{{ asset('public/assets/js/plugins/jquery.min.js') }}"></script>
    <!-- jquery ui -->
    <script src="{{ asset('public/assets/js/vendor/jqueryui.js') }}"></script>
    <script src="{{ asset('public/assets/js/plugins/swiper.js') }}"></script>
    <!-- metismenu js -->
    <script src="{{ asset('public/assets/js/vendor/metisMenu.min.js') }}"></script>
    <!-- sal animation -->
    <script src="{{ asset('public/assets/js/vendor/sal.min.js') }}"></script>
    <!-- bootstrap JS -->
    <script src="{{ asset('public/assets/js/plugins/bootstrap.min.js') }}"></script>
    <!-- easing JS -->
    <script src="{{ asset('public/assets/js/plugins/jquery-slideNav.js') }}"></script>
    <!-- easing JS -->
    <!-- main js -->
    <script src="{{ asset('public/assets/js/main.js') }}"></script>
    <!--<script src="{{ asset('public/assets/css/plugins/owlcarousel/dist/owl.carousel.min.js') }}"></script>-->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <!--<script src="{{ asset('public/assets/js/plugins/jquery-steps/jquery.steps.js') }}"></script>-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-steps/1.1.0/jquery.steps.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.15.3/sweetalert2.min.js"></script>
    @stack('scripts')
</body>

</html>
