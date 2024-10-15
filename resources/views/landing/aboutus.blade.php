@extends('layouts.landing.layouts')

@section('content')
<style>
    .img-about {
        width: 400px;
    }

    /* تأثير التلاشي */
    .fade-in {
        opacity: 0;
        transition: opacity 0.5s ease-in-out;
    }

    .fade-in.show {
        opacity: 1;
    }

    /* تنسيق الخريطة */
    #map {
        height: 500px;
        width: 100%;
        margin-top: 30px;
        border-radius: 8px;
    }
</style>
<div class="header-carousel owl-carousel text-align-en">
    @foreach ($images as $image)
        <div class="calrousel-img">
            <img src="{{ asset('storage/' . $image->image) }}" class="img-fluid w-100">
        </div>
    @endforeach
</div>
<div></div>
<!-- About Start -->
<div class="container-fluid bg-light about pb-5 mt-5">
    <div class="container pb-5">
        <div class="row g-5">
            <div class="col-xl-12" data-aos="fade-up" data-aos-delay="400">
                <div class="about-item-content bg-white rounded p-5 h-100">
                    <h2 class="text-primary">{{ __('About Our Company') }}</h2>
                    <div class="d-{{ App::getLocale() === 'en' ? 'block' : 'none' }} fade-in show" id="about-text">
                        {!! $info->about !!}
                    </div>
                    <div class="d-{{ App::getLocale() === 'ar' ? 'block' : 'none' }} fade-in show" id="about-text-ar">
                        {!! $info->about_ar !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About End -->

<!-- خريطة الفروع Start -->
<div class="container-fluid bg-light pb-5">
    <div class="container">
        <h2 class="text-primary mb-4" data-aos="fade-up">{{ __('Our Branches') }}</h2>
        <div id="map" data-aos="fade-up" data-aos-delay="200"></div>
    </div>
</div>
<!-- خريطة الفروع End -->

<!-- Include AOS library -->
<link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>

<!-- Include Leaflet CSS and JS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

<!-- Include Axios for AJAX requests (اختياري، في حال استخدام AJAX) -->
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Initialize AOS
        AOS.init({
            duration: 1200, // Duration of animations
            once: true // Animation will only happen once
        });

        const isArabic = "{{ App::getLocale() }}" === "ar";
        const textElement = document.getElementById(isArabic ? 'about-text-ar' : 'about-text');
        const htmlContent = textElement.innerHTML.trim();

        if (!htmlContent) {
            console.error('No text found to apply the fade effect.');
            return;
        }

        // Initialize Leaflet map
        var map = L.map('map').setView([{{ $branches->count() ? $branches->first()->latitude : '0' }}, {{ $branches->count() ? $branches->first()->longitude : '0' }}], 10); // ضبط المركز والتكبير حسب الفروع

        // إضافة طبقة الخريطة من OpenStreetMap
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap contributors'
        }).addTo(map);

        // إضافة علامات للفروع
        @foreach($branches as $branch)
            L.marker([{{ $branch->latitude }}, {{ $branch->longitude }}]).addTo(map)
                .bindPopup(`
                    <div style="text-align: {{ App::getLocale() === 'ar' ? 'right' : 'left' }};">
                        <h5>{{ App::getLocale() === 'ar' ? $branch->branch_name_ar : $branch->name }}</h5>
                        @if($branch->image)
                            <img src="{{ asset('storage/' . $branch->image) }}" alt="{{ App::getLocale() === 'ar' ? $branch->branch_name_ar : $branch->name }}" style="width:100px; height:auto; margin-top:10px;">
                        @endif
                    </div>
                `);
        @endforeach

        // لضبط حدود الخريطة لتشمل جميع الفروع
        if({{ $branches->count() }} > 0){
            var group = new L.featureGroup([
                @foreach($branches as $branch)
                    L.marker([{{ $branch->latitude }}, {{ $branch->longitude }}]),
                @endforeach
            ]);
            map.fitBounds(group.getBounds().pad(0.5));
        }
    });
</script>
@endsection
