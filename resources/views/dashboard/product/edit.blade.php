@extends('layouts.dashboard.layouts')

@section('content')

<link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet" />

<!-- Include Quill library -->
<script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>

    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-start mb-0">{{ __('Edit Product') }}</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/dashboard">{{ __('Home') }}</a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{route('products.index')}}">{{ __('Products') }}</a>
                            </li>
                            <li class="breadcrumb-item active"><a href="#">{{ __('Edit Product') }}</a>
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
                        <h4 class="card-title">{{ __('Edit Product') }}</h4>
                    </div>
                    <div class="card-body">
                        <form class="form" action="{{ route('products.update', $product->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class=" col-md-6">
                                    <div class="mb-1">
                                        <label class="form-label" for="first-name-column">{{ __('Product Name') }}</label>
                                        <input type="text" id="first-name-column" class="form-control"
                                            placeholder="اسم المنتج" name="name" value="{{ $product->name }}">
                                    </div>
                                </div>

                                <div class=" col-md-6">
                                    <div class="mb-1">
                                        <label class="form-label"
                                            for="first-name-column_ar">{{ __('Product Name (Arabic)') }}</label>
                                        <input type="text" id="first-name-column_ar" class="form-control"
                                            placeholder="عنوان المنتج بالعربي ..." name="name_ar"
                                            value="{{ $product->name_ar }}">
                                    </div>
                                </div>
                                {{-- <div class=" col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label"
                                            for="technonology">{{ __('Product Technonology') }}</label>
                                        <input type="text" id="technonology" class="form-control"
                                            placeholder="{{ __('Technonology') }}" name="technonology"
                                            value="{{ $product->technonology }}">
                                    </div>
                                </div>

                                <div class=" col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="width">{{ __('Product Width') }}</label>
                                        <input type="number" id="width" class="form-control"
                                            placeholder="{{ __('Product Width') }}" name="width"
                                            value="{{ $product->width }}">
                                    </div>
                                </div>
                                <div class=" col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="height">{{ __('Product Height') }}</label>
                                        <input type="number" id="height" class="form-control"
                                            placeholder="{{ __('Product Height') }}" name="height"
                                            value="{{ $product->height }}">
                                    </div>
                                </div>
                                <div class=" col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="dipth">{{ __('Product Dipth') }}</label>
                                        <input type="number" id="dipth" step="0.01" class="form-control"
                                            placeholder="{{ __('Product Dipth') }}" name="dipth"
                                            value="{{ $product->dipth }}">
                                    </div>
                                </div> --}}


                                <div class=" col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="evaluation">{{ __('Choose View') }}</label>
                                        <p class="form-label text-primary">
                                            <strong>
                                                {{ __('Current View') }}
                                            </strong>
                                            </p>
                                            <p class="form-label text-primary">
                                                {{$product->evaluation}}
                                            </p>
                                        <select name="evaluation" id="evaluation" class="form-select">
                                            <option value="{{$product->evaluation}}">{{$product->evaluation}}</option>
                                            <option value="width">{{ __('Width') }}</option>
                                            <option value="height">{{ __('Height') }}</option>
                                        </select>
                                    </div>
                                </div>


                                <div class=" col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="category_id">{{ __('Choose Category') }}</label>
                                        <p class="form-label text-primary" for="category_id">
                                        <strong>
                                            {{ __('Current Category') }}
                                        </strong>
                                        </p>
                                        <p class="form-label text-primary" for="category_id">
                                            {{$product->category->category_name}}
                                        </p>
    
                                        <select name="category_id" id="category_id" class="form-select">
                                            {{-- <option value="">{{$product->category->category_name}}</option> --}}
                                            @foreach($categories as $category)
                                            <option value="{{$category->id }}">{{ $category->category_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                                {{-- <div class=" col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label"
                                            for="description">{{ __('Product Description') }}</label>
                                        <textarea class="form-control" id="description" rows="3" placeholder="الوصف ..." name="description"
                                            >{{ $product->description }}</textarea>
                                    </div>
                                </div>

                                <div class=" col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label"
                                            for="description_ar">{{ __('Product Description (Arabic)') }}</label>
                                        <textarea class="form-control" id="description_ar" rows="3" placeholder="وصف المنتج بالعربي ..."
                                            name="description_ar">{{ $product->description_ar }}</textarea>
                                    </div>
                                </div> --}}

                                {{-- <div class=" col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label"
                                            for="use_method">{{ __('Product Used Method') }}</label>
                                        <textarea class="form-control" id="use_method" rows="3" placeholder="Method used ..." name="use_method">{{ $product->use_method }}</textarea>
                                    </div>
                                </div>
                                <div class=" col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label"
                                            for="use_method_ar">{{ __('Product Used Method (Arabic)') }}</label>
                                        <textarea class="form-control" id="use_method_ar" rows="3" placeholder="طريقة الاستخدام ..."
                                            name="use_method_ar">{{ $product->use_method_ar }}</textarea>
                                    </div>
                                </div> --}}

                                <div class=" col-12">
                                    <div class="mb-1" dir="ltr">
                                        <label class="form-label" for="description">{{ __('Product Description') }}</label>
                                        <div id="description-editor" style="height: 200px;"></div>
                                        <input type="hidden" name="description" id="description" value="{{ $product->description }}">
                                    </div>
                                </div>
    
                                <div class=" col-12">
                                    <div class="mb-1" dir="ltr">
                                        <label class="form-label" for="description_ar">{{ __('Product Description (Arabic)') }}</label>
                                        <div id="description-ar-editor" style="height: 200px;"></div>
                                        <input type="hidden" name="description_ar" id="description_ar" value="{{ $product->description_ar }}">
                                    </div>
                                </div>


                                <div class=" col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="image">{{ __('Product Image') }}</label>
                                        <input type="file" id="image" class="form-control" placeholder="Name"
                                            name="image" accept="image/*">
                                    </div>
                                </div>

                                <div class="col-12">
                                    <button type="submit"
                                        class="btn btn-primary me-1 waves-effect waves-float waves-light">{{ __('Edit') }}</button>
                                    <button type="reset"
                                        class="btn btn-outline-secondary waves-effect">{{ __('Reset') }}</button>
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
    });
</script>
@endsection