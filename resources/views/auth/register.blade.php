@extends('auth.layoutAuth')

@section('main_content')
<div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
          <div class="row flex-grow">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left p-5">
               <div class="text-center">
			   	<h4>Register Account</h4>
			   </div>
			   <form class="pt-3" action="{{ route('register') }}" method="post">
					@csrf
                  <div class="form-group">
                    <input type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" value="{{ old('name') }}" id="name" name="name" placeholder="Username">
					@error('name')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				  </div>
                  <div class="form-group">
                    <input type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" value="{{ old('email') }}" id="email" name="email" placeholder="Email">
					@error('email')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				  </div>
                  <div class="form-group">
                    <input type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password">
					@error('password')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				  </div>
				  <div class="form-group">
                    <input type="password" class="form-control form-control-lg" name="password_confirmation" required id="password-confirm" placeholder="{{ __('Confirm Password') }}">
                  </div>
                  <div class="mb-4">
                    <div class="form-check">
                      <label class="form-check-label text-muted">
                        <input type="checkbox" class="form-check-input"> I agree to all Terms &amp; Conditions <i class="input-helper"></i></label>
                    </div>
                  </div>
                  <div class="mt-3">
                    <button type="submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">SIGN UP</a>
                  </div>
                  <div class="text-center mt-4 font-weight-light"> Already have an account? <a href="{{ route('login') }}" class="text-primary">Login</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
@endsection
