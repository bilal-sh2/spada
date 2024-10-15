{{-- resources/views/carousel/create.blade.php --}}
@extends('layouts.dashboard.layouts')

@section('content')
    <!-- رأس المحتوى -->
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-start mb-0">{{ __('Add Carousel Image') }}</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">{{ __('Home') }}</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('carousel.index') }}">{{ __('Carousel') }}</a></li>
                            <li class="breadcrumb-item active">{{ __('Add New Image') }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-header-right col-md-3 col-12 mb-2">
            <a href="{{ route('carousel.index') }}" class="btn btn-secondary float-end">
                {{ __('Back to Carousel') }}
            </a>
        </div>
    </div>

    <!-- نموذج إضافة صورة جديدة -->
    <section id="multiple-column-form">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <!-- عرض رسائل الجلسة -->
                @if (session('error'))
                    <div class="alert alert-danger mt-1 alert-validation-msg" role="alert">
                        <div class="alert-body d-flex align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-info me-50">
                                <circle cx="12" cy="12" r="10"></circle>
                                <line x1="12" y1="16" x2="12" y2="12"></line>
                                <line x1="12" y1="8" x2="12.01" y2="8"></line>
                            </svg>
                            <span><strong>{{ session('error') }}</strong></span>
                        </div>
                    </div>
                @endif

                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{ __('Add Image to Carousel') }}</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('carousel.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <!-- حقل رفع الصورة -->
                            <div class="mb-3">
                                <label class="form-label" for="image">{{ __('Carousel Image') }}</label>
                                <input type="file" id="image" class="form-control @error('image') is-invalid @enderror"
                                    name="image" accept="image/*" required>
                                @error('image')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- إذا كنت بحاجة إلى حقول إضافية مثل الوصف، يمكنك إضافتها هنا -->
                            <!-- مثال:
                            <div class="mb-3">
                                <label class="form-label" for="description">{{ __('Description') }}</label>
                                <textarea id="description" class="form-control @error('description') is-invalid @enderror"
                                    name="description" rows="4">{{ old('description') }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            -->

                            <!-- أزرار الإرسال وإعادة التعيين -->
                            <div class="d-flex justify-content-between">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submit') }}
                                </button>
                                <button type="reset" class="btn btn-outline-secondary">
                                    {{ __('Reset') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
