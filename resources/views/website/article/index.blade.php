@extends('layouts.landing.layouts')

@section('content')

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
    <!-- Header Start -->
    <div class="container-fluid bg-primary">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h4 class="text-light display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">{{ __('Blogs') }}</h4>
            <ol class="breadcrumb d-flex justify-content-center mb-4 wow fadeInDown" data-wow-delay="0.3s">
                <li class="breadcrumb-item"><a class="text-light" href="/">{{ __('Home') }}</a></li>
                <li class="breadcrumb-item {{ App::getLocale() === 'en' ? 'text-align-item' : '' }}"><a class="text-light"></a></li>
                {{-- <li class="breadcrumb-item"><a class="text-light" href="#">Pages</a></li> --}}
                <li class="breadcrumb-item active text-dark">{{ __('Blogs') }}</li>
            </ol>
        </div>
    </div>
    <!-- Header End -->

    <!-- Service Start -->
    <div class="container-fluid service py-5">
        <div class="container py-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                <h4 class="text-primary"> {{ __('Our Blogs') }}</h4>
                <h1 class="display-4 mb-4">{{ __('News And Updates') }}</h1>
            </div>

            @if ($articles->isEmpty())
                <h4 class="text-center mb-2">
                    {{ __('No Articles Available') }}
                </h4>
            @endif

            <div class="row g-4 justify-content-center">
                @foreach ($articles as $article)
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="blog-item">
                        <div class="blog-img">
                            <img src="{{ asset('storage/' . $article->image) }}" class="img-fluid rounded-top w-100"
                                alt="">
                        </div>
                        <div class="blog-content p-4">
                            <h4 class="h4 d-inline-block mb-4">
                                {{ App::getLocale() === 'ar' ? $article->name_ar : $article->name }}
                            </h4>
                            <br>
                            <a href="{{ route('public.article', $article->id) }}" class="btn p-0"> {{ __('Read More') }}  </a>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
            <!-- أزرار التنقل بين الصفحات مع تنسيق Bootstrap -->
            <div class="d-flex justify-content-center mt-4">
                {{ $articles->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
    <!-- Service End -->
@endsection