@extends('layouts.dashboard.layouts')

@section('content')
    <div class="row ">

        <div class=" col-12" dir=" {{ App::getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
            <div class="card card-statistics">
                <div class="card-header">
                    <h2 class="card-title">{{ __('Statistics') }}</h2>
                </div>
                <div class="card-body statistics-body">
                    <div class="row">
                        <div class="col-md-3 col-sm-6 col-12 mb-2 mb-md-0">
                            <div class="d-flex flex-row">
                                <div class="avatar bg-light-primary me-2">
                                    <div class="avatar-content">
                                        <i class="fa-regular fa-circle-play fs-4"></i>
                                    </div>
                                </div>
                                <div class="my-auto">
                                    <h4 class="fw-bolder mb-0">{{ __('Videos') }}</h4>
                                    <h4 class="card-text font-small-3 mb-0">{{ $videoCount }}</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-12 mb-2 mb-md-0">
                            <div class="d-flex flex-row">
                                <div class="avatar bg-light-info me-2">
                                    <div class="avatar-content">
                                        <i class="fa-solid fa-newspaper fs-4"></i>
                                    </div>
                                </div>
                                <div class="my-auto">
                                    <h4 class="fw-bolder mb-0">{{ __('Articles') }}</h4>
                                    <h4 class="card-text font-small-3 mb-0">{{ $articleCount }}</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-12 mb-2 mb-sm-0">
                            <div class="d-flex flex-row">
                                <div class="avatar bg-light-danger me-2">
                                    <div class="avatar-content">
                                        <i class="fa-solid fa-shop fs-4"></i>
                                    </div>
                                </div>
                                <div class="my-auto">
                                    <h4 class="fw-bolder mb-0">{{ __('Products') }}</h4>
                                    <h4 class="card-text font-small-3 mb-0">{{ $productCount }}</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-12">
                            <div class="d-flex flex-row">
                                <div class="avatar bg-light-success me-2">
                                    <div class="avatar-content">
                                        <i class="fa-solid fa-list fs-4"></i>
                                    </div>
                                </div>
                                <div class="my-auto">
                                    <h4 class="fw-bolder mb-0">{{ __('Categories') }}</h4>
                                    <h4 class="card-text font-small-3 mb-0">{{ $categoryCount }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    {{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}
