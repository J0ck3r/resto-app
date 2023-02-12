@extends('layouts.app')
@section('content')
<div class="hold-transition register-page">
<div class="register-box">
    <div class="card card-outline card-primary">
      <div class="card-body">
        <p class="login-box-msg">{{ __('Register a new membership') }}</p>
        <form method="POST" action="{{ route('register') }}" >
            @csrf
          <div class="input-group mb-3">
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="{{ __('Name') }}">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" placeholder="{{ __('Surname') }}">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="text" class="form-control @error('street') is-invalid @enderror" name="street" placeholder="{{ __('Street') }}">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="text" class="form-control @error('housenumber') is-invalid @enderror" name="housenumber" placeholder="{{ __('Housenumber') }}">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="text" class="form-control @error('town') is-invalid @enderror" name="town" placeholder="{{ __('Town') }}">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" placeholder="{{ __('Enter phone') }}">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="{{ __('Email') }}">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="{{ __('Password') }}">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" placeholder="{{ _('Confirm Password') }}">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-8">
              <div class="mb-3 form-check">
                <input type="checkbox" required class="form-check-input @error('terms') is-invalid @enderror" value="true" name="terms" id="keep-signed" {{ !old('terms') ?: 'checked' }}>
                @error('terms')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <label for="terms">
                 {{ __('I agree to the') }} <a href="#">{{ __('terms') }}</a>
                </label>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">{{ __('Register') }}</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
        <a href="{{ route('login') }}" class="text-center">{{ __('I already have a membership') }}</a>
      </div>
      <!-- /.form-box -->
    </div><!-- /.card -->
  </div>
</div>
  <!-- /.register-box -->
@endsection
