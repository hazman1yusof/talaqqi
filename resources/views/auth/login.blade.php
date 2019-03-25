@extends('layouts.main')

@section('page')

<div class="container">
  <div class="row">
    <div class="col col-login mx-auto">
      <form class="card" action="{{ route('login') }}" method="post">
        @csrf
        <div class="card-body p-6">
          <div class="card-title">Login to your account</div>
          <div class="form-group">

            <label class="form-label">{{ __('E-Mail Address') }}</label>
            <input id="email" name="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">

            @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif

          </div>
          <div class="form-group">
            <label class="form-label">
              {{ __('Password') }}
              <a href="{{ route('password.request') }}" class="float-right small">I forgot password</a>
            </label>
            <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Password">

            @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif

          </div>
          <div class="form-group">
            <label class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" name="remember" id="remember"  {{ old('remember') ? 'checked' : '' }} />
              <span class="custom-control-label">{{ __('Remember Me') }}</span>
            </label>

            <div class="row">
	            <div class="col-sm-12 col-md-4 text-center p-2">
                <a href="{{ url('/auth/facebook') }}" class="btn btn-facebook"><i class="fa fa-facebook"></i> Facebook</a>
	            </div>
	            <div class="col-sm-12 col-md-4 text-center p-2">
                <a href="#" class="btn btn-twitter"><i class="fa fa-twitter"></i> Twitter</a>
	            </div>
	            <div class="col-sm-12 col-md-4 text-center p-2">
                <a href="#" class="btn btn-google"><i class="fa fa-google"></i> Google</a>
	            </div>
            </div>
            
          </div>
          <div class="form-footer">
            <button type="submit" class="btn btn-primary btn-block">Sign in</button>
          </div>
        </div>
      </form>
      <div class="text-center text-muted">
        Don't have account yet? <a href="/register">Sign up</a>
      </div>
    </div>
  </div>
</div>
@endsection