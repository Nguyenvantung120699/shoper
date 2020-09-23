@extends('auth.layoutAuth')

@section('main_content')
	<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3 grid-margin stretch-card">
			<div class="card">
				<div class="card-body">
				<h2 class="card-title text-center">Login</h2>
				<form class="forms-sample" action="{{ route('login') }}" method="post">
					@csrf
					<div class="form-group">
					<label for="exampleInputEmail1">Email address</label>
					<input type="email" class="form-control  @error('email') is-invalid @enderror" value="{{ old('email') }}" id="email" name="email" placeholder="Email">
					@error('email')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
                	@enderror
					</div>
					<div class="form-group">
					<label for="exampleInputPassword1">Password</label>
						<input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password">
						@error('password')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
					</div>
					<div class="row">
						<div class="form-check form-check-flat form-check-primary">
						<label class="form-check-label">
							<input type="checkbox" class="form-check-input"> Remember me <i class="input-helper"></i></label>
						</div>
						<div class="form-check form-check-flat form-check-primary">
						<label class="form-check-label">
							@if (Route::has('password.request'))
								<a href="{{ route('password.request') }}">Forgot Password?</a>
							@endif
						</label>
						</div>
					</div>
					<button type="submit" class="btn btn-gradient-primary mr-2">Login</button>
					<button class="btn btn-light">Cancel</button>
				</form>
				</div>
			</div>
		</div>
	</div>
	</div>
@endsection
