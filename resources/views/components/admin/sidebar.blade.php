<div id="kt_aside" class="aside card" data-kt-drawer="true" data-kt-drawer-name="aside"
	data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
	data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start"
	data-kt-drawer-toggle="#kt_aside_toggle">
	<!--begin::Aside menu-->
	<div class="aside-menu flex-column-fluid px-4">
		<!--begin::Aside Menu-->

		<div class="hover-scroll-overlay-y my-5 pe-4 me-n4" id="kt_aside_menu_wrapper" data-kt-scroll="true"
			data-kt-scroll-activate="true" data-kt-scroll-height="auto"
			data-kt-scroll-dependencies="{default: '#kt_aside_footer', lg: '#kt_header, #kt_aside_footer'}"
			data-kt-scroll-wrappers="#kt_aside, #kt_aside_menu" data-kt-scroll-offset="{default: '5px', lg: '75px'}">
			<!--begin::Menu-->
			<div class="menu menu-column menu-rounded menu-sub-indention fw-semibold fs-6" id="#kt_aside_menu"
				data-kt-menu="true">
				<!--begin:Menu item-->
				<div class="menu-item">
					<!--begin:Menu link-->
					<a class="menu-link {{ Request::routeIs('admin.dashboard') ? 'active' : '' }}"
						href="{{ route('admin.dashboard') }}">
						<span class="menu-icon">
							<i class="ki-duotone ki-element-11 fs-2">
								<i class="path1"></i>
								<i class="path2"></i>
								<i class="path3"></i>
								<i class="path4"></i>
							</i>
						</span>
						<span class="menu-title">{{ __('sidebar.dashboard') }}</span>
					</a>
					<!--end:Menu link-->
				</div>
				<!--end:Menu item-->
				<!--begin:Menu item-->
				<div class="menu-item pt-5">
					<!--begin:Menu content-->
					<div class="menu-content"><span
							class="menu-heading fw-bold text-uppercase fs-7">{{ __('sidebar.pages') }}</span></div>
					<!--end:Menu content-->
				</div>
				<!--end:Menu item-->
				<!--begin:Menu item-->
				<div data-kt-menu-trigger="click"
					class="menu-item menu-accordion {{ Request::routeIs('admin.user.*') ? 'hover show' : '' }}">
					<!--begin:Menu link-->
					<span class="menu-link">
						<span class="menu-icon">
							<i class="ki-duotone ki-profile-user fs-2">
								<i class="path1"></i>
								<i class="path2"></i>
								<i class="path3"></i>
								<i class="path4"></i>
							</i>
						</span>
						<span class="menu-title">{{ __('sidebar.users') }}</span>
						<span class="menu-arrow"></span>
					</span>
					<!--end:Menu link-->
					<!--begin:Menu sub-->
					<div class="menu-sub menu-sub-accordion">
						<!--begin:Menu item-->
						<div class="menu-item">
							<!--begin:Menu link-->
							<a class="menu-link {{ Request::routeIs('admin.user.index') ? 'active' : '' }}"
								href="{{route('admin.user.index')}}">
								<span class="menu-bullet">
									<span class="bullet bullet-dot"></span>
								</span><span class="menu-title">{{ __('sidebar.list') }}</span>
							</a>
							<!--end:Menu link-->
						</div>
						<!--end:Menu item-->
						<!--begin:Menu item-->
						<div class="menu-item">
							<!--begin:Menu link-->
							<a class="menu-link {{ Request::routeIs('admin.user.create') ? 'active' : '' }}"
								href="{{route('admin.user.create')}}">
								<span class="menu-bullet">
									<span class="bullet bullet-dot"></span>
								</span><span class="menu-title">{{ __('sidebar.create') }}</span>
							</a>
							<!--end:Menu link-->
						</div>
						<!--end:Menu item-->
					</div>
					<!--end:Menu sub-->
				</div>
				<!--end:Menu item-->

				<!--begin:Menu item-->
				<div class="menu-item">
					<!--begin:Menu link-->
					<a class="menu-link {{ Request::routeIs('admin.topic.*') ? 'active' : '' }}"
						href="{{ route('admin.topic.index') }}">
						<span class="menu-icon">
							<i class="ki-duotone ki-note-2 fs-2">
								<i class="path1"></i>
								<i class="path2"></i>
								<i class="path3"></i>
								<i class="path4"></i>
							</i>
						</span>
						<span class="menu-title">{{ __('sidebar.topic') }}</span>
					</a>
					<!--end:Menu link-->
				</div>
				<!--end:Menu item-->

				<!--begin:Menu item-->
				<div class="menu-item">
					<!--begin:Menu link-->
					<a class="menu-link {{ Request::routeIs('admin.cms.*') ? 'active' : '' }}"
						href="{{ route('admin.cms.index') }}">
						<span class="menu-icon">
							<i class="ki-duotone ki-questionnaire-tablet fs-2">
								<i class="path1"></i>
								<i class="path2"></i>
							</i>
						</span>
						<span class="menu-title">{{ __('sidebar.cms_page') }}</span>
					</a>
					<!--end:Menu link-->
				</div>
				<!--end:Menu item-->
			</div>
			<!--end::Menu-->
		</div>
	</div>
	<!--end::Aside menu-->

	<!--begin::Footer-->
	<div class="aside-footer flex-column-auto pt-5 pb-7 px-7" id="kt_aside_footer">
		<a href="javascript:void(0)" onclick="logoutAdmin('logout-form-sidebar');"
			class="btn btn-bg-light btn-color-gray-500 btn-active-color-gray-900 text-nowrap w-100">
			<span class="btn-label">
				Sign Out
			</span>
			<i class="ki-duotone ki-exit-left btn-icon fs-1">
				<i class="path1"></i>
				<i class="path2"></i>
			</i>
		</a>
		<form id="logout-form-sidebar" action="{{ route('admin.logout') }}" method="POST" class="d-none">
			@csrf
		</form>
	</div>
	<!--end::Footer-->
</div>