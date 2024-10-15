@extends('layouts.dashboard.layouts')

@section('content')

<link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet" />

<!-- Include Quill library -->
<script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>

    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-start mb-0">{{ __('Create Article') }}</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/dashboard">{{ __('Home') }}</a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{route('article.index')}}">{{ __('Articles') }}</a>
                            </li>
                            <li class="breadcrumb-item active"><a href="#">{{ __('Create Article') }}</a>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <section id="multiple-column-form">
        <div class="row  justify-content-center">
            <div class="col-8">
                @if (session('error'))
                <div class="demo-spacing-0 mb-2">
                    <div class="alert alert-danger mt-1 alert-validation-msg" role="alert">
                        <div class="alert-body d-flex align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-info me-50"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg>
                            <span><strong>{{ session('error') }}</strong></span>
                        </div>
                    </div>
                </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{ __('Create Article') }}</h4>
                    </div>
                    <div class="card-body">
                        <form class="form" action="{{ route('article.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            {{-- <div class="row"> --}}
                            <div class=" col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="first-name-column">{{ __('Article Name') }}</label>
                                    <input type="text" id="first-name-column" class="form-control" placeholder="Name"
                                        name="name" value="{{ old('name') }}">
                                </div>
                            </div>
                            <div class=" col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="first-name-column_ar">{{ __('Article Name (Arabic)') }}</label>
                                    <input type="text" id="first-name-column_ar" class="form-control" placeholder="عنوان المقالة بالعربي ..."
                                        name="name_ar" value="{{ old('name_ar') }}">
                                </div>
                            </div>

                            {{-- <div class=" col-md-8 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="description">{{ __('Article Description') }}</label>
                                    <textarea class="form-control" id="description" rows="3" placeholder="description ..." name="description"
                                        value="{{ old('description') }}"></textarea>
                                </div>
                            </div>
                            <div class=" col-md-8 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="description_ar">{{ __('Article Description (Arabic)') }}</label>
                                    <textarea class="form-control" id="description_ar" rows="3" placeholder="وصف المقالة بالعربي ..." name="description_ar"
                                        value="{{ old('description_ar') }}"></textarea>
                                </div>
                            </div> --}}

                            <div class=" col-12">
                                <div class="mb-1" dir="ltr">
                                    <label class="form-label" for="description">{{ __('Article Description') }}</label>
                                    <div id="description-editor" style="height: 200px;"></div>
                                    <input type="hidden" name="description" id="description">
                                </div>
                            </div>

                            <div class=" col-12">
                                <div class="mb-1" dir="ltr">
                                    <label class="form-label" for="description_ar">{{ __('Article Description (Arabic)') }}</label>
                                    <div id="description-ar-editor" style="height: 200px;"></div>
                                    <input dir="rtl" type="hidden" name="description_ar" id="description_ar">
                                </div>
                            </div>
                            <div class=" col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="image">{{ __('Article Image') }}</label>
                                    <input type="file" id="image" class="form-control" placeholder="Name"
                                        name="image" accept="image/*">
                                </div>
                            </div>

                            <div class="col-12">
                                <button type="submit"
                                    class="btn btn-primary me-1 waves-effect waves-float waves-light">{{ __('Submit') }}</button>
                                <button type="reset"
                                    class="btn btn-outline-secondary waves-effect">{{ __('Reset') }}</button>
                            </div>
                            {{-- </div> --}}
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
        });
    </script>
@endsection
