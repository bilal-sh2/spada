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
<style>
    /* الخلفية الرئيسية لعرض المنتج */
    .bg-show {
        background-color: #f9f9f9;
        border-radius: 20px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        padding: 30px;
    }

    /* تنسيق صورة المنتج */
    .product-img img {
        border-radius: 15px;
        transition: transform 0.3s ease;
    }

    .product-img img:hover {
        transform: scale(1.05);
    }

    /* تحسين محاذاة النصوص بناءً على اللغة */
    .text-align-ar {
        text-align: right;
    }

    .text-align-en {
        text-align: left;
    }

    /* تنسيق قسم المنتجات ذات الصلة */
    .related-products {
        padding: 60px 0;
        background-color: #fff;
    }

    .related-products .card-product {
        transition: transform 0.3s, box-shadow 0.3s;
        border: none;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
    }

    .related-products .card-product:hover {
        transform: translateY(-10px);
        box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15);
    }

    .card__price {
        background-color: rgba(255, 255, 255, 0.8);
        padding: 5px 10px;
        border-radius: 5px;
        position: absolute;
        top: 15px;
        left: 15px;
        font-weight: bold;
    }

    .card__title {
        font-size: 1.25rem;
        margin-top: 10px;
    }

    .card__subtitle {
        font-size: 0.9rem;
        color: #6c757d;
    }

    /* أزرار التنقل */
    .custom-nav {
        display: flex;
        justify-content: center;
        gap: 15px;
        margin-top: 20px;
    }

    .custom-nav .btn {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background-color: #007bff;
        color: #fff;
        border: none;
        transition: background-color 0.3s ease;
    }

    .custom-nav .btn:hover {
        background-color: #0056b3;
    }

    /* تحسينات إضافية */
    .breadcrumb-item a {
        text-decoration: none;
        color: #fff;
    }

    .breadcrumb-item.active {
        color: #fff;
    }

    /* تأثيرات WOW.js */
    .wow {
        visibility: hidden;
        animation-duration: 1s;
        animation-fill-mode: both;
    }

    .animated {
        visibility: visible;
    }
</style>

<!-- Header Start -->
{{-- <div class="container-fluid bg-primary">
    <div class="container text-center py-5" style="max-width: 900px;">
        <h4 class="text-light display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s"> {{ __('Show Product') }}</h4>
        <ol class="breadcrumb d-flex justify-content-center mb-4 wow fadeInDown" data-wow-delay="0.3s">
            <li class="breadcrumb-item"><a class="text-light" href="/"> {{ __('Home') }}</a></li>
            <li class="breadcrumb-item {{ App::getLocale() === 'ar' ? 'text-align-ar' : '' }}"><a class="text-light"></a></li>
            <li class="breadcrumb-item"><a class="text-light" href="{{ route('public.category', $product->category->id) }}"> {{ __('Category') }}</a></li>
            <li class="breadcrumb-item active">{{ __('Show Product') }}</li>
        </ol>
    </div>
</div> --}}
<!-- Header End -->

<!-- Product Detail Start -->
<div class="container py-5 card my-5 bg-show">
    <div class="row">
        <!-- صورة المنتج -->
        <div class="col-12 col-md-6 col-lg-5 mb-4">
            <div class="product-img">
                <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid w-100" alt="{{ App::getLocale() === 'ar' ? $product->name_ar : $product->name }}">
            </div>
        </div>
        <!-- معلومات المنتج -->
        <div class="col-12 col-md-6 col-lg-7">
            <div class="service-content-inner">
                <h3 class="mb-3 text-primary">{{ __('Product Name') }}</h3>
                <h4 class="mb-4">{{ App::getLocale() === 'ar' ? $product->name_ar : $product->name }}</h4>
                <h3 class="mb-3 text-primary">{{ __('Category') }}</h3>
                <h4 class="mb-4">{{ $product->category->category_name }}</h4>
                <h4 class="text-primary">{{ __('Description:') }}</h4>
                <hr>
                <div class="{{ App::getLocale() === 'ar' ? 'text-align-ar' : 'text-align-en' }}">
                    {!! App::getLocale() === 'ar' ? $product->description_ar : $product->description !!}
                </div>
                <div class="mt-4">
                    <a href="{{ route('public.category', $product->category->id) }}" class="btn btn-outline-primary rounded-pill px-4">
                        {{ __('Back to Category') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Product Detail End -->

<!-- Related Products Start -->
<div class="container related-products">
    <div class="text-center pb-5 wow fadeInUp" data-wow-delay="0.2s">
        <h4 class="text-primary">{{ __('Related Products') }}</h4>
        <h1 class="display-4 mb-4">{{ __('You May Also Like') }}</h1>
    </div>
    <div class="row g-4 justify-content-center">
        @foreach ($relatedProducts as $product)
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

    <!-- أزرار التنقل -->
    <div class="custom-nav">
        <button class="btn  custom-prev">
            <i class="fa-solid fa-arrow-left"></i>
        </button>
        <button class="btn  custom-next">
            <i class="fa-solid fa-arrow-right"></i>
        </button>
    </div>
</div>
<!-- Related Products End -->

<!-- إضافة سكريبتات WOW.js إذا لم تكن مضافة -->
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
<script>
    new WOW().init();
</script>
@endpush

@endsection
