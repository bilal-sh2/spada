@extends('layouts.landing.layouts')

@section('content')
    <style>
        .bg-show {
            background-color: #eee;
            border-radius: 20px;
        }
    </style>
    <!-- Header Start -->
    <div class="container-fluid bg-primary">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h4 class="text-light display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">{{ __('Show Video') }}</h4>
            <ol class="breadcrumb d-flex justify-content-center mb-4 wow fadeInDown" data-wow-delay="0.3s">
                <li class="breadcrumb-item"><a class="text-light" href="/">{{ __('Home') }}</a></li>
                <li class="breadcrumb-item {{ App::getLocale() === 'en' ? 'text-align-item' : '' }}"><a
                        class="text-light"></a></li>
                <li class="breadcrumb-item"><a class="text-light" href="{{ route('web.videos') }}">{{ __('Videos') }}</a>
                </li>
                {{-- <li class="breadcrumb-item"><a class="text-light"></a></li> --}}
                <li class="breadcrumb-item active text-dark">{{ __('Show Video') }}</li>
            </ol>
        </div>
    </div>
    <!-- Header End -->


    <!-- Product Start -->
    <div class="container py-5 card my-5 bg-show">
        <div class="row ">
            @if ($video->evaluation == 'height')
                <div class="col-12 col-md-6 col-lg-4">
                    <video class="card-img" src="{{ asset('storage/' . $video->video) }}" controls
                        style="width: 306px; height: 555px; object-fit: cover;">
                        {{ __('Your browser does not support the video tag.') }}
                    </video>
                </div>
            @else
                <div class="col-12 col-md-6 col-lg-4">
                    <video class="card-img" src="{{ asset('storage/' . $video->video) }}" controls>
                        {{ __('Your browser does not support the video tag.') }}
                    </video>
                </div>
            @endif
            <div class="col-12 col-md-6 col-lg-8">
                <div class="service-content-inner">
                    <h2 class="mb-4 text-primary">{{ __('Video Name') }}</h2>
                    <h3 class="mb-4">{{ App::getLocale() === 'ar' ? $video->name_ar : $video->name }}</h3>
                </div>
              
                {{-- <h5>
                    {{ App::getLocale() === 'ar' ? $video->description_ar : $video->description }}
                </h5> --}}
            </div>
            <div class="col-12 mt-2">
                <h4 class="text-primary">
                    {{ __('Description :') }}
                </h4>
                <hr>
                <div class=" d-{{ App::getLocale() === 'en' ? 'block' : 'none' }}">
                    {!! $video->description !!}
                </div>
                <div class=" d-{{ App::getLocale() === 'ar' ? 'block' : 'none' }}">
                    {!! $video->description_ar !!}
                </div>
            </div>

        </div>
    </div>
@endsection
