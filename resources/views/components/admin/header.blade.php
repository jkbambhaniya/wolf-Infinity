<div id="kt_header" class="header ">
	<!--begin::Container-->
	<div class="container-fluid d-flex flex-stack">
		<!--begin::Brand-->
		<div class="d-flex align-items-center me-5">
			<!--begin::Aside toggle-->
			<div class="d-lg-none btn btn-icon btn-active-color-white w-30px h-30px ms-n2 me-3" id="kt_aside_toggle">
				<i class="ki-duotone ki-abstract-14 fs-2"><span class="path1"></span><span class="path2"></span></i>
			</div>
			<!--end::Aside  toggle-->

			<!--begin::Logo-->
			<a href="{{route('admin.dashboard')}}">
				@if($siteSetting['site_logo'] && Storage::exists($siteSetting['site_logo']))
				<img alt="Logo" src="{{ Storage::url($siteSetting['site_logo']) }}" class="h-50px h-lg-50px" />
				@else
				<img alt="Logo" src="{{asset('admin-assets/media/logos/custom-2.svg')}}" class="h-50px h-lg-50px" />
				@endif
			</a>
			<!--end::Logo-->
		</div>
		<!--end::Brand-->

		<!--begin::Topbar-->
		<div class="d-flex align-items-center flex-shrink-0">

			<!--begin::Chat-->
			<div class="d-flex align-items-center ms-1">
				<!--begin::Menu wrapper-->
				<div class="btn btn-icon btn-color-white bg-hover-white bg-hover-opacity-10 w-30px h-30px h-40px w-40px position-relative"
					id="kt_drawer_chat_toggle" data-kt-drawer-show="true" data-kt-drawer-target="#kt_drawer_chat">
					<i class="ki-duotone ki-message-text-2 fs-1"><span class="path1"></span><span
							class="path2"></span><span class="path3"></span></i>
					<!--begin::Animation notification-->
					<span
						class="bullet bullet-dot bg-success h-6px w-6px position-absolute translate-middle top-0 start-50 animation-blink">
					</span>
					<!--begin::Animation notification-->
				</div>
				<!--end::Menu wrapper-->
			</div>
			<!--end::Chat-->

			<!--begin::Theme mode-->
			<div class="d-flex align-items-center ms-1">

				<!--begin::Menu toggle-->
				<a href="#"
					class="btn btn-icon btn-color-white bg-hover-white bg-hover-opacity-10 w-30px h-30px h-40px w-40px"
					data-kt-menu-trigger="{default:'click', lg: 'hover'}" data-kt-menu-attach="parent"
					data-kt-menu-placement="bottom-end">
					<i class="ki-duotone ki-night-day theme-light-show fs-1"><span class="path1"></span><span
							class="path2"></span><span class="path3"></span><span class="path4"></span><span
							class="path5"></span><span class="path6"></span><span class="path7"></span><span
							class="path8"></span><span class="path9"></span><span class="path10"></span></i> <i
						class="ki-duotone ki-moon theme-dark-show fs-1"><span class="path1"></span><span
							class="path2"></span></i></a>
				<!--begin::Menu toggle-->

				<!--begin::Menu-->
				<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-title-gray-700 menu-icon-gray-500 menu-active-bg menu-state-color fw-semibold py-4 fs-base w-150px"
					data-kt-menu="true" data-kt-element="theme-mode-menu">
					<!--begin::Menu item-->
					<div class="menu-item px-3 my-0">
						<a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="light">
							<span class="menu-icon" data-kt-element="icon">
								<i class="ki-duotone ki-night-day fs-2"><span class="path1"></span><span
										class="path2"></span><span class="path3"></span><span class="path4"></span><span
										class="path5"></span><span class="path6"></span><span class="path7"></span><span
										class="path8"></span><span class="path9"></span><span class="path10"></span></i>
							</span>
							<span class="menu-title">
								Light
							</span>
						</a>
					</div>
					<!--end::Menu item-->

					<!--begin::Menu item-->
					<div class="menu-item px-3 my-0">
						<a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="dark">
							<span class="menu-icon" data-kt-element="icon">
								<i class="ki-duotone ki-moon fs-2"><span class="path1"></span><span
										class="path2"></span></i> </span>
							<span class="menu-title">
								Dark
							</span>
						</a>
					</div>
					<!--end::Menu item-->

					<!--begin::Menu item-->
					<div class="menu-item px-3 my-0">
						<a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="system">
							<span class="menu-icon" data-kt-element="icon">
								<i class="ki-duotone ki-screen fs-2"><span class="path1"></span><span
										class="path2"></span><span class="path3"></span><span class="path4"></span></i>
							</span>
							<span class="menu-title">
								System
							</span>
						</a>
					</div>
					<!--end::Menu item-->
				</div>
				<!--end::Menu-->

			</div>
			<!--end::Theme mode-->

			<!--begin::User-->
			<div class="d-flex align-items-center ms-1" id="kt_header_user_menu_toggle">
				<!--begin::User info-->
				<div class="btn btn-flex align-items-center bg-hover-white bg-hover-opacity-10 py-2 px-2 px-md-3"
					data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">

					<!--begin::Name-->
					<div class="d-none d-md-flex flex-column align-items-end justify-content-center me-2 me-md-4">
						<span class="text-muted fs-8 fw-semibold lh-1 mb-1">{{Auth::guard('admin')->user()->first_name}}
							{{Auth::guard('admin')->user()->last_name}}</span>
						<span class="text-white fs-8 fw-bold lh-1">Admin</span>
					</div>
					<!--end::Name-->

					<!--begin::Symbol-->
					<div class="symbol symbol-30px symbol-md-40px">
						<img src="{{Auth::guard('admin')->user()->profile_url}}" alt="image" />
					</div>
					<!--end::Symbol-->
				</div>
				<!--end::User info-->


				<!--begin::User account menu-->
				<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px"
					data-kt-menu="true">
					<!--begin::Menu item-->
					<div class="menu-item px-3">
						<div class="menu-content d-flex align-items-center px-3">
							<!--begin::Avatar-->
							<div class="symbol symbol-50px me-5">
								<img alt="Logo" src="{{Auth::guard('admin')->user()->profile_url}}" />
							</div>
							<!--end::Avatar-->

							<!--begin::Username-->
							<div class="d-flex flex-column">
								<div class="fw-bold d-flex align-items-center fs-5">
									{{Auth::guard('admin')->user()->first_name}}
									{{Auth::guard('admin')->user()->last_name}}<span
										class="badge badge-light-success fw-bold fs-8 px-2 py-1 ms-2">Pro</span>
								</div>

								<a href="mailto:{{Auth::guard('admin')->user()->email}}"
									class="fw-semibold text-muted text-hover-dark fs-7">
									{{Auth::guard('admin')->user()->email}} </a>
							</div>
							<!--end::Username-->
						</div>
					</div>
					<!--end::Menu item-->

					<!--begin::Menu separator-->
					<div class="separator my-2"></div>
					<!--end::Menu separator-->

					<!--begin::Menu item-->
					<div class="menu-item px-5">
						<a href="{{route('admin.show.profile')}}" class="menu-link px-5">
							{{ __('header.my_profile') }}
						</a>
					</div>
					<!--end::Menu item-->

					<!--begin::Menu item-->
					<div class="menu-item px-5">
						<a href="{{route('admin.site.setting.create')}}" class="menu-link px-5">
							{{ __('header.setting') }}
						</a>
					</div>
					<!--end::Menu item-->
					<div class="menu-item px-5" data-kt-menu-trigger="{default: 'click', lg: 'hover'}"
						data-kt-menu-placement="left-start" data-kt-menu-offset="-15px, 0">
						<a href="#" class="menu-link px-5">
							<span class="menu-title position-relative">
								{{ __('header.language') }}
								@if(App::currentLocale() == 'en')
								<span
									class="fs-8 rounded bg-light px-3 py-2 position-absolute translate-middle-y top-50 end-0">
									{{ __('messages.language.english') }} <img class="w-15px h-15px rounded-1 ms-2"
										src="{{asset('admin-assets/media/flags/united-states.svg')}}" alt="">
								</span>
								@else
								<span
									class="fs-8 rounded bg-light px-3 py-2 position-absolute translate-middle-y top-50 end-0">
									{{ __('messages.language.gujarati') }} <img class="w-15px h-15px rounded-1 ms-2"
										src="{{asset('admin-assets/media/flags/india.svg')}}" alt="">
								</span>
								@endif
							</span>
						</a>

						<!--begin::Menu sub-->
						<div class="menu-sub menu-sub-dropdown w-175px py-4" style="">
							<!--begin::Menu item-->
							<div class="menu-item px-3">
								<a href="{{route('language.change', ['locale' => 'en'])}}"
									class="menu-link d-flex px-5 @if(App::isLocale('en') ) active @endif">
									<span class="symbol symbol-20px me-4">
										<img class="rounded-1"
											src="{{asset('admin-assets/media/flags/united-states.svg')}}" alt="">
									</span>
									{{ __('messages.language.english') }}
								</a>
							</div>
							<!--end::Menu item-->

							<!--begin::Menu item-->
							<div class="menu-item px-3">
								<a href="{{route('language.change', ['locale' => 'gu'])}}"
									class="menu-link d-flex px-5 @if(App::isLocale('gu')) active @endif">
									<span class="symbol symbol-20px me-4">
										<img class="rounded-1" src="{{asset('admin-assets/media/flags/india.svg')}}"
											alt="">
									</span>
									{{ __('messages.language.gujarati') }}
								</a>
							</div>
							<!--end::Menu item-->
						</div>
						<!--end::Menu sub-->
					</div>

					<!--begin::Menu item-->
					<div class="menu-item px-5">
						<a href="javascript:void(0)" onclick="logoutAdmin('logout-form-header');"
							class="menu-link px-5">
							{{ __('header.sing_out') }}
						</a>
						<form id="logout-form-header" action="{{ route('admin.logout') }}" method="POST" class="d-none">
							@csrf
						</form>
					</div>
					<!--end::Menu item-->
				</div>
				<!--end::User account menu-->
			</div>
			<!--end::User -->
		</div>
		<!--end::Topbar-->
	</div>
	<!--end::Container-->
</div>