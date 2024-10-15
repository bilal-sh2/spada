@extends('layouts.dashboard.layouts')

@section('content')

<link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet" />

<!-- Include Quill library -->
<script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>

<section id="multiple-column-form">
    <div class="row justify-content-center">
        <div class="col-12">
            @if (session('success'))
            <div class="demo-spacing-0 mb-2">
                <div class="alert alert-success mt-1 alert-validation-msg" role="alert">
                    <div class="alert-body d-flex align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle me-50">
                            <path d="M9 12l2 2 4-4"></path>
                            <circle cx="12" cy="12" r="10"></circle>
                        </svg>
                        <span><strong>{{ session('success') }}</strong></span>
                    </div>
                </div>
            </div>
            @endif

            @if ($errors->any())
            <div class="demo-spacing-0 mb-2">
                <div class="alert alert-danger mt-1 alert-validation-msg" role="alert">
                    <div class="alert-body d-flex align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-info me-50">
                            <circle cx="12" cy="12" r="10"></circle>
                            <line x1="12" y1="16" x2="12" y2="12"></line>
                            <line x1="12" y1="8" x2="12.01" y2="8"></line>
                        </svg>
                        <span><strong>هناك بعض الأخطاء في النموذج.</strong></span>
                    </div>
                    <ul class="mt-1 mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            @endif

            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{ __('Create Branch') }}</h4>
                </div>
                <div class="card-body">
                    <form class="form" action="{{ route('branches.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <!-- اسم الفرع بالإنجليزية -->
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="name">{{ __('Branch Name') }}</label>
                                    <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Name" name="name" value="{{ old('name') }}" required>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- اسم الفرع بالعربية -->
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="branch_name_ar">{{ __('Branch Name (Arabic)') }}</label>
                                    <input type="text" id="branch_name_ar" class="form-control @error('branch_name_ar') is-invalid @enderror" placeholder="الاسم باللغة العربية" name="branch_name_ar" value="{{ old('branch_name_ar') }}">
                                    @error('branch_name_ar')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- وصف الفرع بالإنجليزية -->
                            <div class="col-12">
                                <div class="mb-1" dir="ltr">
                                    <label class="form-label" for="description">{{ __('Branch Description') }}</label>
                                    <div id="description-editor" style="height: 200px;"></div>
                                    <input type="hidden" name="description" id="description" value="{{ old('description') }}">
                                    @error('description')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- وصف الفرع بالعربية -->
                            <div class="col-12">
                                <div class="mb-1" dir="rtl">
                                    <label class="form-label" for="description_ar">{{ __('Branch Description (Arabic)') }}</label>
                                    <div id="description-ar-editor" style="height: 200px;"></div>
                                    <input type="hidden" name="description_ar" id="description_ar" value="{{ old('description_ar') }}">
                                    @error('description_ar')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- خط العرض -->
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="latitude">{{ __('Latitude') }}</label>
                                    <input type="text" id="latitude" class="form-control @error('latitude') is-invalid @enderror" placeholder="Latitude" name="latitude" value="{{ old('latitude') }}" required>
                                    @error('latitude')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- خط الطول -->
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="longitude">{{ __('Longitude') }}</label>
                                    <input type="text" id="longitude" class="form-control @error('longitude') is-invalid @enderror" placeholder="Longitude" name="longitude" value="{{ old('longitude') }}" required>
                                    @error('longitude')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- صورة الفرع -->
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="image">{{ __('Branch Image') }}</label>
                                    <input type="file" id="image" class="form-control @error('image') is-invalid @enderror" name="image" accept="image/*">
                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- أزرار الإرسال والتصفير -->
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary me-1 waves-effect waves-float waves-light">{{ __('Submit') }}</button>
                                <button type="reset" class="btn btn-outline-secondary waves-effect">{{ __('Reset') }}</button>
                            </div>
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

        // Sync Quill content with the hidden input
        descriptionArEditor.on('text-change', function() {
            document.getElementById('description_ar').value = descriptionArEditor.root.innerHTML;
        });

        // إذا كانت هناك بيانات قديمة، قم بتحميلها في المحررات
        @if(old('description'))
            descriptionEditor.root.innerHTML = `{!! old('description') !!}`;
        @endif

        @if(old('description_ar'))
            descriptionArEditor.root.innerHTML = `{!! old('description_ar') !!}`;
        @endif
    });
</script>

@endsection
