@extends('layouts.landing.layouts')

@section('content')
    <style>
        /* تنسيق الكارد */
        .service-item {
            overflow: hidden;
            border-radius: 0.5rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .service-img {
            height: 400px;
            width: 100%;
            overflow: hidden;
        }
        .img-height img{
            max-height: 350px;
            width: 100%;
            /* overflow: hidden; */
            object-fit: contain;
        }

        .service-img img {
            height: 100%;
            width: 100%;
            object-fit: cover;
        }

        /* تنسيق محتوى الكارد */
        .service-content {
            padding: 1.5rem;
        }

        .service-content-inner a {
            display: block;
            color: #333;
            text-decoration: none;
        }

        .service-content-inner p {
            margin-bottom: 1rem;
        }
    </style>
    <!-- Header Start -->
    <div class="container-fluid bg-primary">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h4 class="text-light display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">{{ __('Products') }}</h4>
            <ol class="breadcrumb d-flex justify-content-center mb-4 wow fadeInDown" data-wow-delay="0.3s">
                <li class="breadcrumb-item"><a class="text-light" href="/">{{ __('Home') }}</a></li>
                {{-- <li class="breadcrumb-item"><a class="text-light" href="#">Pages</a></li> --}}
                <li class="breadcrumb-item active text-dark">{{ __('Products') }}</li>
            </ol>
        </div>
    </div>
    <!-- Header End -->

    <!-- Service Start -->
    <div class="container-fluid service py-5">
        <div class="container py-5">
            <div class="text-center mx-auto pb-5 wow {{ App::getLocale() === 'ar' ? 'fadeInRight' : 'fadeInLeft' }}"
                data-wow-delay="0.2s" style="max-width: 800px;">
                <h3 class="text-primary">{{ __('Our Products') }}</h3>
                {{-- <h1 class="display-4 mb-4">We Provide Best Services</h1> --}}
                {{-- <p class="mb-0">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Tenetur adipisci facilis
                    cupiditate recusandae aperiam temporibus corporis itaque quis facere, numquam, ad culpa deserunt
                    sint dolorem autem obcaecati, ipsam mollitia hic.
                </p> --}}
            </div>

            @if ($products->isEmpty())
                <h4 class="text-center mb-2">
                    {{ __('No Products Available') }}
                </h4>
            @endif
                <div class="row g-4 justify-content-center">
                    <h3 class="text-center mb-2">
                        {{ __('Products') }}
                    </h3>
                    @foreach ($products as $product)
                            <div class="col-md-6 col-lg-3 wow {{ App::getLocale() === 'ar' ? 'fadeInRight' : 'fadeInLeft' }}"
                                data-wow-delay="0.2s">
                                <div class="service-item">
                                    <div class="service-img">
                                        <img src="{{ asset('storage/' . $product->image) }}"
                                            class="img-fluid rounded-top w-100" alt="{{ App::getLocale() === 'ar' ? $product->name_ar : $product->name }}">
                                    </div>
                                    <div class="service-content p-4">
                                        <div class="service-content-inner">
                                            <a href="#" class="d-inline-block h4 mb-4">
                                                {{ App::getLocale() === 'ar' ? $product->name_ar : $product->name }}
                                            </a>
                                            {{-- <p class="mb-4">
                                    {{$product->description}}
                                </p> --}}
                                            <a class="btn btn-primary rounded-pill py-2 px-4"
                                                href="{{ route('public.product', $product->id) }}">{{ __('Read More') }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    @endforeach
                </div>

            <!-- أزرار التنقل بين الصفحات مع تنسيق Bootstrap -->
            <div class="d-flex justify-content-center mt-4">
                {{ $products->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
    <!-- Service End -->
@endsection
