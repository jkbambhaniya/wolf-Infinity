@extends('layouts.app')

@section('content')
<section class="section pb-0 mt-3">
	<div class="container mt-2">
		<div class="row justify-content-center">
			<div class="col-lg-6 mb-5">
				<article class="card">
					<div class="card-body">
						<form method="POST" action="{{ route('password.update') }}">
							@csrf

							<input type="hidden" name="token" value="{{ $token }}">
							<div class="form-floating mb-3">
								<input type="email" class="form-control @error('email') is-invalid @enderror"
									name="email" id="email" placeholder="{{ __('Email Address') }}"
									value="{{ $email ?? old('email') }}" readonly>
								<label for="email">{{ __('Email Address') }}</label>
								@error('email')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
							<div class="form-floating mb-3">
								<input type="password" class="form-control @error('password') is-invalid @enderror"
									name="password" id="password" placeholder="{{ __('Password') }}">
								<label for="password">{{ __('Password') }}</label>
								@error('password')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
							<div class="form-floating mb-3">
								<input type="password" class="form-control" name="password_confirmation"
									id="password_confirmation" placeholder="{{ __('Confirm Password') }}">
								<label for="password_confirmation">{{ __('Confirm Password') }}</label>
							</div>
							<div class="row mb-0">
								<div class="col-md-6 offset-md-4">
									<button type="submit" class="btn btn-main">
										{{ __('Reset Password') }}
									</button>
								</div>
							</div>
						</form>
					</div>
				</article>
			</div>
		</div>
	</div>
</section>
@endsection