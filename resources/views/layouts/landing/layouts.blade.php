<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">

<head>
    <meta charset="utf-8">
    <title>SPADA</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Inter:slnt,wght@-10..0,100..900&display=swap" rel="stylesheet">

    <link rel="shortcut icon" type="image/x-icon" href="/img/logo/Spada-Logo-Primary.png">
    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link rel="stylesheet" href="/lib/animate/animate.min.css" />
    <link href="/lib/lightbox/css/lightbox.min.css" rel="stylesheet">
    <link href="/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="/css/style.css" rel="stylesheet">
    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

    <!-- Owl Carousel JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- WOW.js -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow.js/1.1.2/wow.min.js"></script>
    <script>
        new WOW().init();
    </script>

    <!-- Typed.js -->
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>

    @yield('style')

    <style>
        .text-align-item {
            display: none;
        }

        .pagination .page-item .page-link {
            color: #e30613;
            border-radius: 50%;
            padding: 10px 15px;
        }

        .pagination .page-item.active .page-link {
            background-color: #e30613;
            color: #fff;
            border-color: #e30613;
        }

        /* Optional: Style for the element with typing effect */
        #typing-effect {
            font-size: 2rem;
            font-weight: bold;
            color: #333;
            text-align: center;
            margin: 20px;
        }

        /* Fade In/Out Effect */
        .fade-text-container {
            position: relative;
            height: 60px;
            overflow: hidden;
            text-align: center;
        }

        .fade-text {
            position: absolute;
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            font-weight: bold;
            color: #333;
            opacity: 0;
            transition: opacity 1s ease-in-out;
        }

        .fade-text.active {
            opacity: 1;
        }

        .fade-text-container .fade-text:nth-child(1) {
            animation: fadeInOut 8s infinite;
        }

        .fade-text-container .fade-text:nth-child(2) {
            animation: fadeInOut 8s infinite 4s;
        }

        @keyframes fadeInOut {
            0% { opacity: 0; }
            25% { opacity: 1; }
            75% { opacity: 1; }
            100% { opacity: 0; }
        }

        /* Jumping Text Effect */
        .jumping-text-container {
            position: relative;
            height: 60px;
            overflow: hidden;
        }

        .jumping-text {
            position: absolute;
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            font-weight: bold;
            color: #333;
            animation: jump 8s infinite;
        }

        @keyframes jump {
            0% { transform: translateY(100%); }
            25% { transform: translateY(0); }
            50% { transform: translateY(-100%); }
            75% { transform: translateY(0); }
            100% { transform: translateY(100%); }
        }

        /* Sliding Text Effect */
        .sliding-text-container {
            overflow: hidden;
            position: relative;
            height: 60px;
        }

        .sliding-text {
            position: absolute;
            width: 100%;
            display: flex;
            align-items: center;
            font-size: 2rem;
            font-weight: bold;
            color: #333;
            white-space: nowrap;
            animation: slide 8s linear infinite;
        }

        @keyframes slide {
            0% { transform: translateX(100%); }
            100% { transform: translateX(-100%); }
        }
    </style>
</head>

