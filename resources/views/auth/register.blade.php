@extends('auth.layoutAuth')

@section('main_content')

<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3 grid-margin stretch-card">
			<div class="card">
				<div class="card-body">
				<h2 class="card-title text-center">Login</h2>
				<form class="forms-sample" action="{{ route('register') }}" method="post">
					@csrf
					<div class="form-group">
					<label for="exampleInputEmail1">User Name</label>
					<input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" id="name" name="name" placeholder="UserName" onfocus="this.placeholder = ''" onblur="this.placeholder = 'UserName'">
					@error('name')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
					</div>
					<div class="form-group">
					<label for="exampleInputPassword1">Email</label>
						<input type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" id="email" name="email" placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'">
						@error('email')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
					</div>
					<div class="form-group">
						<label for="exampleInputPassword1">Password</label>
						<input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'">
						@error('password')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
					</div>
					<div class="form-group">
						<label for="exampleInputPassword1">Confirm Password</label>
						<input type="password" class="form-control" name="password_confirmation" required id="password-confirm" placeholder="{{ __('Confirm Password') }}">
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
