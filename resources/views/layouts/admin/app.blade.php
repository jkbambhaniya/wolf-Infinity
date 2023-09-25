<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->

	<!-- Added by HTTrack -->
	<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

	<head>
		<title>{{config('app.name')}} - {{$title}}</title>
		<meta charset="utf-8" />


		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="shortcut icon" href="{{ Storage::url($siteSetting['favicon']) }}" />

		<!--begin::Fonts(mandatory for all pages)-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
		<!--end::Fonts-->

		<!--begin::Vendor Stylesheets(used for this page only)-->
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
				--bs-component-active-bg:
					<?php echo $siteSetting['primary_color'] ?> !important;
				--bs-component-hover-color:
					<?php echo $siteSetting['primary_color'] ?> !important;
				--bs-text-white: <?php echo $siteSetting['primary_color'] ?> !important;
				--bs-scrolltop-icon-color: <?php echo $siteSetting['primary_color'] ?> !important;
				--bs-scrolltop-icon-color-hover: <?php echo $siteSetting['primary_color'] ?> !important;
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
				--bs-text-white: #000000 !important;
			}
		</style>
		<!--end::Vendor Stylesheets-->

		<!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
		<link href="{{asset('admin-assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('admin-assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
		<!--end::Global Stylesheets Bundle-->
	</head>
	<!--end::Head-->

	<!--begin::Body-->

	<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed">
		<!--begin::Theme mode setup on page load-->
		<script>
			var defaultThemeMode = "light";
			var themeMode;

			if ( document.documentElement ) {
				if ( document.documentElement.hasAttribute("data-bs-theme-mode")) {
					themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
				} else {
					if ( localStorage.getItem("data-bs-theme") !== null ) {
						themeMode = localStorage.getItem("data-bs-theme");
					} else {
						themeMode = defaultThemeMode;
					}			
				}

				if (themeMode === "system") {
					themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
				}

				document.documentElement.setAttribute("data-bs-theme", themeMode);
			}            
		</script>
		<!--end::Theme mode setup on page load-->
		<!--begin::Main-->
		<!--begin::Root-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Page-->
			<div class="page d-flex flex-row flex-column-fluid">
				<!--begin::Wrapper-->
				<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
					<!--begin::Header-->
					<x-admin.header></x-admin.header>
					<!--end::Header-->
					<!--begin::Content wrapper-->
					<div class="d-flex flex-column-fluid">
						<!--begin::Aside-->
						<x-admin.sidebar></x-admin.sidebar>
						<!--end::Aside-->

						<!--begin::Container-->
						<div class="d-flex flex-column flex-column-fluid container-fluid ">
							<x-admin.breadcrumb :breadcrumb="$breadcrumb ?? ''" :title="$title"></x-admin.breadcrumb>
							<!--begin::Post-->
							<div class="content flex-column-fluid" id="kt_content">
								@yield('content')
							</div>
							<!--end::Post-->

							<!--begin::Footer-->
							<x-admin.footer></x-admin.footer>
							<!--end::Footer-->
						</div>
						<!--end::Container-->
					</div>
					<!--end::Content wrapper-->
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
		<!--end::Root-->
		<!--end::Main-->
		<!--begin::Scrolltop-->
		<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
			<i class="ki-duotone ki-arrow-up"><span class="path1"></span><span class="path2"></span></i>
		</div>
		<!--end::Scrolltop-->
		<!--begin::Global Javascript Bundle(mandatory for all pages)-->
		<script src="{{asset('admin-assets/plugins/global/plugins.bundle.js')}}"></script>
		<script src="{{asset('admin-assets/js/scripts.bundle.js')}}"></script>
		<!--end::Global Javascript Bundle-->
		<!--begin::Custom Javascript(used for this page only)-->
		<script>
			const hostUrl = "{{ config('app.url') }}";
			const csrfToken = "{{ csrf_token() }}";
			const adminId = "{{ Auth::guard('admin')->id() }}";
			const assetUrl = "{{ asset('/') }}";
			const dateFormat = "{{ config('app.date_format') }}";
			var drawerElement = document.querySelector("#kt_drawer_chat");
			var chat_drawer = new KTDrawer(drawerElement);
			const loadingEl = document.createElement("div");
			loadingEl.classList.add("page-loader");
			loadingEl.classList.add("flex-column");
			loadingEl.classList.add("bg-dark");
			loadingEl.classList.add("bg-opacity-25");
			loadingEl.innerHTML = `
				<span class="spinner-border text-primary" role="status"></span>
				<span class="text-gray-800 fs-6 fw-semibold mt-5">Loading...</span>
			`;
			$(document).ready(function() {
				window.setTimeout(function() {
					$(".alert-auto-dismissable").fadeTo(1000, 0).slideUp(1000, function() {
						$(this).remove();
					});
				}, 5000);
			});
			const Toast = Swal.mixin({
				toast: true,
				position: 'top-end',
				showConfirmButton: false,
				timer: 4000,
				timerProgressBar: false,
				didOpen: (toast) => {
					toast.addEventListener('mouseenter', Swal.stopTimer)
					toast.addEventListener('mouseleave', Swal.resumeTimer)
				}
			});
			@foreach (['error', 'warning', 'success', 'info'] as $msg)
				@if (Session::has($msg))
					Toast.fire({
						icon: '{{ $msg }}',
						title: "<span style='color:black'>{{ Session::get($msg) }}</span>",
					})
				@endif
			@endforeach
			
			function logoutAdmin(element) {
				Swal.fire({
					title: "Are you sure you want to Sign Out ?",
					icon: "warning",
					showCancelButton: true,
					confirmButtonText: "Yes, Sign Out it!",
					customClass: {
						confirmButton: 'btn btn-sm btn-success',
						cancelButton: 'btn btn-sm btn-danger',
					}
	
				}).then(function(result) {
	
					if (result.value) {
						event.preventDefault();
						document.getElementById(element).submit();
					}
	
	
				});
			};
		</script>
		@yield('pagewise_js')
		<!--end::Custom Javascript-->
		<!--end::Javascript-->

	</body>
	<!--end::Body-->

</html>