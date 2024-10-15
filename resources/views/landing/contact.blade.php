@extends('layouts.landing.layouts')

@section('content')

<!-- Header Start -->
<div class="container-fluid bg-primary">
    <div class="container text-center py-5" style="max-width: 900px;">
        <h4 class="text-light display-4 mb-4">{{ __('Contact us') }}</h4>
        <ol class="breadcrumb d-flex justify-content-center mb-0">
            <li class="breadcrumb-item"><a class="text-light" href="/">{{ __('Home') }}</a></li>
            <li class="breadcrumb-item active text-dark">{{ __('Contact us') }}</li>
        </ol>
    </div>
</div>
<!-- Header End -->

<!-- Contact Start -->
<div class="container-fluid contact bg-light py-5">
    <div class="container py-5">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="text-center mx-auto pb-5" style="max-width: 800px;">
            <h4 class="text-primary">{{ __('Contact us') }}</h4>
            <h1 class="display-4 mb-4">{{ __('If you have any questions please apply now') }}</h1>
        </div>
        <div class="row g-5">
            <div class="col-xl-6 m-auto">
                <div>
                    <h4 class="text-primary">{{ __('Send Your Message') }}</h4>
                    <form method="POST" action="{{ route('lead.store') }}">
                        @csrf
                        <div class="row g-3">
                            <div class="col-lg-12 col-xl-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control border-0" id="company" name="Company" placeholder="{{ __('Your Company') }}" required>
                                    <label for="company">{{ __('Your Company') }}</label>
                                </div>
                            </div>
                            <div class="col-lg-12 col-xl-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control border-0" id="last_name" name="Last_Name" placeholder="{{ __('Your Last Name') }}" required>
                                    <label for="last_name">{{ __('Your Last Name') }}</label>
                                </div>
                            </div>
                            <div class="col-lg-12 col-xl-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control border-0" id="first_name" name="First_Name" placeholder="{{ __('Your First Name') }}" required>
                                    <label for="first_name">{{ __('Your First Name') }}</label>
                                </div>
                            </div>
                            <div class="col-lg-12 col-xl-6">
                                <div class="form-floating">
                                    <input type="email" class="form-control border-0" id="email" name="Email" placeholder="{{ __('Your Email') }}" required>
                                    <label for="email">{{ __('Your Email') }}</label>
                                </div>
                            </div>
                            <div class="col-lg-12 col-xl-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control border-0" id="phone" name="Phone" placeholder="{{ __('Your Phone') }}" required>
                                    <label for="phone">{{ __('Your Phone') }}</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control border-0" placeholder="{{ __('Your Message') }}" id="message" name="Message" style="height: 150px;" required></textarea>
                                    <label for="message">{{ __('Your Message') }}</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary py-3 px-5" type="submit">{{ __('Send Message') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- Contact End -->
@endsection