<body>

    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->
    <div class="container-fluid nav-bar px-0 px-lg-4 py-lg-0">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a href="/" class="navbar-brand p-0">
                    <img src="/img/logo/Spada-Logo-Primary.png" alt="Logo">
                </a>
                <div class="d-flex">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                        <span class="fa fa-bars"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav mx-0 mx-lg-auto">
                        <a href="/" class="nav-item nav-link active">{{ __('Home') }}</a>
                        <a href="{{ route('web.category') }}" class="nav-item nav-link">{{ __('Categories') }}</a>
                        <a href="/about-us" class="nav-item nav-link">{{ __('About us') }}</a>
                        <a href="{{ route('web.articles') }}" class="nav-item nav-link">{{ __('Blogs') }}</a>
                        <a href="{{ route('web.videos') }}" class="nav-item nav-link">{{ __('Videos') }}</a>
                        <a href="/contact-us" class="nav-item nav-link">{{ __('Contact us') }}</a>
                    </div>
                </div>

                <!-- إضافة خيار اللغة خارج حدود الأقسام -->
                <div class="dropdown ms-3">
                    <a href="#" class="dropdown-toggle text-dark" data-bs-toggle="dropdown">
                        <small>
                            <i class="fas fa-globe-europe text-primary me-2"></i>
                            {{ App::getLocale() === 'ar' ? 'العربية' : 'English' }}
                        </small>
                    </a>
                    <div class="dropdown-menu rounded">
                        <a href="{{ route('lang.switch', 'en') }}" class="dropdown-item">English</a>
                        <a href="{{ route('lang.switch', 'ar') }}" class="dropdown-item">العربية</a>
                    </div>
                </div>
            </nav>
        </div>
    </div>

    <!-- Navbar & Hero End -->

    <!-- Modal Search Start -->
    <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content rounded-0">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Search by keyword</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex align-items-center bg-primary">
                    <div class="input-group w-75 mx-auto d-flex">
                        <input type="search" class="form-control p-3" placeholder="keywords"
                            aria-describedby="search-icon-1">
                        <span id="search-icon-1" class="btn bg-light border nput-group-text p-3"><i
                                class="fa fa-search"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Search End -->

    @yield('content')

    <!-- Footer Start -->
    <div class="container-fluid footer py-1 wow fadeIn" data-wow-delay="0.2s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-xl-9">
                    {{-- <div class="mb-5">
                        <div class="row g-4">
                            <div class="col-md-6 col-lg-6 col-xl-5">
                                <div class="footer-item">
                                    <a href="index.html" class="p-0">
                                        <h3 class="text-white"><i class="fab fa-slack me-3"></i> LifeSure</h3>
                                        <!-- <img src="/img/logo.png" alt="Logo"> -->
                                    </a>
                                    <p class="text-white mb-4">Dolor amet sit justo amet elitr clita ipsum elitr
                                        est.Lorem ipsum dolor sit amet, consectetur adipiscing...</p>
                                    <div class="footer-btn d-flex">
                                        <a class="btn btn-md-square rounded-circle me-3" href="#"><i
                                                class="fab fa-facebook-f"></i></a>
                                        <a class="btn btn-md-square rounded-circle me-3" href="#"><i
                                                class="fab fa-twitter"></i></a>
                                        <a class="btn btn-md-square rounded-circle me-3" href="#"><i
                                                class="fab fa-instagram"></i></a>
                                        <a class="btn btn-md-square rounded-circle me-0" href="#"><i
                                                class="fab fa-linkedin-in"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6 col-xl-3">
                                <div class="footer-item">
                                    <h4 class="text-white mb-4">Useful Links</h4>
                                    <a href="#"><i class="fas fa-angle-right me-2"></i> About Us</a>
                                    <a href="#"><i class="fas fa-angle-right me-2"></i> Features</a>
                                    <a href="#"><i class="fas fa-angle-right me-2"></i> Services</a>
                                    <a href="#"><i class="fas fa-angle-right me-2"></i> FAQ's</a>
                                    <a href="#"><i class="fas fa-angle-right me-2"></i> Blogs</a>
                                    <a href="#"><i class="fas fa-angle-right me-2"></i> Contact</a>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6 col-xl-4">
                                <div class="footer-item">
                                    <h4 class="mb-4 text-white">Instagram</h4>
                                    <div class="row g-3">
                                        <div class="col-4">
                                            <div class="footer-instagram rounded">
                                                <img src="/img/instagram-footer-1.jpg" class="img-fluid w-100"
                                                    alt="">
                                                <div class="footer-search-icon">
                                                    <a href="/img/instagram-footer-1.jpg"
                                                        data-lightbox="footerInstagram-1" class="my-auto"><i
                                                            class="fas fa-link text-white"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="footer-instagram rounded">
                                                <img src="/img/instagram-footer-2.jpg" class="img-fluid w-100"
                                                    alt="">
                                                <div class="footer-search-icon">
                                                    <a href="/img/instagram-footer-2.jpg"
                                                        data-lightbox="footerInstagram-2" class="my-auto"><i
                                                            class="fas fa-link text-white"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="footer-instagram rounded">
                                                <img src="/img/instagram-footer-3.jpg" class="img-fluid w-100"
                                                    alt="">
                                                <div class="footer-search-icon">
                                                    <a href="/img/instagram-footer-3.jpg"
                                                        data-lightbox="footerInstagram-3" class="my-auto"><i
                                                            class="fas fa-link text-white"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="footer-instagram rounded">
                                                <img src="/img/instagram-footer-4.jpg" class="img-fluid w-100"
                                                    alt="">
                                                <div class="footer-search-icon">
                                                    <a href="/img/instagram-footer-4.jpg"
                                                        data-lightbox="footerInstagram-4" class="my-auto"><i
                                                            class="fas fa-link text-white"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="footer-instagram rounded">
                                                <img src="/img/instagram-footer-5.jpg" class="img-fluid w-100"
                                                    alt="">
                                                <div class="footer-search-icon">
                                                    <a href="/img/instagram-footer-5.jpg"
                                                        data-lightbox="footerInstagram-5" class="my-auto"><i
                                                            class="fas fa-link text-white"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="footer-instagram rounded">
                                                <img src="/img/instagram-footer-6.jpg" class="img-fluid w-100"
                                                    alt="">
                                                <div class="footer-search-icon">
                                                    <a href="/img/instagram-footer-6.jpg"
                                                        data-lightbox="footerInstagram-6" class="my-auto"><i
                                                            class="fas fa-link text-white"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <div class="pt-5" style="border-top: 1px solid rgba(255, 255, 255, 0.08);">
                        <div class="row g-0">
                            <div class="col-12">
                                <div class="row g-4">
                                    <div class="col-lg-6 col-xl-4">
                                        <div class="d-flex">
                                            <div class="btn-xl-square bg-primary text-white rounded p-4 me-4">
                                                <i class="fas fa-map-marker-alt fa-2x"></i>
                                            </div>
                                            <div class="mx-2">
                                                <h4 class="text-white">{{ __('Address') }}</h4>
                                                <p class="mb-0">
                                                    {{ App::getLocale() === 'ar' ? $info->address_ar : $info->address }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-xl-4">
                                        <div class="d-flex">
                                            <div class="btn-xl-square bg-primary text-white rounded p-4 me-4">
                                                <i class="fas fa-envelope fa-2x"></i>
                                            </div>
                                            <div class="mx-2">
                                                <h4 class="text-white">{{ __('Mail Us') }}</h4>
                                                <p class="mb-0">{{ $info->email }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-xl-4">
                                        <div class="d-flex">
                                            <div class="btn-xl-square bg-primary text-white rounded p-4 me-4">
                                                <i class="fa fa-phone-alt fa-2x"></i>
                                            </div>
                                            <div class="mx-2">
                                                <h4 class="text-white">{{ __('Telephone') }}</h4>
                                                <p class="mb-0">{{ $info->phone_number }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>

    <!-- Back to Top -->
    <a href="#" class="btn btn-primary rounded-circle back-to-top"><i class="fa fa-chevron-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/lib/wow/wow.min.js"></script>
    <script src="/lib/easing/easing.min.js"></script>
    <script src="/lib/waypoints/waypoints.min.js"></script>
    <script src="/lib/counterup/counterup.min.js"></script>
    <script src="/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="/lib/lightbox/js/lightbox.min.js"></script>
    <script src="/lib/isotope/isotope.pkgd.min.js"></script>

    <!-- Template Javascript -->
    <script src="/js/main.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var options = {
                stringsElement: '#typing-content',
                typeSpeed: 50,
                backSpeed: 25,
                backDelay: 1000,
                startDelay: 500,
                loop: true
            };

            var typed = new Typed('#typing-effect', options);
        });
    </script>

</body>
</html>
