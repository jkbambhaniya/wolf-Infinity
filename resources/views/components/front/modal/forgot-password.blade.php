<div class="modal fade" id="forgotPasswordModal" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true"
	aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="exampleModalToggleLabel2">{{ __('Reset Password') }}</h1>
				<button type="button" class="btn-close" data-bs-target="#loginModal" data-bs-toggle="modal"></button>
			</div>
			<div class="modal-body px-lg-5 px-md-5 px-sm-5 py-lg-5 py-md-5 py-sm-5">
				<form method="POST" action="{{ route('password.email') }}" class="" id="resetPasswordForm">
					<div class="mb-2">
						<div class="form-floating">
							<input type="email" name="resetPasswordEmail" class="form-control" id="resetPasswordEmail"
								placeholder="{{ __('Email Address') }}" value="{{ old('resetPasswordEmail') }}">
							<label for="resetPassword">{{ __('Email Address') }}</label>
						</div>
					</div>
					<div class="d-grid gap-2">
						<button class="btn btn-main" type="submit"
							id="resetPasswordBtn">{{ __('Send Password Reset Link') }}</button>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				{{-- <button class="btn btn-primary" data-bs-target="#loginModal" data-bs-toggle="modal">Back to
							login</button> --}}
			</div>
		</div>
	</div>
</div>