@extends('layouts.admin.app')
@section('pagewise_css')
<!-- Datatable -->
<link href="{{ asset('admin-assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet"
	type="text/css" />
<link href="{{ asset('admin-assets/plugins/custom/intltelInput/css/intlTelInput.min.css') }}?{{ time() }}"
	rel="stylesheet" type="text/css" />
@endsection
@section('content')
<!--begin::Card-->
<div class="card">
	<!--begin::Card header-->
	<div class="card-header border-0 pt-6">
		<!--begin::Card title-->
		<div class="card-title">
			<!--begin::Search-->
			<div class="d-flex align-items-center position-relative my-1">
				<i class="ki-duotone ki-magnifier fs-3 position-absolute ms-5"><span class="path1"></span><span
						class="path2"></span></i> <input type="text" data-user-table-filter="search"
					class="form-control form-control-solid w-250px ps-13" placeholder="Search user" />
			</div>
			<!--end::Search-->
		</div>
		<!--begin::Card title-->

		<!--begin::Card toolbar-->
		<div class="card-toolbar">
			<!--begin::Toolbar-->
			<div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
				<!--begin::Export-->
				<button type="button" class="btn btn-light-primary me-3" data-kt-menu-trigger="click"
					data-kt-menu-placement="bottom-end">
					<i class="ki-duotone ki-exit-up fs-2"><span class="path1"></span><span class="path2"></span></i>
					Export
				</button>
				<!--end::Export-->
				<!--begin::Menu-->
				<div id="kt_datatable_example_export_menu"
					class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-200px py-4"
					data-kt-menu="true">
					<!--begin::Menu item-->
					<div class="menu-item px-3">
						<a href="#" class="menu-link px-3" data-kt-export="copy">
							Copy to clipboard
						</a>
					</div>
					<!--end::Menu item-->
					<!--begin::Menu item-->
					<div class="menu-item px-3">
						<a href="#" class="menu-link px-3" data-kt-export="excel">
							Export as Excel
						</a>
					</div>
					<!--end::Menu item-->
					<!--begin::Menu item-->
					<div class="menu-item px-3">
						<a href="#" class="menu-link px-3" data-kt-export="csv">
							Export as CSV
						</a>
					</div>
					<!--end::Menu item-->
					<!--begin::Menu item-->
					<div class="menu-item px-3">
						<a href="#" class="menu-link px-3" data-kt-export="pdf">
							Export as PDF
						</a>
					</div>
					<!--end::Menu item-->
				</div>
				<!--end::Menu-->
				<!--begin::Hide default export buttons-->
				<div id="kt_datatable_example_buttons" class="d-none"></div>
				<!--end::Hide default export buttons-->

				<!--begin::Add user-->
				<a href="{{route('admin.user.create')}}" class="btn btn-primary">
					<i class="ki-duotone ki-plus fs-2"></i> Add User
				</a>
				<!--end::Add user-->
			</div>
			<!--end::Toolbar-->

			<!--begin::Group actions-->
			<div class="d-flex justify-content-end align-items-center d-none" data-kt-user-table-toolbar="selected">
				<div class="fw-bold me-5">
					<span class="me-2" data-kt-user-table-select="selected_count"></span> Selected
				</div>

				<button type="button" class="btn btn-danger" data-kt-user-table-select="delete_selected">
					Delete Selected
				</button>
			</div>
			<!--end::Group actions-->
		</div>
		<!--end::Card toolbar-->
	</div>
	<!--end::Card header-->

	<!--begin::Card body-->
	<div class="card-body py-4">

		<!--begin::Table-->
		<table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">
			<thead>
				<tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
					<th class="w-10px pe-2">
						<div class="form-check form-check-sm form-check-custom form-check-solid me-3">
							<input class="form-check-input cursor-pointer" type="checkbox" data-kt-check="true"
								data-kt-check-target="#kt_table_users .form-check-input" value="1" />
						</div>
					</th>
					<th class="min-w-120px">Name</th>
					<th class="min-w-120px">Email</th>
					<th class="min-w-180px">Phone</th>
					<th class="min-w-100px">Status</th>
					<th class="w-100px">Created At</th>
					<th class="text-end min-w-100px">Actions</th>
				</tr>
			</thead>
			<tbody class="text-gray-600 fw-semibold"></tbody>
		</table>
		<!--end::Table-->
	</div>
	<!--end::Card body-->
</div>
<!--end::Card-->
@endsection
@section('pagewise_js')
<script src="{{ asset('admin-assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
<script src="{{ asset('admin-assets/js/admin/user/index.js') }}?{{ time() }}"></script>
<script>
	var listDataUrl = "{{ route('admin.user.listdata') }}";
	var multipleDestroyUrl = "{{ route('admin.user.multiple.destroy') }}";
	
	// A $( document ).ready() block.
	$( document ).ready(function() {
		UsersList.init();
	});
</script>
@endsection