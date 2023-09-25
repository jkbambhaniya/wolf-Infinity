@extends('layouts.admin.app')
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
	<form method="POST" action="{{ route('admin.topic.store') }}" enctype="multipart/form-data"
		class="form fv-plugins-bootstrap5 fv-plugins-framework" id="topic_create_form">
		@csrf
		<!--begin::Card body-->
		<div class="card-body p-9">
			<!--begin::Input group-->
			<div class="row mb-6">
				<!--begin::Label-->
				<label class="col-lg-4 col-form-label required fw-semibold fs-6">Name</label>
				<!--end::Label-->
				<!--begin::Col-->
				<div class="col-lg-8">
					<!--begin::Row-->
					<div class="row">
						<!--begin::Col-->
						<div class="col-lg-6 fv-row fv-plugins-icon-container">
							<input type="text" name="name"
								class="form-control form-control-lg mb-3 mb-lg-0 maxlength @error('name') is-invalid @enderror"
								placeholder="Name" value="{{ old('name') }}" maxlength="35">
							@error('name')
							<span class="invalid-feedback" role="alert">
								{{ $message }}
							</span>
							@enderror
						</div>
						<!--end::Col-->

						<!--begin::Col-->
						<div class="col-lg-6 fv-row fv-plugins-icon-container">
							<input type="text" name="slug" class="form-control form-control-lg" placeholder="Slug"
								readonly>
						</div>
						<!--end::Col-->
					</div>
					<!--end::Row-->
				</div>
				<!--end::Col-->
			</div>
			<!--end::Input group-->
		</div>
		<!--end::Card body-->
		<!--begin::Actions-->
		<div class="card-footer d-flex justify-content-end py-6 px-9">
			<button type="submit" class="btn btn-primary" id="topic_create_submit">Save</button>
		</div>
		<!--end::Actions-->
	</form>
</div>
<!--end::Card-->
@endsection
@section('pagewise_js')
<script>

</script>
<script src="{{ asset('admin-assets/js/admin/topic/create.js') }}?{{ time() }}"></script>
@endsection