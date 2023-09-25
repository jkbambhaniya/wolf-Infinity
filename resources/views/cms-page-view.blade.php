<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
	<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

	<head>
		<title>Metronic - The World's #1 Selling Bootstrap Admin Template by Keenthemes</title>
		<meta charset="utf-8" />
		<link rel="shortcut icon" href="{{ asset('admin-assets/media/logos/favicon.ico')}}" />

		<!--begin::Fonts(mandatory for all pages)-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
		<!--end::Fonts-->



		<!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
		<link href="{{ asset('admin-assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('admin-assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
		<!--end::Global Stylesheets Bundle-->
	</head>
	<!--end::Head-->

	<!--begin::Body-->

	<body id="kt_body" data-bs-spy="scroll" data-bs-target="#kt_landing_menu" class="bg-white position-relative">
		<!--begin::Theme mode setup on page load-->
		<script>
			var defaultThemeMode = "light";
			var themeMode;

			if (document.documentElement) {
				if (document.documentElement.hasAttribute("data-bs-theme-mode")) {
					themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
				} else {
					if (localStorage.getItem("data-bs-theme") !== null) {
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

			<!--begin::Projects Section-->
			<div class="mb-lg-n15 position-relative z-index-2">
				<div class="content flex-column-fluid" id="kt_content">
					<!--begin::About card-->
					<div class="card">
						<!--begin::Body-->
						<div class="card-body p-lg-17">
							<!--begin::About-->
							<div class="mb-18">
								<!--begin::Wrapper-->
								<div class="mb-10">
									@if ($cms)
									<!--begin::Top-->
									<div class="text-center mb-15">
										<!--begin::Title-->
										<h3 class="fs-2hx text-dark mb-5">{{ $cms->name }}</h3>
										<!--end::Title-->

										<!--begin::Text-->
										<div class="fs-5 text-muted fw-semibold">
											{!! $cms->description !!}
										</div>
										<!--end::Text-->
									</div>
									<!--end::Top-->
									@endif
								</div>
								<!--end::Wrapper-->
							</div>
							<!--end::About-->
						</div>
						<!--end::Body-->
					</div>
					<!--end::About card-->

				</div>
			</div>
			<!--end::Projects Section-->

		</div>
		<!--end::Root-->
		<!--end::Main-->
		<!--begin::Javascript-->
		<script>
			var hostUrl = "assets/index.html";        
		</script>

		<!--begin::Global Javascript Bundle(mandatory for all pages)-->
		<script src="{{ asset('admin-assets/plugins/global/plugins.bundle.js')}}"></script>
		<script src="{{ asset('admin-assets/js/scripts.bundle.js')}}"></script>
		<!--end::Global Javascript Bundle-->

		<!--begin::Vendors Javascript(used for this page only)-->
		<script src="{{ asset('admin-assets/plugins/custom/fslightbox/fslightbox.bundle.js')}}"></script>
		<script src="{{ asset('admin-assets/plugins/custom/typedjs/typedjs.bundle.js')}}"></script>
		<!--end::Vendors Javascript-->

		<!--begin::Custom Javascript(used for this page only)-->
		<script src="{{ asset('admin-assets/js/custom/landing.js')}}"></script>
		<script src="{{ asset('admin-assets/js/custom/pages/pricing/general.js')}}"></script>
		<!--end::Custom Javascript-->
		<!--end::Javascript-->

	</body>
	<!--end::Body-->

	<!-- Mirrored from preview.keenthemes.com/metronic8/demo14/landing.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 13 Apr 2023 07:05:41 GMT -->

</html>