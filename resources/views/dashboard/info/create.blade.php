@extends('layouts.dashboard.layouts')

@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-start mb-0">{{ __('Add Information') }}</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/dashboard">{{ __('Home') }}</a>
                            </li>
                            <li class="breadcrumb-item active"><a href="#">{{ __('Add Information') }}</a>
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
                        <h4 class="card-title">{{ __('Add Information') }}</h4>
                    </div>
                    <div class="card-body">
                        <form class="form" action="{{ route('info.store') }}" method="POST">
                            @csrf
                            {{-- <div class="row"> --}}
                            <div class=" col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="first-name-column">{{ __('Address') }}</label>
                                    <input type="text" id="first-name-column" class="form-control" placeholder="{{ __('Address') }}"
                                        name="address" value="{{ old('address') }}">
                                </div>
                            </div>
                            <div class=" col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="first-name-column">{{ __('Email') }}</label>
                                    <input type="email" id="first-name-column" class="form-control" placeholder="{{ __('spada@info.com') }}"
                                        name="email" value="{{ old('email') }}">
                                </div>
                            </div>
                            <div class=" col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="first-name-column">{{ __('Phone Number') }}</label>
                                    <input type="number" id="first-name-column" class="form-control" placeholder="0555 555 5555"
                                        name="phone_number" value="{{ old('phone_number') }}">
                                </div>
                            </div>

                            <div class=" col-md-8 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="description">{{ __('About us') }}</label>
                                    {{-- <input type="text" id="description" class="form-control" placeholder="Name" name="description" value="{{ old('description') }}" > --}}
                                    <textarea class="form-control" id="description" rows="3" placeholder="{{ __('About us') }}" name="about"
                                        value="{{ old('about') }}"></textarea>
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
@endsection
