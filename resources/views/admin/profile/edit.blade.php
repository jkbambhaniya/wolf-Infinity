@extends('layouts.admin.app')
@section('title')
{{ $title }}
@endsection
@section('pagewise_css')
<link href="{{ asset('admin-assets/plugins/custom/intltelInput/css/intlTelInput.min.css') }}?{{ time() }}"
	rel="stylesheet" type="text/css" />
@endsection
@section('content')
<!--begin::Details-->
<x-admin.profile.details-card :admin="$admin" />
<!--end::Details-->
<!--begin::details View-->
<div class="card mb-5 mb-xl-10">
	<!--begin::Card header-->
	<div class="card-header">
		<!--begin::Card title-->
		<div class="card-title m-0">
			<h3 class="fw-bold m-0">{{ $title }}</h3>
		</div>
		<!--end::Card title-->
	</div>
	<!--begin::Card header-->
	<form method="POST" action="{{ route('admin.update.profile') }}" enctype="multipart/form-data"
		class="form fv-plugins-bootstrap5 fv-plugins-framework" id="profile_update_form">
		@csrf
		<!--begin::Card body-->
		<div class="card-body border-top p-9">
			<!--begin::Input group-->
			<div class="row mb-6">
				<!--begin::Label-->
				<label class="col-lg-4 col-form-label fw-semibold fs-6">Profile</label>
				<!--end::Label-->
				<!--begin::Col-->
				<div class="col-lg-8">
					<!--begin::Image input-->
					<div class="image-input image-input-outline @error('image') is-invalid @enderror"
						data-kt-image-input="true"
						style="background-image: url('{{ asset('admin-assets/media/svg/avatars/blank.svg') }}')">
						<!--begin::Preview existing avatar-->
						<div class="image-input-wrapper w-125px h-125px"
							style="background-image: url({{ Auth::guard('admin')->user()->profile_url }})">
						</div>
						<!--end::Preview existing avatar-->
						<!--begin::Label-->
						<label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
							data-kt-image-input-action="change" data-bs-toggle="tooltip" aria-label="Change avatar"
							data-bs-original-title="Change avatar" data-kt-initialized="1">
							<i class="bi bi-pencil-fill fs-7"></i>
							<!--begin::Inputs-->
							<input type="file" name="image" accept=".png, .jpg, .jpeg">
							<input type="hidden" name="avatar_remove">
							<!--end::Inputs-->
						</label>
						<!--end::Label-->
						<!--begin::Cancel-->
						<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
							data-kt-image-input-action="cancel" data-bs-toggle="tooltip" aria-label="Cancel avatar"
							data-bs-original-title="Cancel avatar" data-kt-initialized="1">
							<i class="bi bi-x fs-2"></i>
						</span>
						<!--end::Cancel-->
						<!--begin::Remove-->
						@if (Auth::guard('admin')->user()->profile)
						<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
							data-kt-image-input-action="remove" data-bs-toggle="tooltip" aria-label="Remove avatar"
							data-bs-original-title="Remove avatar" data-kt-initialized="1">
							<i class="bi bi-x fs-2"></i>
						</span>
						@endif
						<!--end::Remove-->
					</div>
					<!--end::Image input-->
					<!--begin::Hint-->
					<div class="form-text">Allowed file types: jpeg, png, jpg, svg, heic.</div>
					@error('image')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror
					<!--end::Hint-->
				</div>
				<!--end::Col-->
			</div>
			<!--end::Input group-->
			<!--begin::Input group-->
			<div class="row mb-6">
				<!--begin::Label-->
				<label class="col-lg-4 col-form-label required fw-semibold fs-6">Full Name</label>
				<!--end::Label-->
				<!--begin::Col-->
				<div class="col-lg-8">
					<!--begin::Row-->
					<div class="row">
						<!--begin::Col-->
						<div class="col-lg-6 fv-row fv-plugins-icon-container">
							<input type="text" name="first_name"
								class="form-control form-control-lg mb-3 mb-lg-0 maxlength @error('first_name') is-invalid @enderror"
								placeholder="First name" value="{{ old('first_name', $admin->first_name) }}"
								maxlength="35">
							@error('first_name')
							<span class="invalid-feedback" role="alert">
								{{ $message }}
							</span>
							@enderror
						</div>
						<!--end::Col-->

						<!--begin::Col-->
						<div class="col-lg-6 fv-row fv-plugins-icon-container">
							<input type="text" name="last_name"
								class="form-control form-control-lg maxlength @error('last_name') is-invalid @enderror"
								placeholder="Last name" value="{{ old('last_name', $admin->last_name) }}"
								maxlength="35">
							@error('last_name')
							<span class="invalid-feedback" role="alert">
								{{ $message }}
							</span>
							@enderror
						</div>
						<!--end::Col-->
					</div>
					<!--end::Row-->
				</div>
				<!--end::Col-->
			</div>
			<!--end::Input group-->
			<!--begin::Input group-->
			<div class="row mb-6">
				<!--begin::Label-->
				<label class="col-lg-4 col-form-label required fw-semibold fs-6">Email</label>
				<!--end::Label-->
				<!--begin::Col-->
				<div class="col-lg-8 fv-row fv-plugins-icon-container">
					<input type="text" name="email"
						class="form-control form-control-lg maxlength @error('email') is-invalid @enderror"
						placeholder="Email" value="{{ old('email', $admin->email) }}" maxlength="70">
					@error('email')
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
					<span class="required">Mobile Number</span>
				</label>
				<!--end::Label-->
				<input type="hidden" name="phone_code" id="phone_code">
				<!--begin::Col-->
				<div class="col-lg-8 fv-row fv-plugins-icon-container">
					<!--begin::Input group-->
					<div class="input-group @error('phone') is-invalid @enderror">
						<input id="phone" name="phone" type="text"
							class="form-control form-control-lg  @error('phone') is-invalid @enderror">
					</div>
					@error('phone')
					<span class="invalid-feedback" role="alert">
						{{ $message }}
					</span>
					@enderror
					<!--end::Input group-->
				</div>
				<!--end::Col-->
			</div>
			<!--end::Input group-->
		</div>
		<!--end::Card body-->
		<!--begin::Actions-->
		<div class="card-footer d-flex justify-content-end py-6 px-9">
			<button type="submit" class="btn btn-primary" id="profile_update_submit">Save Changes</button>
		</div>
		<!--end::Actions-->
	</form>
</div>
<!--end::details View-->
@endsection
@section('pagewise_js')
<script src="{{asset('admin-assets/plugins/custom/intltelInput/js/intlTelInput.min.js')}}"></script>
<script src="{{asset('admin-assets/plugins/custom/jquerymask/jquery.mask.min.js')}}"></script>
<script>
	var utilsScript = "{{ asset('admin-assets/plugins/custom/intlTelInput/js/utils.js') }}";
	const phoneValue = "{{old('phone', $admin->phone)}}";
	$(document).ready(function() {
	});
</script>
<script src="{{ asset('admin-assets/js/admin/profile/edit.js') }}?{{ time() }}"></script>
@endsection