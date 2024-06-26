<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Blog</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    @yield('head')
    <!-- Facebook and Twitter integration -->
    <meta property="og:title" content="" />
    <meta property="og:image" content="" />
    <meta property="og:url" content="" />
    <meta property="og:site_name" content="" />
    <meta property="og:description" content="" />
    <meta name="twitter:title" content="" />
    <meta name="twitter:image" content="" />
    <meta name="twitter:url" content="" />
    <meta name="twitter:card" content="" />

    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,700,900" rel="stylesheet">
    <link href="{{ asset('blog_template/fonts/css.css') }}" rel="stylesheet">
    <!-- Animate.css -->
    <link rel="stylesheet" href="{{ asset('blog_template/css/animate.css') }}">
    <!-- Icomoon Icon Fonts-->
    <link rel="stylesheet" href="{{ asset('blog_template/css/icomoon.css') }}">
    <!-- Bootstrap  -->
    <link rel="stylesheet" href="{{ asset('blog_template/css/bootstrap.css') }}">

    <!-- Magnific Popup -->
    <link rel="stylesheet" href="{{ asset('blog_template/css/magnific-popup.css') }}">

    <!-- Flexslider  -->
    <link rel="stylesheet" href="{{ asset('blog_template/css/flexslider.css') }}">

    <!-- Owl Carousel -->
    <link rel="stylesheet" href="{{ asset('blog_template/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('blog_template/css/owl.theme.default.min.css') }}">

    <!-- Flaticons  -->
    <link rel="stylesheet" href="{{ asset('blog_template/fonts/flaticon/font/flaticon.css') }}">

    <!-- Theme style  -->
    <link rel="stylesheet" href="{{ asset('blog_template/css/style.css') }}">
    @yield('css')
    <!-- Modernizr JS -->
    <script src="{{ asset('blog_template/js/modernizr-2.6.2.min.js') }}"></script>
    <!-- FOR IE9 below -->
    <!--[if lt IE 9]>
 <script src="js/respond.min.js"></script>
 <![endif]-->

</head>

<body>

    <div id="page">
        @yield('content')
    </div>

    <div class="gototop js-top">
        <a href="#" class="js-gotop"><i class="icon-arrow-up2"></i></a>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('blog_template/js/jquery.min.js') }}"></script>
    <!-- jQuery Easing -->
    <script src="{{ asset('blog_template/js/jquery.easing.1.3.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('blog_template/js/bootstrap.min.js') }}"></script>
    <!-- Waypoints -->
    <script src="{{ asset('blog_template/js/jquery.waypoints.min.js') }}"></script>
    <!-- Stellar Parallax -->
    <script src="{{ asset('blog_templatejs/jquery.stellar.min.js') }}"></script>
    <!-- Flexslider -->
    <script src="{{ asset('blog_template/js/jquery.flexslider-min.js') }}"></script>
    <!-- Owl carousel -->
    <script src="{{ asset('blog_template/js/owl.carousel.min.js') }}"></script>
    <!-- Magnific Popup -->
    <script src="{{ asset('blog_template/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('blog_template/js/magnific-popup-options.js') }}"></script>
    <!-- Counters -->
    <script src="{{ asset('blog_template/js/jquery.countTo.js') }}"></script>
    <!-- Main -->
    <script src="{{ asset('blog_template/js/main.js') }}"></script>
    @yield('js')
</body>

</html>
