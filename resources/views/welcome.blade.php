@extends('layouts.landing.layouts')

@section('content')
    <style>
        .custom-nav {
            text-align: center;
            margin-top: 20px;
        }

        .custom-prev,
        .custom-next {
            border: none;
            padding: 10px 20px;
            margin: 5px;
            cursor: pointer;
            border-radius: 5px;
            font-size: 16px;
        }
    </style>
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

        .service-content-inner a ,.video-item a{
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

        .video-item {
            border-radius: 0.5rem;
            background-color: #eee;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
    </style>
    <style>
        /* تنسيق الكارد */
        .blog-item {
            display: flex;
            flex-direction: column;
            height: 400px;
            /* تحديد ارتفاع ثابت للكارد */
            overflow: hidden;
            /* لضمان عدم امتداد المحتوى خارج الكارد */
            border-radius: 0.5rem;
            /* زاوية دائرية للكارد */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            ظل خفيف للكارد
        }

        /* تنسيق الصورة */
        .blog-img {
            height: 250px;
            /* تحديد ارتفاع ثابت */
            width: 100%;
            /* عرض الصورة يتوافق مع عرض الكارد */
            overflow: hidden;
            /* لضمان عدم ظهور الصورة خارج الإطار */
        }

        .blog-img img {
            height: 100%;
            /* ملء ارتفاع الحاوية */
            width: 100%;
            /* ملء عرض الحاوية */
            object-fit: cover;
            /* تغطية الصورة بشكل مناسب دون تشويه */
        }

        /* تنسيق محتوى الكارد */
        .blog-content {
            flex: 1;
            /* ملء المساحة المتبقية من الكارد */
            padding: 1.5rem;
            /* حشو محتوى الكارد */
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            /* توزيع المحتوى بشكل متساوي */
            align-items: flex-start;
        }

        .blog-content h4 {
            margin-bottom: 1rem;
            /* المسافة أسفل العنوان */
            font-size: 1.25rem;
            /* حجم الخط للعناوين */
            overflow: hidden;
            /* لضمان عدم تجاوز النص للحاوية */
            text-overflow: ellipsis;
            /* إظهار نقاط الحذف إذا كان النص طويلًا */
            white-space: nowrap;
            /* منع التفاف النص */
        }

        @media (max-width: 450px) {
            .blog-content h4 {
                margin-bottom: 1rem;
                font-size: 1.25rem;
                overflow: visible;
                /* text-overflow: ellipsis; */
                white-space: wrap;
            }
        }
    </style>



@section('style')
    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

    <!-- Owl Carousel JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>



    <style>
        .text-align-en {
            direction: ltr !important;
        }

        .text-align-ar {
            direction: rtl !important;
        }
    </style>
@endsection
<!-- Carousel Start -->
<div class="header-carousel owl-carousel text-align-en">
    @foreach ($images as $image)
        <div class="calrousel-img" style="object-fit: fit;">
            <img src="{{ asset('storage/' . $image->image) }}" class="img-fluid w-100" alt="">
        </div>
    @endforeach
</div>

<script>
    $(document).ready(function(){
        $(".header-carousel").owlCarousel({
            items: 1, // عدد العناصر المعروضة
            loop: true, // إعادة التكرار
            margin: 10, // المسافة بين العناصر
            nav: true, // إظهار أزرار التنقل
            autoplay: true, // تشغيل تلقائي
            autoplayTimeout: 3000, // زمن التشغيل التلقائي (بالمللي ثانية)
            autoplayHoverPause: true // إيقاف التشغيل التلقائي عند التمرير
        });
    });
</script>

<!-- Carousel End -->

<!-- Service Start -->
<div class="container-fluid service py-5">
    <div class="container py-5">
        <div class="text-center mx-auto pb-5 wow fadeInRight" data-wow-delay="0.2s" style="max-width: 800px;">
            <h4 class="text-primary">{{ __('Our Category') }}</h4>
            <h1 class="display-4 mb-4">{{ __('We Provide Best Products') }}</h1>
            {{-- <p class="mb-0">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Tenetur adipisci facilis
                cupiditate recusandae aperiam temporibus corporis itaque quis facere, numquam, ad culpa deserunt
                sint dolorem autem obcaecati, ipsam mollitia hic.
            </p> --}}
        </div>
        <div class="row g-4 justify-content-center">
            <div class="owl-carousel owl-theme  text-align-en">
                @foreach ($categories as $category)
                    <div class="item">
                        <div class=" wow fadeInRight" data-wow-delay="0.2s">
                            <div class="service-item">
                                <div class="service-img">
                                    <img src="{{ asset('storage/' . $category->image) }}"
                                        class="img-fluid rounded-top w-100" alt="">
                                </div>
                                <div class="service-content p-4">
                                    <div class="service-content-inner">
                                        <h4 href="#"
                                            class="{{ App::getLocale() === 'ar' ? 'text-align-ar' : 'text-align-en' }}">
                                            {{ App::getLocale() === 'ar' ? $category->category_name_ar : $category->category_name }}
                                        </h4>
                                        {{-- <p class="mb-4">
                                            {{ $category->description }}
                                        </p> --}}
                                        <a class="btn btn-primary rounded-pill py-2 px-4"
                                            href="{{ route('public.category', $category->id) }}">{{ __('Read More') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- أزرار التنقل -->
            <div class="custom-nav  text-align-en">
                <button class="custom-prev">
                    <i class="fa-solid fa-arrow-left"></i>
                </button>
                <button class="custom-next">
                    <i class="fa-solid fa-arrow-right"></i>
                </button>
            </div>
            <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.2s">
                <a class="btn btn-primary rounded-pill py-3 px-5"
                    href="{{ route('web.category') }}">{{ __('Read More') }}</a>
            </div>
        </div>
    </div>
</div>
<!-- Service End -->


<!-- About Start -->
<div class="container-fluid bg-light about pb-5">
    <div class="container pb-5">
        <div class="row g-5">
            <div class="col-xl-12 wow  {{ App::getLocale() === 'ar' ? 'fadeInRight' : 'fadeInLeft' }}"
                data-wow-delay="0.2s">
                <div class="about-item-content bg-white rounded p-5 h-100">
                    <h4 class="text-primary">{{ __('About Our Company') }}</h4>
                    {{-- @foreach ($info as $item) --}}

                    {{-- <h1 class="display-4 mb-4">High Range of Exploring Protection</h1> --}}
                    {{-- <p>
                        {{ App::getLocale() === 'ar' ? $info->about_ar : $info->about }}
                    </p> --}}

                    <div class="my-2 d-{{ App::getLocale() === 'en' ? 'block' : 'none' }}">
                        {!! $info->about !!}
                    </div>
                    <div class="my-2 d-{{ App::getLocale() === 'ar' ? 'block' : 'none' }}">
                        {!! $info->about_ar !!}
                    </div>

                    <a class="btn btn-primary rounded-pill py-2 px-4 mt-3" href="/about-us">{{ __('Read More') }}</a>
                    {{-- @endforeach --}}
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About End -->



<!-- Blog Start -->
<div class="container-fluid blog py-5">
    <div class="container py-5">
        <div class="text-center mx-auto pb-5 wow {{ App::getLocale() === 'ar' ? 'fadeInRight' : 'fadeInLeft' }}"
            data-wow-delay="0.2s" style="max-width: 800px;">
            <h4 class="text-primary"> {{ __('Our Blogs') }}</h4>
            <h1 class="display-4 mb-4"> {{ __('News And Updates') }}</h1>
            {{-- <p class="mb-0">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Tenetur adipisci facilis
                cupiditate recusandae aperiam temporibus corporis itaque quis facere, numquam, ad culpa deserunt
                sint dolorem autem obcaecati, ipsam mollitia hic.
            </p> --}}
        </div>
        <div class="row g-4 justify-content-center">
            <div class="owl-carousel owl-theme  text-align-en">
                @foreach ($articles as $article)
                    <div class=" wow {{ App::getLocale() === 'ar' ? 'fadeInRight' : 'fadeInLeft' }}"
                        data-wow-delay="0.2s">
                        <div class="blog-item">
                            <div class="blog-img">
                                <img src="{{ asset('storage/' . $article->image) }}"
                                    class="img-fluid rounded-top w-100" alt="">
                            </div>
                            <div
                                class="blog-content p-4 {{ App::getLocale() === 'ar' ? 'text-align-ar' : 'text-align-en' }}">
                                <h4>
                                    {{ App::getLocale() === 'ar' ? $article->name_ar : $article->name }}
                                </h4>
                                <br>
                                <div>
                                    <a href="{{ route('public.article', $article->id) }}"
                                        class="btn p-0">{{ __('Read More') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>


            <!-- أزرار التنقل -->
            <div class="custom-nav  text-align-en">
                <button class="custom-prev">
                    <i class="fa-solid fa-arrow-left"></i>
                </button>
                <button class="custom-next">
                    <i class="fa-solid fa-arrow-right"></i>
                </button>
            </div>
        </div>

    </div>
</div>
<!-- Blog End -->
<!-- video Start -->
<div class="container-fluid video py-5">
    <div class="container py-5">
        <div class="text-center mx-auto pb-5 wow {{ App::getLocale() === 'ar' ? 'fadeInRight' : 'fadeInLeft' }}"
            data-wow-delay="0.2s" style="max-width: 800px;">
            {{-- <h4 class="text-primary">{{ __('Our Videos') }}</h4> --}}
            <h1 class="display-4 mb-4">{{ __('Our Videos') }}</h1>
            {{-- <p class="mb-0">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Tenetur adipisci facilis
                    cupiditate recusandae aperiam temporibus corporis itaque quis facere, numquam, ad culpa deserunt
                    sint dolorem autem obcaecati, ipsam mollitia hic.
                </p> --}}
        </div>
        <div class="row g-4 justify-content-center">
            <div class="owl-carousel owl-theme  text-align-en">
                @foreach ($videos as $video)
                    <!-- Video Item -->
                    <div class=" wow {{ App::getLocale() === 'ar' ? 'fadeInRight' : 'fadeInLeft' }}"
                        data-wow-delay="0.2s">
                        <div class="video-item">
                            <div class="video-wrapper">
                                <video class="card-img-top" src="{{ asset('storage/' . $video->video) }}" controls>
                                    Your browser does not support the video tag.
                                </video>
                            </div>
                            <div
                                class="video-content p-4 {{ App::getLocale() === 'ar' ? 'text-align-ar' : 'text-align-en' }}">
                                <h4 class="h4 d-inline-block mb-4">
                                    {{ App::getLocale() === 'ar' ? $video->name_ar : $video->name }}
                                </h4>
                                <br>
                                <a href="{{ route('public.video', $video->id) }}" class="btn btn-primary rounded-pill py-2 px-4">
                                    {{ __('Read More') }}
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>


            <!-- أزرار التنقل -->
            <div class="custom-nav  text-align-en">
                <button class="custom-prev">
                    <i class="fa-solid fa-arrow-left"></i>
                </button>
                <button class="custom-next">
                    <i class="fa-solid fa-arrow-right"></i>
                </button>
            </div>
        </div>
    </div>
</div>
<!-- video End -->

<script>
    $(document).ready(function() {
        var owl = $(".owl-carousel");

        var itemCount = $(".owl-carousel .item").length;

        owl.owlCarousel({
            loop: itemCount > 3, // تفعيل الـ loop فقط إذا كان هناك أكثر من 3 عناصر
            margin: 10,
            nav: false, // إلغاء تفعيل أزرار التنقل الافتراضية
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 3
                }
            }
        });

        // ربط الأزرار المخصصة بالـ Carousel
        $(".custom-next").click(function() {
            owl.trigger('next.owl.carousel');
        });
        $(".custom-prev").click(function() {
            owl.trigger('prev.owl.carousel');
        });
    });
</script>



@endsection
