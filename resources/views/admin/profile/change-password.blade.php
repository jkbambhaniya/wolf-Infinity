@extends('layouts.admin.app')
@section('title')
{{ $title }}
@endsection
@section('pagewise_css')
@endsection
@section('content')
<x-admin.flash-message></x-admin.flash-message>
<!--begin::Details-->
<x-admin.profile.details-card :admin="$admin" />
<!--end::Details-->
<!--begin::details View-->
<div class="card mb-5 mb-xl-10">
	<!--begin::Card header-->
	<div class="card-header cursor-pointer">
		<!--begin::Card title-->
		<div class="card-title m-0">
			<h3 class="fw-bold m-0">{{ $title }}</h3>
		</div>
		<!--end::Card title-->
	</div>
	<!--begin::Card header-->
	<form method="POST" action="{{ route('admin.change.password') }}" enctype="multipart/form-data"
		class="form fv-plugins-bootstrap5 fv-plugins-framework" id="change_password_form">
		@csrf
		<!--begin::Card body-->
		<div class="card-body border-top p-9">
			<!--begin::Input group-->
			<div class="row mb-6">
				<!--begin::Label-->
				<label class="col-lg-4 col-form-label required fw-semibold fs-6">Current Password</label>
				<!--end::Label-->
				<!--begin::Col-->
				<div class="col-lg-8 fv-row fv-plugins-icon-container" data-kt-password-meter="true">
					<div class="position-relative mb-3 @error('current_password') is-invalid @enderror">
						<input class="form-control form-control-lg maxlength" type="password"
							placeholder="Current Password" name="current_password" id="current_password"
							value="{{old('current_password')}}" autocomplete="off" maxlength="15">
						<span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"
							data-kt-password-meter-control="visibility">
							<i class="ki-duotone ki-eye-slash fs-1"><span class="path1"></span><span
									class="path2"></span><span class="path3"></span><span class="path4"></span></i>
							<i class="ki-duotone ki-eye d-none fs-1"><span class="path1"></span><span
									class="path2"></span><span class="path3"></span></i>
						</span>
					</div>
					<div class="d-flex align-items-center mb-3 d-none" data-kt-password-meter-control="highlight">
						<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2 active"></div>
						<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
						<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
						<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
					</div>
					@error('current_password')
					<span class="invalid-feedback" role="alert">
						{{ $message }}
					</span>
					@enderror
				</div>
				<!--end::Col-->
			</div>
			<!--end::Input group-->
			<!--begin::Input group-->
			<div class="row mb-6">
				<!--begin::Label-->
				<label class="col-lg-4 col-form-label required fw-semibold fs-6">New Password</label>
				<!--end::Label-->
				<!--begin::Col-->
				<div class="col-lg-8 fv-row fv-plugins-icon-container" data-kt-password-meter="true">
					<div class="position-relative mb-3 @error('new_password') is-invalid @enderror">
						<input class="form-control form-control-lg maxlength" type="password" placeholder="New Password"
							name="new_password" id="new_password" autocomplete="off" maxlength="15"
							value="{{ old('new_password') }}">
						<span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"
							data-kt-password-meter-control="visibility">
							<i class="ki-duotone ki-eye-slash fs-1"><span class="path1"></span><span
									class="path2"></span><span class="path3"></span><span class="path4"></span></i>
							<i class="ki-duotone ki-eye d-none fs-1"><span class="path1"></span><span
									class="path2"></span><span class="path3"></span></i>
						</span>
					</div>
					<div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
						<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2 active"></div>
						<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
						<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
						<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
					</div>
					@error('new_password')
					<span class="invalid-feedback" role="alert">
						{{ $message }}
					</span>
					@enderror
				</div>
				<!--end::Col-->
			</div>
			<!--end::Input group-->
			<!--begin::Input group-->
			<div class="row mb-6">
				<!--begin::Label-->
				<label class="col-lg-4 col-form-label fw-semibold fs-6">
					<span class="required">Confirm New Password</span>
				</label>
				<!--end::Label-->
				<!--begin::Col-->
				<div class="col-lg-8 fv-row fv-plugins-icon-container" data-kt-password-meter="true">
					<div class="position-relative mb-3 @error('new_password_confirmation') is-invalid @enderror">
						<input class="form-control form-control-lg maxlength" type="password"
							placeholder="Confirm New Password" name="new_password_confirmation"
							id="new_password_confirmation" autocomplete="off" maxlength="15"
							value="{{ old('new_password_confirmation') }}">
						<span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"
							data-kt-password-meter-control="visibility">
							<i class="ki-duotone ki-eye-slash fs-1"><span class="path1"></span><span
									class="path2"></span><span class="path3"></span><span class="path4"></span></i>
							<i class="ki-duotone ki-eye d-none fs-1"><span class="path1"></span><span
									class="path2"></span><span class="path3"></span></i>
						</span>
					</div>
					<div class="d-flex align-items-center mb-3 d-none" data-kt-password-meter-control="highlight">
						<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2 active"></div>
						<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
						<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
						<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
					</div>
					@error('new_password_confirmation')
					<span class="invalid-feedback" role="alert">
						{{ $message }}
					</span>
					@enderror
				</div>
				<!--end::Col-->
			</div>
			<!--end::Input group-->
		</div>
		<!--end::Card body-->
		<!--begin::Actions-->
		<div class="card-footer d-flex justify-content-end py-6 px-9">
			<button type="submit" class="btn btn-primary" id="change_password_submit">Update</button>
		</div>
		<!--end::Actions-->
	</form>
</div>
<!--end::details View-->
@endsection
@section('pagewise_js')
<script src="{{ asset('admin-assets/js/admin/profile/change-password.js') }}?{{ time() }}"></script>
<script>
	$(document).ready(function() {
		$('.maxlength').maxlength({
			alwaysShow: false,
			threshold: 5,
			warningClass: "badge badge-success",
			limitReachedClass: "badge badge-danger",
			separator: ' of ',
			preText: 'You have ',
			postText: ' chars remaining.',
			validate: true
		});

		$('#current_password, #new_password, #new_password_confirmation').keydown(function (e) {
			if (e.ctrlKey && (e.keyCode == 88 || e.keyCode == 67 || e.keyCode == 86)) {
				return false;
			}
		});
    });
</script>
@endsection