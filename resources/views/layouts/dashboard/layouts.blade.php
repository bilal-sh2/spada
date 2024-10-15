<!DOCTYPE html>
<html class="loading" lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>Dashboard</title>
    <link rel="apple-touch-icon" href="/app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="/img/logo/Spada-Logo-Primary.png">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/vendors-rtl.min.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/charts/apexcharts.css">
    {{-- <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/extensions/toastr.min.css"> --}}
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="/app-assets/css-rtl/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css-rtl/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css-rtl/colors.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css-rtl/components.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css-rtl/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css-rtl/themes/bordered-layout.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css-rtl/themes/semi-dark-layout.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="/app-assets/css-rtl/core/menu/menu-types/horizontal-menu.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css-rtl/pages/dashboard-ecommerce.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css-rtl/plugins/charts/chart-apex.css">
    {{-- <link rel="stylesheet" type="text/css" href="/app-assets/css-rtl/plugins/extensions/ext-component-toastr.css"> --}}
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="/app-assets/css-rtl/custom-rtl.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/style-rtl.css">
    <!-- END: Custom CSS-->
    {{-- <link rel="stylesheet" type="text/css" href="/app-assets/css-rtl/plugins/extensions/ext-component-sweet-alerts.css"> --}}

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />


       <!-- *************************** Sweet Alert ***************************** -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

        <style>
            .brand-logo img{
                max-width: 100px !important;
            }
        </style>
</head>
<!-- END: Head-->

<body class="horizontal-layout horizontal-menu  navbar-floating footer-static  " data-open="hover" data-menu="horizontal-menu" data-col="">

        <!-- BEGIN: Header-->
        <nav class="header-navbar navbar-expand-lg navbar navbar-fixed align-items-center navbar-shadow navbar-brand-center" data-nav="brand-center">
            <div class="navbar-header d-xl-block d-none">
                <ul class="nav navbar-nav">
                    <li class="nav-item"><a class="navbar-brand" href="/dashboard">
                        <span class="brand-logo">
                            <img src="/img/logo/Spada-Logo-Primary.png" alt="">
                        </span>
                        </a></li>
                </ul>
            </div>
            <div class="navbar-container d-flex content">
                <div class="bookmark-wrapper d-flex align-items-center">
                    <ul class="nav navbar-nav d-xl-none">
                        <li class="nav-item"><a class="nav-link menu-toggle" href="#"><i class="ficon" data-feather="menu"></i></a></li>
                    </ul>
                </div>
                <ul class="nav navbar-nav align-items-center ms-auto">
                    <li class="nav-item dropdown dropdown-language">
                        <a class="nav-link dropdown-toggle" id="dropdown-flag" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="flag-icon {{ App::getLocale() === 'ar' ? 'flag-icon-sa' : 'flag-icon-us' }}"></i>
                            <span class="selected-language">{{ App::getLocale() === 'ar' ? 'العربية' : 'English' }}</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-flag">
                            <a class="dropdown-item" href="{{ route('lang.switch', 'en') }}" data-language="en">
                                <i class="flag-icon flag-icon-us"></i> English
                            </a>
                            <a class="dropdown-item" href="{{ route('lang.switch', 'ar') }}" data-language="ar">
                                <i class="flag-icon flag-icon-sa"></i> العربية
                            </a>
                        </div>
                    </li>
                    <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-style"><i class="ficon" data-feather="moon"></i></a></li>
                    <li class="nav-item dropdown dropdown-user"><a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <div class="user-nav d-sm-flex d-none"><span class="user-name fw-bolder">{{ Auth::user()->name }}</span><span class="user-status">{{ Auth::user()->email }}</span></div><span class="avatar"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-user"><a class="dropdown-item" href="{{route('profile.show')}}"><i class="me-50" data-feather="user"></i> {{ __('Profile') }}</a>
                            <span class="dropdown-item"onclick="logout_form()"><i class="me-50" data-feather="power"></i> {{ __('Log Out') }}</span>
                            <form method="POST" action="{{ route('logout') }}" style="display: none;" id="logout-form">
                            @csrf
                                <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- END: Header-->
        <!-- BEGIN: Main Menu-->
        <div class="horizontal-menu-wrapper">
            <div class="header-navbar navbar-expand-sm navbar navbar-horizontal floating-nav navbar-light navbar-shadow menu-border container-xxl" role="navigation" data-menu="menu-wrapper" data-menu-type="floating-nav">
                <div class="navbar-header">
                    <ul class="nav navbar-nav flex-row">
                        <li class="nav-item me-auto"><a class="navbar-brand" href="{{ route('dashboard')}}">
                            <span class="brand-logo">
                                <img src="/img/logo/Spada-Logo-Primary.png" alt="" >
                            </span>

                            </a></li>
                        <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse"><i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i></a></li>
                    </ul>
                </div>
                <div class="shadow-bottom"></div>
                <!-- Horizontal menu content-->
                <div class="navbar-container main-menu-content" data-menu="menu-container">
                    <!-- include ../../../includes/mixins-->
                    <ul class="nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation">
                        <li class="" data-menu=""><a class="dropdown-item d-flex align-items-center" href="/dashboard" data-bs-toggle="">
                            <i data-feather="home"></i><span>{{ __('Dashboard') }}</span></a>
                        </li>
                        <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link d-flex align-items-center" href="" data-bs-toggle="dropdown"><i class="fa-solid fa-list fs-4"></i><span>{{ __('Category') }}</span></a>
                            <ul class="dropdown-menu" data-bs-popper="none">
                                <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="{{route('category.index')}}" data-bs-toggle="">
                                    <span>{{ __('Categories') }}</span></a>
                                </li>
                                <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="{{route('category.create')}}" data-bs-toggle="">
                                    <span>{{ __('Create Category') }}</span></a>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link d-flex align-items-center" href="/products" data-bs-toggle="dropdown"> <i class="fa-solid fa-shop fs-4"></i><span>{{ __('Products') }}</span></a>
                            <ul class="dropdown-menu" data-bs-popper="none">
                                <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="{{route('products.index')}}" data-bs-toggle="">
                                    <span>{{ __('Products') }}</span></a>
                                </li>
                                <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="{{route('products.create')}}" data-bs-toggle="">
                                    <span>{{ __('Create Products') }}</span></a>
                                </li>
                            </ul>
                        </li>

                        <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link d-flex align-items-center" href="" data-bs-toggle="dropdown"> <i class="fa-solid fa-newspaper fs-4"></i><span>{{ __('Articles') }}</span></a>
                            <ul class="dropdown-menu" data-bs-popper="none">
                                <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="{{route('article.index')}}" data-bs-toggle="">
                                    <span>{{ __('Articles') }}</span></a>
                                </li>
                                <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="{{route('article.create')}}" data-bs-toggle="">
                                    <span>{{ __('Create Article') }}</span></a>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link d-flex align-items-center" href="" data-bs-toggle="dropdown"><i class="fa-regular fa-circle-play fs-4"></i><span>{{ __('Videos') }}</span></a>
                            <ul class="dropdown-menu" data-bs-popper="none">
                                <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="{{route('video.index')}}" data-bs-toggle="">
                                    <span>{{ __('Videos') }}</span></a>
                                </li>
                                <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="{{route('video.create')}}" data-bs-toggle="">
                                    <span>{{ __('Add Video') }}</span></a>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link d-flex align-items-center" href="" data-bs-toggle="dropdown"><i class="fa-solid fa-list fs-4"></i><span>{{ __('carousel') }}</span></a>
                            <ul class="dropdown-menu" data-bs-popper="none">
                                <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="{{route('carousel.index')}}" data-bs-toggle="">
                                    <span>{{ __('carousel') }}</span></a>
                                </li>
                                <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="{{route('carousel.create')}}" data-bs-toggle="">
                                    <span>{{ __('Create carousel') }}</span></a>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link d-flex align-items-center" href="" data-bs-toggle="dropdown"><i class="fa-solid fa-list fs-4"></i><span>{{ __('branches') }}</span></a>
                            <ul class="dropdown-menu" data-bs-popper="none">
                                <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="{{route('branches.index')}}" data-bs-toggle="">
                                    <span>{{ __('branches') }}</span></a>
                                </li>
                                <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="{{route('branches.create')}}" data-bs-toggle="">
                                    <span>{{ __('Create branch') }}</span></a>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link d-flex align-items-center" href="" data-bs-toggle="dropdown"><i class="fa-solid fa-circle-info fs-4"></i><span>{{ __('Web Information') }}</span></a>
                            <ul class="dropdown-menu" data-bs-popper="none">
                                <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="{{route('info.index')}}" data-bs-toggle="">
                                    <span>{{ __('Web Information') }}</span></a>
                                </li>
                                {{-- <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="{{route('info.create')}}" data-bs-toggle="">
                                    <span>{{ __('Add Informations') }}</span></a>
                                </li> --}}
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- END: Main Menu-->
    {{-- <h1>Hello</h1> --}}

    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">

            @yield('content')
        </div>


    </div>

    <!-- BEGIN: Vendor JS-->
    <script src="/app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="/app-assets/vendors/js/ui/jquery.sticky.js"></script>
    <script src="/app-assets/vendors/js/charts/apexcharts.min.js"></script>
    {{-- <script src="/app-assets/vendors/js/extensions/toastr.min.js"></script> --}}
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="/app-assets/js/core/app-menu.js"></script>
    <script src="/app-assets/js/core/app.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="/app-assets/js/scripts/pages/dashboard-ecommerce.js"></script>
    <!-- END: Page JS-->
    {{-- <script src="/app-assets/js/scripts/extensions/ext-component-sweet-alerts.js"></script> --}}

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
    </script>

     <!-- سكربت تسجيل الخروج -->
     <script>
        function logout_form() {
            document.getElementById('logout-form').submit();
            // Swal.fire({
            //     title: 'Are you sure?',
            //     text: "You won't be able to revert this!",
            //     icon: 'warning',
            //     showCancelButton: true,
            //     confirmButtonColor: '#3085d6',
            //     cancelButtonColor: '#d33',
            //     confirmButtonText: 'Yes, delete it!'
            // }).then((result) => {
            //     if (result.isConfirmed) {
            //         document.getElementById('delete-form-' + item_id).submit();
            //     }
            // });
        }
        </script>
</body>


