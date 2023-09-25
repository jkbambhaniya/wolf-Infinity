@extends('layouts.admin.app')
@section('pagewise_css')
<!-- Datatable -->
<link href="{{ asset('admin-assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet"
	type="text/css" />
<!-- Datatable -->
<link href="{{ asset('admin-assets/plugins/custom/jstree/jstree.bundle.css') }}" rel="stylesheet" type="text/css" />
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
						class="path2"></span></i> <input type="text" topic-table-filter="search"
					class="form-control form-control-solid w-250px ps-13" placeholder="Search topic" />
			</div>
			<!--end::Search-->
		</div>
		<!--begin::Card title-->

		<!--begin::Card toolbar-->
		<div class="card-toolbar">
			<!--begin::Toolbar-->
			<div class="d-flex justify-content-end" topic-table-toolbar="base">
				<!--begin::Add topic-->
				<button class="btn btn-primary" onclick="demo_create();">
					<i class="ki-duotone ki-plus fs-2"></i> New Topic
				</button>
				<!--end::Add topic-->
			</div>
			<!--end::Toolbar-->
		</div>
		<!--end::Card toolbar-->
	</div>
	<!--end::Card header-->

	<!--begin::Card body-->
	<div class="card-body py-4 px-20">

		<div id="kt_docs_jstree_dragdrop"></div>

	</div>
	<!--end::Card body-->
</div>
<!--end::Card-->
@endsection
@section('pagewise_js')
<script src="{{ asset('admin-assets/plugins/custom/jstree/jstree.bundle.js') }}"></script>
<script>
	var listDataUrl = "{{route('admin.topic.get.root.data')}}";
	var destroyUrl = "{{route('admin.topic.delete')}}";
	var createOrUpdateUrl = "{{route('admin.topic.create.or.update')}}";
	// A $( document ).ready() block.
	$( document ).ready(function() {
		
	});
</script>
<script src="{{ asset('admin-assets/js/admin/topic/index.js') }}?{{ time() }}"></script>
@endsection