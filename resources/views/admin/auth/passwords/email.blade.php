@extends('layouts.admin.auth.app')

@section('content')
<div class="d-flex flex-center w-lg-50 p-10">
	<!--begin::Card-->
	<div class="card rounded-3 w-md-550px">
		<!--begin::Card body-->
		<div class="card-body p-10 p-lg-20">
			<!--begin::Form-->
			<form action="{{ route('admin.password.eamil') }}" method="POST" class="form w-100"
				id="password_reset_form">
				@csrf
				<!--begin::Heading-->
				<div class="text-center mb-10">
					<!--begin::Logo-->
					<a href="{{route('admin.login')}}" class="mb-7">
						<x-admin.auth.SiteLogoImg></x-admin.auth.SiteLogoImg>
					</a>
					<!--end::Logo-->
					<!--begin::Title-->
					<h1 class="text-dark fw-bolder mb-3">Forgot Password ?</h1>
					<!--end::Title-->
					<!--begin::Link-->
					<div class="text-gray-500 fw-semibold fs-6">To reset your password, please enter your registered
						email id</div>
					<!--end::Link-->
				</div>
				<!--begin::Heading-->
				@if (session('status'))
				<div class="alert alert-success" role="alert">
					{{ session('status') }}
				</div>
				@endif
				<!--begin::Input group=-->
				<div class="fv-row mb-8 fv-plugins-icon-container">
					<!--begin::Email-->
					<input type="text" placeholder="Email *" name="email" autocomplete="off"
						class="form-control bg-transparent  @error('email') is-invalid @enderror"
						value="{{ old('email') }}">
					<!--end::Email-->
					@error('email')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror
					<div class="fv-plugins-message-container invalid-feedback"></div>
				</div>
				<!--begin::Actions-->
				<div class="d-flex flex-wrap justify-content-center pb-lg-0">
					<button type="submit" class="btn btn-primary me-4" id="password_reset_submit">
						<!--begin::Indicator label-->
						<span class="indicator-label">{{ __('Send') }}</span>
						<!--end::Indicator label-->
					</button>
					<a href="{{route('admin.login')}}" class="btn btn-light">Cancel</a>
				</div>
				<!--end::Actions-->
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
	$( document ).ready(function() {

	});
</script>
<script src="{{asset('admin-assets/js/admin/auth/password/email.js')}}"></script>
@endsection