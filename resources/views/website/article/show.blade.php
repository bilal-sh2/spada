@extends('layouts.landing.layouts')

@section('content')
<style>
    .bg-show{
        background-color: #eee;
        border-radius: 20px;
    }
</style>
    <!-- Header Start -->
    <div class="container-fluid bg-primary">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h4 class="text-light display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">{{ __('Show Blog') }}</h4>
            <ol class="breadcrumb d-flex justify-content-center mb-4 wow fadeInDown" data-wow-delay="0.3s">
                <li class="breadcrumb-item"><a class="text-light" href="/">{{ __('Home') }}</a></li>
                <li class="breadcrumb-item {{ App::getLocale() === 'en' ? 'text-align-item' : '' }}"><a class="text-light"></a></li>
                <li class="breadcrumb-item"><a class="text-light" href="{{ route('web.articles') }}">{{ __('Blogs') }}</a></li>
                {{-- <li class="breadcrumb-item"><a class="text-light" href="#">Pages</a></li> --}}
                <li class="breadcrumb-item active text-dark">{{ __('Show Blog') }}</li>
            </ol>
        </div>
    </div>
    <!-- Header End -->

    <!-- Service Start -->
    <div class="container-fluid service py-5">
        <div class="container py-5">
            <div class="row g-4 justify-content-center ">
                <div class="bg-show col-lg-6 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="blog-item">
                        <div class="blog-img">
                            <img src="{{ asset('storage/' . $article->image) }}" class="img-fluid rounded-top w-100" alt="">
                        </div>
                        <div class="blog-content">
                            <div class="blog-content-inner">
                                <a href="#" class="d-inline-block h4 my-4">{{ App::getLocale() === 'ar' ? $article->name_ar : $article->name }}</a>
                                {{-- <h5 class="mb-4">
                                    {{ App::getLocale() === 'ar' ? $article->description_ar : $article->description }}
                                </h5> --}}
                                <div class=" d-{{ App::getLocale() === 'en' ? 'block' : 'none' }}">
                                    {!! $article->description !!}
                                </div>
                                <div class=" d-{{ App::getLocale() === 'ar' ? 'block' : 'none' }}">
                                    {!! $article->description_ar !!}
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->
@endsection