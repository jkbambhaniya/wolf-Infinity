@extends('layouts.admin.auth.app')
@section('title')
{{$title}}
@endsection
@section('content')
<div class="d-flex flex-center w-lg-50 p-10">
	<!--begin::Card-->
	<div class="card rounded-3 w-md-550px">
		<!--begin::Card body-->
		<div class="card-body p-10 p-lg-20">
			<!--begin::Form-->
			<form class="form w-100" action="{{ route('admin.password.reset') }}" method="POST">
				@csrf
				<input type="hidden" name="token" value="{{ $token }}">
				<!--begin::Heading-->
				<div class="text-center mb-10">
					<!--begin::Logo-->
					<a href="{{route('admin.login')}}" class="mb-7">
						<x-admin.auth.SiteLogoImg></x-admin.auth.SiteLogoImg>
					</a>
					<!--end::Logo-->
					<!--begin::Title-->
					<h1 class="text-dark fw-bolder mb-3">Setup New Password</h1>
					<!--end::Title-->
					<!--begin::Link-->
					<div class="text-gray-500 fw-semibold fs-6">Have you already reset the password ?
						<a href="{{route('admin.login')}}" class="link-primary fw-bold">Sign in</a>
					</div>
					<!--end::Link-->
				</div>
				<!--begin::Heading-->
				<!--begin::Input group=-->
				<div class="fv-row mb-8 fv-plugins-icon-container">
					<!--begin::Email-->
					<input type="text" placeholder="Email" name="email" autocomplete="off"
						class="form-control bg-transparent  @error('email') is-invalid @enderror"
						value="{{ $email ?? old('email') }}" readonly>
					<!--end::Email-->
					@error('email')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror
					<div class="fv-plugins-message-container invalid-feedback"></div>
				</div>
				<!--begin::Input group-->
				<div class="fv-row mb-8" data-kt-password-meter="true">
					<!--begin::Wrapper-->
					<div class="mb-1">
						<!--begin::Input wrapper-->
						<div class="position-relative mb-3 @error('password') is-invalid @enderror">
							<input class="form-control bg-transparent @error('password') is-invalid @enderror"
								type="password" placeholder="Password" name="password" id="password" autocomplete="off">
							<span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"
								data-kt-password-meter-control="visibility">
								<i class="bi bi-eye-slash fs-2"></i>
								<i class="bi bi-eye fs-2 d-none"></i>
							</span>
						</div>
						@error('password')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
						@enderror
						<!--end::Input wrapper-->
						<!--begin::Meter-->
						<div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
							<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
							<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
							<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
							<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
						</div>
						<!--end::Meter-->
					</div>
					<!--end::Wrapper-->
					<!--begin::Hint-->
					<div class="text-muted">Use 8 or more characters with a mix of letters, numbers &amp; symbols.</div>
					<!--end::Hint-->
				</div>
				<!--end::Input group=-->
				<!--end::Input group=-->
				<div class="fv-row mb-8">
					<!--begin::Repeat Password-->
					<input type="password" placeholder="Confirm Password" name="password_confirmation"
						id="password_confirmation" autocomplete="off" class="form-control bg-transparent">
					<!--end::Repeat Password-->
				</div>
				<!--end::Input group=-->
				<!--begin::Action-->
				<div class="d-grid mb-10">
					<button type="submit" class="btn btn-primary">
						<!--begin::Indicator label-->
						<span class="indicator-label">Submit</span>
						<!--end::Indicator label-->
					</button>
				</div>
				<!--end::Action-->
			</form>
			<!--end::Form-->
		</div>
		<!--end::Card body-->
	</div>
	<!--end::Card-->
</div>
@endsection
@section('pagewise_js')
<script>
	// A $( document ).ready() block.
	$( document ).ready(function() {
		$('#password, #password_confirmation').keydown(function (e) {
			if (e.ctrlKey && (e.keyCode == 88 || e.keyCode == 67 || e.keyCode == 86)) {
				return false;
			}
		});
	});
</script>
@endsection