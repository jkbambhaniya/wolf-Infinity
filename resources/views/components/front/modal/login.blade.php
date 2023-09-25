<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content ">
			<div class="modal-header">
				<h4 class="modal-title" id="loginModalLabel">{{ __('Login') }}</h4>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body px-3 px-sm-5 px-lg-5 px-md-5">
				<form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate id="loginForm">
					@csrf
					<div class="mb-2">
						<div class="form-floating has-validation">
							<input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
								id="email" placeholder="{{ __('Email Address') }}" value="{{ old('email') }}" required>
							<label for="email">{{ __('Email Address') }}</label>
							@error('email')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>
					</div>
					<div class="mb-2">
						<div class="form-floating has-validation">
							<input type="password" class="form-control @error('password') is-invalid @enderror"
								id="password" name="password" placeholder="{{ __('Password') }}" required>
							<label for="password">{{ __('Password') }}</label>
							@error('password')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>
					</div>

					<div class="row mb-3">
						<div class="col-md-6 mb-1">
							<div class="form-check">
								<input class="form-check-input" type="checkbox" name="remember" id="remember" {{
									old('remember') ? 'checked' : '' }}>
								<label class="form-check-label" for="remember">
									{{ __('Remember Me') }}
								</label>
							</div>
						</div>
						<div class="col-md-6 text-lg-end mb-1">
							{{-- @if (Route::has('password.request')) --}}
							<a class="" data-bs-target="#forgotPasswordModal" data-bs-toggle="modal"
								href="javascript:void(0);">
								{{ __('Forgot Your Password?') }}
							</a>
							{{-- @endif --}}
						</div>
					</div>
					<div class="d-grid gap-2">
						<button class="btn btn-main" type="submit" id="loginBtn" value="login"
							name="form_type">{{ __('Login') }}</button>
					</div>
				</form>
			</div>
			<div class="modal-footer d-block">
				<div class="d-grid gap-2 text-center d-sm-block m-0">
					<a href="{{ route('social.redirect','google') }}" target="_blank"
						class="btn-social btn-google-plus"><i class="fab fa-google"></i></a>
					<a href="{{ route('social.redirect','facebook') }}" target="_blank"
						class="btn-social btn-facebook"><i class="fab fa-facebook-f"></i></a>
				</div>
			</div>
		</div>
	</div>
</div>