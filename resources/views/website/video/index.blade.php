@extends('layouts.landing.layouts')

@section('content')
    <style>
        /* تنسيق عنصر الفيديو */
        .video-item {
            overflow: hidden;
            /* لضمان عدم امتداد المحتوى خارج الكارد */
            border-radius: 0.5rem;
            /* زاوية دائرية للكارد */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            /* ظل خفيف للكارد */
            background-color: #fff;
            /* خلفية بيضاء */
        }

        .video-height {
            position: relative;
            width: 100%;
            /* عرض الفيديو يتوافق مع عرض الكارد */
            padding-top: 177%;
            /* نسبة العرض إلى الارتفاع للفيديو الطولي (9:16) */
            /* 177% هو الطول بنسبة 9:16 */
        }

        .video-height video {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            /* ملاءمة الفيديو بشكل مناسب */
        }

        /* تنسيق محتوى الكارد */
        .video-content {
            padding: 1.5rem;
            /* حشو محتوى الكارد */
        }

        .video-content h4 {
            margin-bottom: 1rem;
            /* المسافة أسفل العنوان */
        }
    </style>
    <!-- Header Start -->
    <div class="container-fluid bg-primary">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h4 class="text-light display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">{{ __('Our Videos') }}</h4>
            <ol class="breadcrumb d-flex justify-content-center mb-4 wow fadeInDown" data-wow-delay="0.3s">
                <li class="breadcrumb-item"><a class="text-light" href="/">{{ __('Home') }}</a></li>
                <li class="breadcrumb-item {{ App::getLocale() === 'en' ? 'text-align-item' : '' }}"><a
                        class="text-light"></a></li>
                {{-- <li class="breadcrumb-item"><a class="text-light" href="#">Pages</a></li> --}}
                <li class="breadcrumb-item active text-dark">{{ __('Our Videos') }}</li>
            </ol>
        </div>
    </div>
    <!-- Header End -->

    <!-- Service Start -->
    <div class="container-fluid blog py-5">
        <div class="container py-5">
            <div class="text-center mx-auto pb-5 wow {{ App::getLocale() === 'ar' ? 'fadeInRight' : 'fadeInLeft' }}"
                data-wow-delay="0.2s" style="max-width: 800px;">
                {{-- <h4 class="text-primary">Our Services</h4> --}}
                <h1 class="display-4 mb-4">{{ __('Our Videos') }}</h1>
            </div>

            @if ($videos->isEmpty())
                <h4 class="text-center mb-2">
                    {{ __('No Videos Available') }}
                </h4>
            @endif

            <div class="row g-4 justify-content-center mb-4">
                <h3 class="text-center mb-2">
                    {{ __('Viedo Type (Width)') }}
                </h3>
                @foreach ($videos as $video)
                    @if ($video->evaluation == 'width')
                        <!-- Video Item -->
                        <div class="col-md-6 col-lg-4 wow {{ App::getLocale() === 'ar' ? 'fadeInRight' : 'fadeInLeft' }}"
                            data-wow-delay="0.2s">
                            <div class="video-item">
                                <div class="video-wrapper">
                                    <video class="card-img-top" src="{{ asset('storage/' . $video->video) }}" controls>
                                        Your browser does not support the video tag.
                                    </video>
                                </div>
                                <div class="video-content p-4">
                                    <h4 class="h4 d-inline-block mb-4">
                                        {{ App::getLocale() === 'ar' ? $video->name_ar : $video->name }}
                                    </h4>
                                    <br>
                                    <a href="{{ route('public.video', $video->id) }}"
                                        class="btn p-0">{{ __('Read More') }} <i class="fa fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
            <div class="row g-4 justify-content-center mt-3">
                <h3 class="text-center my-2">
                    {{ __('Viedo Type (Hieght)') }}
                </h3>
                @foreach ($videos as $video)
                    @if ($video->evaluation == 'height')
                        <!-- Video Item -->
                        <div class="col-md-6 col-lg-3 wow {{ App::getLocale() === 'ar' ? 'fadeInRight' : 'fadeInLeft' }}"
                            data-wow-delay="0.2s">
                            <div class="video-item">
                                <div class="video-height">
                                    <video class="card-img-top" src="{{ asset('storage/' . $video->video) }}" controls>
                                        Your browser does not support the video tag.
                                    </video>
                                </div>
                                <div class="video-content p-4">
                                    <h4 class="h4 d-inline-block mb-4">
                                        {{ App::getLocale() === 'ar' ? $video->name_ar : $video->name }}
                                    </h4>
                                    <br>
                                    <a href="{{ route('public.video', $video->id) }}"
                                        class="btn p-0">{{ __('Read More') }} <i class="fa fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
            <!-- أزرار التنقل بين الصفحات مع تنسيق Bootstrap -->
            <div class="d-flex justify-content-center mt-4">
                {{ $videos->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
    <!-- Service End -->
@endsection
