@extends('layouts.auth')

@section('auth-content')

<div class="limiter">
    <div class="container-login100">
      <div class="flex justify-content-center pb-2 custom-image">
        <img src="{{ asset('frontend/images/upnormal_svg.svg') }}" alt="" srcset="">
      </div>
      <div class="card-custom" style="padding: 2rem;">
        <form  method="POST" action="{{ url('/update-password') }}" class=" validate-form">
          @method('put')
          @csrf
          <span class="login100-form-title">
            Atur Ulang Password
            <p>Massukan password anda</p>
          </span>

          <div class="wrap-input100 validate-input">
            <input id="password" type="password" class="input100 @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>

          <div class="wrap-input100 validate-input">
            <input id="password-confirm" type="password" class="input100" name="password_confirmation" required autocomplete="new-password" placeholder="Konfirmasi Password">
          </div>

          <input name="email" value="{{ $user->email }}" type="hidden">

          <div class="container-login100-form-btn">
            <button type="submit" class="login100-form-btn">
              Kirim
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
