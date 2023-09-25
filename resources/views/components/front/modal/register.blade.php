<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content modal-lg">
			<div class="modal-header">
				<h4 class="modal-title" id="registerModalLabel">{{ __('Register') }}</h4>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body px-3 px-sm-5 px-lg-5 px-md-5">
				<form method="POST" action="{{ route('register') }}" class="needs-validation" novalidate>
					@csrf
					<div class="mb-2">
						<div class="form-floating has-validation">
							<input type="text" name="first_name"
								class="form-control @error('first_name') is-invalid @enderror" id="first_name"
								placeholder="{{ __('First Name') }}" value="{{ old('first_name') }}" required>
							<label for="first_name">{{ __('First Name') }}</label>
							@error('first_name')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>
					</div>
					<div class="mb-2">
						<div class="form-floating has-validation">
							<input type="text" name="last_name"
								class="form-control @error('last_name') is-invalid @enderror" id="last_name"
								placeholder="{{ __('Last Name') }}" value="{{ old('last_name') }}" required>
							<label for="last_name">{{ __('Last Name') }}</label>
							@error('last_name')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>
					</div>
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
					<div class="d-grid gap-2">
						<button class="btn btn-main" type="submit" value="register"
							name="form_type">{{ __('Register') }}</button>
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