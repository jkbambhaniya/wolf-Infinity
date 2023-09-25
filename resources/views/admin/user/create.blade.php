@extends('layouts.admin.app')
@section('pagewise_css')
<link href="{{ asset('admin-assets/plugins/custom/intltelInput/css/intlTelInput.min.css') }}?{{ time() }}"
	rel="stylesheet" type="text/css" />
@endsection
@section('content')
<!--begin::Card-->
<div class="card mb-5 mb-xl-10">
	<!--begin::Card header-->
	<div class="card-header border-0">
		<!--begin::Card title-->
		<div class="card-title m-0">
			<h3 class="fw-bold m-0">{{ $title }}</h3>
		</div>
		<!--end::Card title-->
		<!--begin::Card toolbar-->
		<div class="card-toolbar">
			<a href="{{route('admin.user.index')}}" class="btn btn-light-primary btn-sm">
				<i class="ki-duotone ki-arrow-left fs-2">
					<i class="path1"></i>
					<i class="path2"></i>
				</i> Back
			</a>
		</div>
		<!--end::Card toolbar-->
	</div>
	<!--begin::Card header-->
	<form method="POST" action="{{ route('admin.user.store') }}" enctype="multipart/form-data"
		class="form fv-plugins-bootstrap5 fv-plugins-framework" id="user_create_form">
		@csrf
		<!--begin::Card body-->
		<div class="card-body p-9">
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
							style="background-image: url({{ asset('admin-assets/media/svg/avatars/blank.svg') }})">
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
						{{-- <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
							data-kt-image-input-action="remove" data-bs-toggle="tooltip" aria-label="Remove avatar"
							data-bs-original-title="Remove avatar" data-kt-initialized="1">
							<i class="bi bi-x fs-2"></i>
						</span> --}}
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
								placeholder="First name" value="{{ old('first_name') }}" maxlength="35">
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
								placeholder="Last name" value="{{ old('last_name') }}" maxlength="35">
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
						placeholder="Email" value="{{ old('email') }}" maxlength="70">
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
				<label class="col-lg-4 col-form-label required fw-semibold fs-6">Password</label>
				<!--end::Label-->
				<!--begin::Col-->
				<div class="col-lg-8">
					<!--begin::Row-->
					<div class="row">
						<!--begin::Col-->
						<div class="col-lg-6 fv-row fv-plugins-icon-container" data-kt-password-meter="true">
							<div class="position-relative mb-3 @error('password') is-invalid @enderror">
								<input class="form-control form-control-lg maxlength" type="password"
									placeholder="Password" name="password" id="password" autocomplete="off"
									maxlength="15" value="{{ old('password') }}">
								<span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"
									data-kt-password-meter-control="visibility">
									<i class="ki-duotone ki-eye-slash fs-1"><span class="path1"></span><span
											class="path2"></span><span class="path3"></span><span
											class="path4"></span></i>
									<i class="ki-duotone ki-eye d-none fs-1"><span class="path1"></span><span
											class="path2"></span><span class="path3"></span></i>
								</span>
							</div>
							<div class="d-flex align-items-center mb-3 d-none"
								data-kt-password-meter-control="highlight">
								<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2 active"></div>
								<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
								<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
								<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
							</div>
							@error('password')
							<span class="invalid-feedback" role="alert">
								{{ $message }}
							</span>
							@enderror
						</div>
						<!--end::Col-->

						<!--begin::Col-->
						<div class="col-lg-6 fv-row fv-plugins-icon-container" data-kt-password-meter="true">
							<div class="position-relative mb-3 @error('password_confirmation') is-invalid @enderror">
								<input class="form-control form-control-lg maxlength" type="password"
									placeholder="Confirm Password" name="password_confirmation"
									id="password_confirmation" autocomplete="off" maxlength="15"
									value="{{ old('password_confirmation') }}">
								<span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"
									data-kt-password-meter-control="visibility">
									<i class="ki-duotone ki-eye-slash fs-1"><span class="path1"></span><span
											class="path2"></span><span class="path3"></span><span
											class="path4"></span></i>
									<i class="ki-duotone ki-eye d-none fs-1"><span class="path1"></span><span
											class="path2"></span><span class="path3"></span></i>
								</span>
							</div>
							<div class="d-flex align-items-center mb-3 d-none"
								data-kt-password-meter-control="highlight">
								<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2 active"></div>
								<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
								<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
								<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
							</div>
							@error('password_confirmation')
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
			<!--begin::Input group-->
			<div class="row mb-6">
				<!--begin::Label-->
				<label class="col-lg-4 col-form-label fw-semibold fs-6">
					<span class="required">Date Of Birth</span>
				</label>
				<!--end::Label-->
				<!--begin::Col-->
				<div class="col-lg-8 fv-row fv-plugins-icon-container">
					<!--begin::Input group-->
					<div class="input-group">
						<span class="input-group-text">
							<i class="ki-duotone ki-calendar-8 fs-2">
								<i class="path1"></i>
								<i class="path2"></i>
								<i class="path3"></i>
								<i class="path4"></i>
								<i class="path5"></i>
								<i class="path6"></i>
							</i>
						</span>
						<input type="text" name="date_of_birth" id="date_of_birth"
							class="form-control form-control-lg maxlength fv-plugins-icon-input @error('date_of_birth') is-invalid @enderror"
							placeholder="Date Of Birth" maxlength="35"><i data-field="date_of_birth"
							class="fv-plugins-icon"></i>
						<div class="fv-plugins-message-container invalid-feedback"></div>
						@error('date_of_birth')
						<span class="invalid-feedback" role="alert">
							{{ $message }}
						</span>
						@enderror
					</div>
					<!--end::Input group-->
				</div>
				<!--end::Col-->
			</div>
			<!--end::Input group-->
		</div>
		<!--end::Card body-->
		<!--begin::Actions-->
		<div class="card-footer d-flex justify-content-end py-6 px-9">
			<button type="submit" class="btn btn-primary" id="user_create_submit">Save</button>
		</div>
		<!--end::Actions-->
	</form>
</div>
<!--end::Card-->
@endsection
@section('pagewise_js')
<script src="{{asset('admin-assets/plugins/custom/intltelInput/js/intlTelInput.min.js')}}"></script>
<script src="{{asset('admin-assets/plugins/custom/jquerymask/jquery.mask.min.js')}}"></script>
<script>
	var utilsScript = "{{ asset('admin-assets/plugins/custom/intlTelInput/js/utils.js') }}";
</script>
<script src="{{ asset('admin-assets/js/admin/user/create.js') }}?{{ time() }}"></script>
@endsection