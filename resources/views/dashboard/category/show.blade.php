@extends('layouts.dashboard.layouts')

@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-start mb-0">{{ __('Show Category') }}</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/dashboard">{{ __('Home') }}</a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{route('category.index')}}">{{ __('Categories') }}</a>
                            </li>
                            <li class="breadcrumb-item active"><a href="#">{{ __('Show Category') }}</a>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <section id="multiple-column-form">
        <div class="row  justify-content-center">
            <div class="col-12 col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{ __('Show Category') }}</h4>
                    </div>
                    <div class="card-body">
                        <div>
                            <img class="card-img-top" src="{{ asset('storage/' . $category->image) }}" alt="Card image cap" style="width: 100%; height: 100%; object-fit: cover;">
                        </div>
                        <div class="card-body">
                            <div dir="ltr">
                                <h4 class="card-title">{{ __('Title') }}</h4>
                                <h4 class="card-title">{{$category->category_name}}</h4>
                                <h4 class="card-title">{{ __('Description') }}</h4>
                                <p class="card-text">
                                    {!! $category->description !!}
                                </p>
                                
                            </div>
                            <div dir="rtl">
                                <h4 class="card-title">{{ __('Title (Arabic)') }}</h4>
                                <h4 class="card-title">{{$category->category_name_ar}}</h4>
                                <h4 class="card-title">{{ __('Description (Arabic)') }}</h4>
                                <div class="card-text">
                                    {!! $category->description_ar !!}
                                </div>

                            </div>
                            {{-- <a href="{{ route('category.show', $category->id) }}" class="btn btn-outline-primary waves-effect">
                                <i class="fa-solid fa-eye"></i>
                            </a> --}}
                            <a href="{{ route('category.edit', $category->id) }}" class="btn btn-outline-warning waves-effect">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            <button onclick="delete_item({{ $category->id }})" class="btn btn-outline-danger waves-effect">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                            <form id="delete-form-{{ $category->id }}" action="{{ route('category.destroy', $category->id) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </div>
                    </div>
                    <a href="{{route('category.index')}}"
                    class="btn btn-outline-primary m-2 waves-effect">{{ __('Back') }}</a>
                </div>
            </div>
        </div>
    </section>
@endsection

