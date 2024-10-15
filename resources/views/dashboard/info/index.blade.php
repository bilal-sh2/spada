@extends('layouts.dashboard.layouts')

@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-start mb-0">{{ __('Web Information') }}</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/dashboard">{{ __('Home') }}</a>
                            </li>
                            <li class="breadcrumb-item active"><a href="#">{{ __('Web Information') }}</a>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @foreach ($infos as $info)
    <div class="my-2">
        <a href="{{ route('info.edit', $info->id) }}" class="btn btn-warning">{{ __('Edit') }}</a>
    </div>
    <div class="row {{ App::getLocale() === 'ar' ? 'text-start' : 'text-end' }}">

        <div class="col-md-4">
            <div class="card mb-3">
                <div class="card-body">
                    <h4 class="card-title">{{ __('Email') }}</h4>
                    <p class="card-text">
                        {{ $info->email }}
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-3">
                <div class="card-body">
                    <h4 class="card-title">{{ __('Phone Number') }}</h4>
                    <p class="card-text">
                        {{ $info->phone_number }}
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-3">
                <div class="card-body">
                    <h4 class="card-title">{{ __('Address') }}</h4>
                    <p class="card-text">
                        {{ $info->address }}
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-3">
                <div class="card-body">
                    <h4 class="card-title">{{ __('Address (Arabic)') }}</h4>
                    <p class="card-text">
                        {{ $info->address_ar }}
                    </p>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card mb-3">
                <div class="card-body">
                    <h4 class="card-title">{{ __('About us') }}</h4>
                    <div class="card-text">
                        {!!$info->about!!}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card mb-3" dir="rtl">
                <div class="card-body">
                    <h4 class="card-title">{{ __('About us (Arabic)') }}</h4>
                    <div class="card-text">
                        {!!$info->about_ar!!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach

@endsection
