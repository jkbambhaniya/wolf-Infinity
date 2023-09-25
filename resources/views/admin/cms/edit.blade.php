@extends('layouts.admin.app')
@section('pagewise_css')

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
			{{-- <a href="{{route('admin.cms.index')}}" class="btn btn-light-primary btn-sm">
			<i class="ki-duotone ki-arrow-left fs-2">
				<i class="path1"></i>
				<i class="path2"></i>
			</i> Back
			</a> --}}
		</div>
		<!--end::Card toolbar-->
	</div>
	<!--begin::Card header-->
	<form method="POST" action="{{ route('admin.cms.update', $cms->hashId) }}" enctype="multipart/form-data"
		class="form fv-plugins-bootstrap5 fv-plugins-framework" id="cms_update_form">
		@method('PUT')
		@csrf
		<!--begin::Card body-->
		<div class="card-body p-9">
			<!--begin::Input group-->
			<div class="row mb-6">
				<!--begin::Label-->
				<label class="col-lg-4 col-form-label required fw-semibold fs-6">Name</label>
				<!--end::Label-->
				<!--begin::Col-->
				<div class="col-lg-8 fv-row fv-plugins-icon-container">
					<input type="text" name="name"
						class="form-control form-control-lg maxlength @error('name') is-invalid @enderror"
						placeholder="name" value="{{ old('name',$cms->name) }}" maxlength="70">
					@error('name')
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
					<span class="required">Description</span>
				</label>
				<!--end::Label-->
				<!--begin::Col-->
				<div class="col-lg-8 fv-row fv-plugins-icon-container">
					<textarea id="description" name="description"
						class="tox-target @error('description') is-invalid @enderror">{{old('description', $cms->description)}}</textarea>
					@error('description')
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
			<button type="submit" class="btn btn-primary" id="cms_update_submit">Update</button>
		</div>
		<!--end::Actions-->
	</form>
</div>
<!--end::Card-->
@endsection
@section('pagewise_js')
<script src="{{ asset('admin-assets/plugins/custom/tinymce/tinymce.bundle.js')}}"></script>
<script>
	var options = {
		selector: "#description",
		height : "480",
		plugins: 'preview advcode table advlist lists image media anchor hr link autoresize code',
		toolbar: 'preview | formatselect bold forecolor backcolor | bullist numlist | link image media anchor | table code',
	};
	
	if ( KTThemeMode.getMode() === "dark" ) {
	options["skin"] = "oxide-dark";
	options["content_css"] = "dark";
	}
	
	tinymce.init(options);
</script>
<script src="{{ asset('admin-assets/js/admin/cms/edit.js') }}?{{ time() }}"></script>
@endsection