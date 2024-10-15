@extends('layouts.landing.layouts')

@section('title')
    Category
@endsection
@section('content')
    <style>
        /* تنسيق الكارد */
        .service-item {
            overflow: hidden;
            /* لضمان عدم امتداد المحتوى خارج الكارد */
            border-radius: 0.5rem;
            /* زاوية دائرية للكارد */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            /* ظل خفيف للكارد */
        }

        /* تنسيق الصورة */
        .service-img {
            height: 200px;
            /* تحديد ارتفاع ثابت */
            width: 100%;
            /* عرض الصورة يتوافق مع عرض الكارد */
            overflow: hidden;
            /* لضمان عدم ظهور الصورة خارج الإطار */
        }

        .service-img img {
            height: 100%;
            /* ملء ارتفاع الحاوية */
            width: 100%;
            /* ملء عرض الحاوية */
            object-fit: cover;
            /* تغطية الصورة بشكل مناسب دون تشويه */
        }

        /* تنسيق محتوى الكارد */
        .service-content {
            padding: 1.5rem;
            /* حشو محتوى الكارد */
        }

        .service-content-inner a {
            display: block;
            /* عرض الرابط ككتلة */
            color: #333;
            /* لون النص */
            text-decoration: none;
            /* إزالة التسطير من الرابط */
        }

        .service-content-inner p {
            margin-bottom: 1rem;
            /* المسافة أسفل الفقرة */
        }


    </style>
    <!-- Header Start -->
    <div class="container-fluid bg-primary">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h4 class="text-light display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">{{ __('Categories') }}</h4>
            <ol class="breadcrumb d-flex justify-content-center mb-4 wow fadeInDown" data-wow-delay="0.3s">
                <li class="breadcrumb-item"><a class="text-light" href="/">{{ __('Home') }}</a></li>
                <li class="breadcrumb-item {{ App::getLocale() === 'en' ? 'text-align-item' : '' }}"><a
                    class="text-light"></a></li>
                {{-- <li class="breadcrumb-item"><a class="text-light" href="#">Pages</a></li> --}}
                <li class="breadcrumb-item active text-dark">{{ __('Categories') }}</li>
            </ol>
        </div>
    </div>
    <!-- Header End -->

    <!-- Service Start -->
    <div class="container-fluid service py-5">
        <div class="container py-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                <h4 class="text-primary">{{ __('Our Category') }}</h4>
                {{-- <h1 class="display-4 mb-4">We Provide Best Services</h1> --}}
                {{-- <p class="mb-0">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Tenetur adipisci facilis
                    cupiditate recusandae aperiam temporibus corporis itaque quis facere, numquam, ad culpa deserunt
                    sint dolorem autem obcaecati, ipsam mollitia hic.
                </p> --}}
            </div>

            @if ($categories->isEmpty())
                <h4 class="text-center mb-2">
                    {{ __('No Products Available') }}
                </h4>
            @endif
            <div class="row g-4 justify-content-center">
                @foreach ($categories as $category)
                    <div class="col-md-6 col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="service-item">
                            <div class="service-img">
                                <img src="{{ asset('storage/' . $category->image) }}" class="img-fluid rounded-top w-100"
                                    alt="">
                            </div>
                            <div class="service-content p-4">
                                <div class="service-content-inner">
                                    <a href="#" class="d-inline-block h4 mb-4">
                                        {{ App::getLocale() === 'ar' ? $category->category_name_ar : $category->category_name }}</a>
                                    {{-- <p class="mb-4">
                                    {{ App::getLocale() === 'ar' ? $category->description_ar : $category->description }}
                                </p> --}}
                                    <a class="btn btn-primary rounded-pill py-2 px-4"
                                        href="{{ route('public.category', $category->id) }}">{{ __('Read More') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <!-- أزرار التنقل بين الصفحات مع تنسيق Bootstrap -->
                <div class="d-flex justify-content-center mt-4">
                    {{ $categories->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->
@endsection
