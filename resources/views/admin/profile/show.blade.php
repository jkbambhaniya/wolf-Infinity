@extends('layouts.admin.app')
@section('title')
{{ $title }}
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
	<!--begin::Card body-->
	<div class="card-body p-9">
		<!--begin::Row-->
		<div class="row mb-7">
			<div class="col-md-6 col-lg-6 col-sm-6 col-12">
				<div class="row mb-7">
					<!--begin::Label-->
					<label class="col-lg-4 fw-semibold text-muted">Full Name</label>
					<!--end::Label-->
					<!--begin::Col-->
					<div class="col-lg-8">
						<span class="fw-bold fs-6 text-gray-800">{{ $admin->first_name.' '. $admin->last_name?? '-' }}
						</span>
					</div>
					<!--end::Col-->
				</div>
			</div>
			<div class="col-md-6 col-lg-6 col-sm-6 col-12">
				<div class="row mb-7">
					<!--begin::Label-->
					<label class="col-lg-4 fw-semibold text-muted">Email</label>
					<!--end::Label-->
					<!--begin::Col-->
					<div class="col-lg-8">
						<span class="fw-bold fs-6 text-gray-800">{{ $admin->email ?? '-' }}</span>
					</div>
					<!--end::Col-->
				</div>
			</div>
		</div>
		<!--end::Row-->
		<!--begin::Row-->
		<div class="row mb-7">
			<div class="col-md-6 col-lg-6 col-sm-6 col-12">
				<div class="row mb-7">
					<!--begin::Label-->
					<label class="col-lg-4 fw-semibold text-muted">Contact Phone</label>
					<!--end::Label-->
					<!--begin::Col-->
					<div class="col-lg-8 d-flex align-items-center">
						<span class="fw-bold fs-6 text-gray-800 me-2">{{ $admin->phone ?? '-' }}</span>
					</div>
					<!--end::Col-->
				</div>
			</div>
		</div>
		<!--end::Row-->
		<!--begin::Row-->
		<div class="row mb-7">

			<div class="col-md-6 col-lg-6 col-sm-6 col-12">
				<div class="row mb-7">
					<!--begin::Label-->
					<label class="col-lg-4 fw-semibold text-muted"></label>
					<!--end::Label-->
					<!--begin::Col-->
					<div class="col-lg-8">
						<span class="fw-bold fs-6 text-gray-800"></span>
					</div>
					<!--end::Col-->
				</div>
			</div>
		</div>
		<!--end::Row-->
	</div>
	<!--end::Card body-->
</div>
<!--end::details View-->
@endsection
@section('pagewise_js')
<script>
	$(document).ready(function() {

        });
</script>
@endsection