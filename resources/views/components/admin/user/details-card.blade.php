<!--begin::Navbar-->
<div class="card mb-5 mb-xl-10">
	<div class="card-body pt-9 pb-0">
		<!--begin::Details-->
		<div class="d-flex flex-wrap flex-sm-nowrap mb-3">
			<!--begin: Pic-->
			<div class="me-7 mb-4">
				<div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
					<img src="{{ $user->profile_url }}" alt="image" />
					<div
						class="position-absolute translate-middle bottom-0 start-100 mb-6 @if($user->status == 1) bg-success @else bg-danger @endif rounded-circle border border-4 border-body h-20px w-20px">
					</div>
				</div>
			</div>
			<!--end::Pic-->
			<!--begin::Info-->
			<div class="flex-grow-1">
				<!--begin::Title-->
				<div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
					<!--begin::User-->
					<div class="d-flex flex-column">
						<!--begin::Name-->
						<div class="d-flex align-items-center mb-2">
							<a href="javascript:viod(0);"
								class="text-gray-800 text-hover-primary fs-2 fw-bold me-1">{{ $user->full_name }}</a>
						</div>
						<!--end::Name-->
						<!--begin::Info-->
						<div class="d-flex flex-wrap fw-semibold fs-6 mb-4 pe-2">
							<a href="mailto:{{ $user->email }}"
								class="d-flex align-items-center text-gray-400 text-hover-primary mb-2 me-5">
								<i class="ki-duotone ki-sms fs-1 me-1">
									<i class="path1"></i>
									<i class="path2"></i>
								</i>
								{{ $user->email }}
							</a>
							@if ($user->phone)
							<a href="https://api.whatsapp.com/send?phone={{ str_replace('+', '',str_replace(' ', '', $user->phone)) }}"
								class="d-flex align-items-center text-gray-400 text-hover-success mb-2">
								<i class="ki-duotone ki-whatsapp fs-2 me-1">
									<i class="path1"></i>
									<i class="path2"></i>
								</i>
							</a>
							<a href="tel:{{str_replace('+', '',str_replace(' ', '', $user->phone)) }}"
								class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
								{{ $user->phone }}
							</a>
							@endif
							@if ($user->address)
							<a href="http://maps.google.com/maps?z=12&t=m&q=loc:{{ $user->latitude }}+{{ $user->longitude }}"
								target="_blank"
								class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
								<i class="ki-duotone ki-geolocation-home fs-1 me-1">
									<i class="path1"></i>
									<i class="path2"></i>
								</i>
								{{ Str::limit($user->address, 40, ' ...') }}
							</a>
							@endif
						</div>
						<!--end::Info-->
					</div>
					<!--end::User-->
					<!--begin::Actions-->
					<div class="d-flex my-4">
						<a href="{{route('admin.user.index')}}" class="btn btn-sm btn-light me-2 text-hover-primary">
							<i class="ki-duotone ki-double-left fs-3">
								<i class="path1"></i>
								<i class="path2"></i>
							</i>
							<!--begin::Indicator label-->
							<span class="indicator-label">
								Back</span>
							<!--end::Indicator label-->
						</a>
					</div>
					<!--end::Actions-->
				</div>
				<!--end::Title-->
			</div>
			<!--end::Info-->
		</div>

		<!--begin::Navs-->
		<ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bold">
			<!--begin::Nav item-->
			<li class="nav-item mt-2">
				<a class="nav-link text-active-dark ms-0 me-10 py-5 {{ Request::routeIs('admin.user.show') ? 'active' : '' }}"
					href="{{ route('admin.user.show',$user->id) }}">Overview</a>
			</li>
			<!--end::Nav item-->
		</ul>
		<!--begin::Navs-->
	</div>
</div>
<!--end::Navbar-->