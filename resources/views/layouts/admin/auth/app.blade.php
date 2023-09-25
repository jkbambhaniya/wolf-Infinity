<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->

	<head>
		<title>{{config('app.name')}} - {{$title}}</title>
		<meta charset="utf-8" />
		<link rel="shortcut icon" href="{{ Storage::url($siteSetting['favicon']) }}" />
		<!--begin::Fonts-->
		<link rel="stylesheet" href="{{asset('admin-assets/fonts/css7b91.css?family=Inter:300,400,500,600,700')}}" />
		<!--end::Fonts-->
		<!--begin::Global Stylesheets Bundle(used by all pages)-->
		<link href="{{asset('admin-assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('admin-assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
		<!--end::Global Stylesheets Bundle-->
		@yield('pagewise_css')
		<style>
			:root,
			[data-bs-theme=light] {
				--bs-primary-header:
					<?php echo $siteSetting['header_color'] ?> !important;
				--bs-primary:
					<?php echo $siteSetting['primary_color'] ?> !important;
				--bs-primary-light:
					fade(<?php echo $siteSetting['primary_color'] ?>, 75%) !important;
				--bs-primary-active:
					<?php echo $siteSetting['primary_color'] ?> !important;
				--bs-primary-inverse:
					<?php echo $siteSetting['primary_text_color'] ?> !important;
				--bs-menu-link-color-hover:
					<?php echo $siteSetting['primary_color'] ?> !important;
				--bs-menu-link-color-active:
					<?php echo $siteSetting['primary_color'] ?> !important;
				--bs-text-primary:
					<?php echo $siteSetting['primary_color'] ?> !important;
				--bs-menu-link-color-show:
					<?php echo $siteSetting['primary_color'] ?> !important;
				--bs-menu-link-color-here:
					<?php echo $siteSetting['primary_color'] ?> !important;
				--bs-menu-link-color-active:
					<?php echo $siteSetting['primary_color'] ?> !important;
				--bs-gray-900:
					<?php echo $siteSetting['primary_color'] ?> !important;
				--bs-text-gray-900:
					<?php echo $siteSetting['primary_color'] ?> !important;
				--bs-scrolltop-bg-color:
					<?php echo $siteSetting['header_color'] ?> !important;
				--bs-scrolltop-bg-color-hover:
					<?php echo $siteSetting['header_color'] ?> !important;
			}

			[data-bs-theme=dark] {
				--bs-primary-header:
					<?php echo $siteSetting['header_color'] ?> !important;
				--bs-primary: #ffffff !important;
				--bs-primary-active: #ffffff !important;
				--bs-primary-inverse: #000000 !important;
				--bs-menu-link-color-hover: #ffffff !important;
				--bs-menu-link-color-active: #ffffff !important;
				--bs-text-primary: #ffffff !important;
				--bs-menu-link-color-show: #ffffff !important;
				--bs-menu-link-color-here: #ffffff !important;
				--bs-menu-link-color-active: #ffffff !important;
				--bs-gray-900: #ffffff !important;
				--bs-text-gray-900: #ffffff !important;
				--bs-scrolltop-bg-color:
					<?php echo $siteSetting['header_color'] ?> !important;
				--bs-scrolltop-bg-color-hover:
					<?php echo $siteSetting['header_color'] ?> !important;
			}
		</style>
	</head>
	<!--end::Head-->
	<!--begin::Body-->

	<body id="kt_body" class="app-blank app-blank bgi-size-cover bgi-position-center bgi-no-repeat">
		<!--begin::Root-->
		<div class="d-flex flex-column flex-root" id="kt_app_root">
			<!--begin::Page bg image-->

			<!--end::Page bg image-->
			<!--begin::Authentication - Sign-in -->
			<div class="d-flex justify-content-center flex-column flex-column-fluid flex-lg-row">

				<!--begin::Body-->
				@yield('content')
				<!--end::Body-->
			</div>
			<!--end::Authentication - Sign-in-->
		</div>
		<!--end::Root-->
		<!--begin::Javascript-->
		<script>
			var hostUrl = '{{config('app.url')}}';
		</script>
		<!--begin::Global Javascript Bundle(used by all pages)-->
		<script src="{{asset('admin-assets/plugins/global/plugins.bundle.js')}}"></script>
		<script src="{{asset('admin-assets/js/scripts.bundle.js')}}"></script>
		<!--end::Global Javascript Bundle-->
		<!--end::Custom Javascript-->
		@yield('pagewise_js')
		<!--end::Javascript-->
	</body>
	<!--end::Body-->

</html>