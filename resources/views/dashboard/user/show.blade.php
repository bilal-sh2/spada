@extends('layouts.dashboard.layouts')

@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-start mb-0">{{ __('Show User') }}</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/dashboard">{{ __('Home') }}</a>
                            </li>
                            <li class="breadcrumb-item active"><a href="#">{{ __('Show User') }}</a>
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
                @if (session('success'))
                    <div class="demo-spacing-0 mb-2">
                        <div class="alert alert-primary mt-1 alert-validation-msg" role="alert">
                            <div class="alert-body d-flex align-items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-info me-50">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <line x1="12" y1="16" x2="12" y2="12"></line>
                                    <line x1="12" y1="8" x2="12.01" y2="8"></line>
                                </svg>
                                <span><strong>{{ session('success') }}</strong></span>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="card">
                    <div class="card-header" dir="ltr">
                        <h4 class="card-title">{{ __('Show User') }}</h4>
                    </div>
                    <div class="card-body">
                        <div class="card-body" dir="ltr">
                            <h4 class="card-title text-primary">{{ __('Name') }}</h4>
                            <h4 class="card-title"> {{ $user->name }}</h4>

                            <h4 class="card-title text-primary">{{ __('Email') }}</h4>
                            <h4 class="card-title text-primary"> {{ $user->email }}</h4>
                        {{-- </div>
                        <div class="card-body"> --}}
                            <form method="POST" action="{{ route('profile.update') }}">
                                @csrf

                                {{-- @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif --}}

                                <div class="mb-1">
                                    <label for="name" class="form-label">{{ __('Name') }}</label>
                                    <input type="text" name="name"
                                        class="form-control @error('name') is-invalid @enderror" id="name"
                                        value="{{ old('name', $user->name) }}" required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-1">
                                    <label for="email" class="form-label">{{ __('Email') }}</label>
                                    <input type="email" name="email"
                                        class="form-control @error('email') is-invalid @enderror" id="email"
                                        value="{{ old('email', $user->email) }}" required>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-1">
                                    <label for="password" class="form-label">{{ __('Password') }}</label>
                                    <input type="password" name="password"
                                        class="form-control @error('password') is-invalid @enderror" id="password">
                                    <small
                                        class="form-text text-muted">{{ __('Leave blank if you do not want to change the password') }}</small>
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-1">
                                    <label for="password_confirmation"
                                        class="form-label">{{ __('Confirm Password') }}</label>
                                    <input type="password" name="password_confirmation"
                                        class="form-control @error('password_confirmation') is-invalid @enderror"
                                        id="password_confirmation">
                                    @error('password_confirmation')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary">{{ __('Update Profile') }}</button>
                            </form>


                        </div>
                    </div>
                    <a href="{{ route('dashboard') }}"
                        class="btn btn-outline-primary m-2 waves-effect">{{ __('Back') }}</a>
                </div>
            </div>
        </div>
    </section>
@endsection
