@extends('layouts.dashboard.layouts')

@section('content')

    <!-- Include Quill stylesheet -->
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet" />

    <!-- Include Quill library -->
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>

    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-start mb-0">{{ __('Edit Information') }}</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/dashboard">{{ __('Home') }}</a></li>
                            <li class="breadcrumb-item"><a href="{{route('info.index')}}">{{ __('Web Information') }}</a></li>
                            <li class="breadcrumb-item active"><a href="#">{{ __('Edit Information') }}</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section id="multiple-column-form">
        <div class="row justify-content-center">
            <div class="col-8">
                @if (session('error'))
                    <div class="demo-spacing-0 mb-2">
                        <div class="alert alert-danger mt-1 alert-validation-msg" role="alert">
                            <div class="alert-body d-flex align-items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-info me-50">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <line x1="12" y1="16" x2="12" y2="12"></line>
                                    <line x1="12" y1="8" x2="12.01" y2="8"></line>
                                </svg>
                                <span><strong>{{ session('error') }}</strong></span>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="card" dir="{{ App::getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
                    <div class="card-header">
                        <h4 class="card-title">{{ __('Edit Information') }}</h4>
                    </div>
                    <div class="card-body">
                        <form class="form" action="{{ route('info.update', $info->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="address">{{ __('Address') }}</label>
                                    <input type="text" id="address" class="form-control" placeholder="{{ __('Address') }}" name="address" value="{{ $info->address }}">
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="address_ar">{{ __('Address (Arabic)') }}</label>
                                    <input type="text" id="address_ar" class="form-control" placeholder="{{ __('Address (Arabic)') }}" name="address_ar" value="{{ $info->address_ar }}">
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="email">{{ __('Email') }}</label>
                                    <input type="email" id="email" class="form-control" placeholder="{{ __('spada@info.com') }}" name="email" value="{{ $info->email }}">
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="phone_number">{{ __('Phone Number') }}</label>
                                    <input type="number" id="phone_number" class="form-control" placeholder="0555 555 5555" name="phone_number" value="{{ $info->phone_number }}">
                                </div>
                            </div>

                            <div class="col-md-8 col-12">
                                <div class="mb-1" dir="ltr">
                                    <label class="form-label" for="description">{{ __('About us') }}</label>
                                    <div id="description-editor" style="height: 200px;"></div>
                                    <input type="hidden" name="about" id="description" value="{{ old('about', $info->about) }}">
                                </div>
                            </div>

                            <div class="col-md-8 col-12">
                                <div class="mb-1" dir="ltr">
                                    <label class="form-label" for="description_ar">{{ __('About us (Arabic)') }}</label>
                                    <div id="description-ar-editor" style="height: 200px;"></div>
                                    <input type="hidden" name="about_ar" id="description_ar" value="{{ old('about_ar', $info->about_ar) }}">
                                </div>
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn btn-primary me-1 waves-effect waves-float waves-light">{{ __('Submit') }}</button>
                                <a href="{{ route('info.index') }}" class="btn btn-outline-secondary waves-effect">{{ __('Back') }}</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Initialize Quill editors -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize Quill editor for the English description
            const descriptionEditor = new Quill('#description-editor', {
                theme: 'snow',
                modules: {
                    toolbar: [
                        [{ 'header': [1, 2, false] }],
                        ['bold', 'italic', 'underline'],
                        [{ 'list': 'ordered' }, { 'list': 'bullet' }],
                        ['link'],
                        ['clean']
                    ]
                }
            });
            // Set the initial content from old or existing data
            descriptionEditor.root.innerHTML = `{!! old('about', $info->about) !!}`;

            // Sync Quill content with the hidden input
            descriptionEditor.on('text-change', function() {
                document.getElementById('description').value = descriptionEditor.root.innerHTML;
            });

            // Initialize Quill editor for the Arabic description
            const descriptionArEditor = new Quill('#description-ar-editor', {
                theme: 'snow',
                modules: {
                    toolbar: [
                        [{ 'header': [1, 2, false] }],
                        ['bold', 'italic', 'underline'],
                        [{ 'list': 'ordered' }, { 'list': 'bullet' }],
                        ['link'],
                        ['clean']
                    ]
                }
            });
            // Set the initial content from old or existing data
            descriptionArEditor.root.innerHTML = `{!! old('about_ar', $info->about_ar) !!}`;

            // Sync Quill content with the hidden input
            descriptionArEditor.on('text-change', function() {
                document.getElementById('description_ar').value = descriptionArEditor.root.innerHTML;
            });
        });
    </script>

@endsection
