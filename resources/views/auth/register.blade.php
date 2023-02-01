@extends('layouts.app')
@section('content')
        <div class="row justify-content-center h-100 align-items-center">
            <div class="col-md-6">
                <div class="authincation-content">
                    <div class="row no-gutters">
                        <div class="col-xl-12">
                            <div class="auth-form">
                                <div class="text-center mb-3">
                                </div>
                                <h4 class="text-center mb-4">{{ __('Sign up your account') }}</h4>
                                <form method="POST" action="{{ route('register') }}" >
                                    @csrf
                                    <div class="mb-3">
                                        <label class="mb-1"><strong>{{ __('Name') }}</strong></label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="{{ __('Enter name') }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="mb-1"><strong>{{ __('Surname') }}</strong></label>
                                        <input type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" placeholder="{{ __('Enter surname') }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="mb-1"><strong>{{ __('Restaurant') }}</strong></label>
                                        <input type="text" class="form-control @error('restaurant') is-invalid @enderror" name="restaurant" placeholder="{{ __('Enter restaurant') }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="mb-1"><strong>{{ __('Street') }}</strong></label>
                                        <input type="text" class="form-control @error('street') is-invalid @enderror" name="street" placeholder="{{ __('Enter street') }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="mb-1"><strong>{{ __('Housenumber') }}</strong></label>
                                        <input type="text" class="form-control @error('housenumber') is-invalid @enderror" name="housenumber" placeholder="{{ __('Enter housenumber') }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="mb-1"><strong>{{ __('Town') }}</strong></label>
                                        <input type="text" class="form-control @error('town') is-invalid @enderror" name="town" placeholder="{{ __('Enter town') }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="mb-1"><strong>{{ __('Phone') }}</strong></label>
                                        <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" placeholder="{{ __('Enter phone') }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="mb-1"><strong>{{ __('Email') }}</strong></label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="{{ __('Enter email') }}">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
    
                                    <input type="hidden" class="image" name="image" value="photo_defaults.jpg">
                                    <div class="mb-3">
                                        <label class="mb-1"><strong>{{ __('Password') }}</strong></label>
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="{{ __('Enter password') }}">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="mb-1"><strong>{{ __('Confirm Password') }}</strong></label>
                                        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" placeholder="{{ _('Choose Confirm Password') }}">
                                    </div>
                                    <div class="text-center mt-4">
                                        <button type="submit" class="btn btn-primary btn-block">{{ __('Sign me up') }}</button>
                                    </div>
                                </form>
                                <div class="new-account mt-3">
                                    <p>{{ __('Already have an account? ') }}<a class="text-primary" href="{{route('login')}}">{{ __('Sign in') }}</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    
@endsection
