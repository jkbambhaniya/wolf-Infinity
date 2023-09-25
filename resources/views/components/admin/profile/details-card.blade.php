<!--begin::Navbar-->
<div class="card mb-5 mb-xl-10">
	<div class="card-body pt-9 pb-0">
		<!--begin::Details-->
		<div class="d-flex flex-wrap flex-sm-nowrap mb-3">
			<!--begin: Pic-->
			<div class="me-7 mb-4">
				<div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
					<img src="{{ $admin->profile_url }}" alt="image" />

					<div
						class="position-absolute translate-middle bottom-0 start-100 mb-6 bg-success rounded-circle border border-4 border-body h-20px w-20px">
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
								class="text-gray-900 text-hover-primary fs-2 fw-bold me-1">{{ $admin->full_name }}</a>
						</div>
						<!--end::Name-->
						<!--begin::Info-->
						<div class="d-flex flex-wrap fw-semibold fs-6 mb-4 pe-2">
							<a href="mailto:{{ $admin->email }}"
								class="d-flex align-items-center text-gray-400 text-hover-primary mb-2 me-5">
								<!--begin::Svg Icon | path: icons/duotune/communication/com011.svg-->
								<span class="svg-icon svg-icon-4 me-1">
									<svg width="24" height="24" viewBox="0 0 24 24" fill="none"
										xmlns="http://www.w3.org/2000/svg">
										<path opacity="0.3"
											d="M21 19H3C2.4 19 2 18.6 2 18V6C2 5.4 2.4 5 3 5H21C21.6 5 22 5.4 22 6V18C22 18.6 21.6 19 21 19Z"
											fill="currentColor" />
										<path
											d="M21 5H2.99999C2.69999 5 2.49999 5.10005 2.29999 5.30005L11.2 13.3C11.7 13.7 12.4 13.7 12.8 13.3L21.7 5.30005C21.5 5.10005 21.3 5 21 5Z"
											fill="currentColor" />
									</svg>
								</span>
								<!--end::Svg Icon-->{{ $admin->email }}
							</a>
							@if ($admin->phone)
							<a href="tel:{{ $admin->phone }}"
								class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
								<!--begin::Svg Icon | path: icons/duotune/communication/com011.svg-->
								<span class="svg-icon svg-icon-6 me-1">
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
										class="bi bi-telephone" viewBox="0 0 16 16">
										<path
											d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
									</svg>
								</span>
								<!--end::Svg Icon-->{{ $admin->phone }}
							</a>
							@endif
							@if ($admin->address)
							<a href="javascript:void(0);"
								class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
								<!--begin::Svg Icon | path: icons/duotune/general/gen018.svg-->
								<span class="svg-icon svg-icon-4 me-1">
									<svg width="24" height="24" viewBox="0 0 24 24" fill="none"
										xmlns="http://www.w3.org/2000/svg">
										<path opacity="0.3"
											d="M18.0624 15.3453L13.1624 20.7453C12.5624 21.4453 11.5624 21.4453 10.9624 20.7453L6.06242 15.3453C4.56242 13.6453 3.76242 11.4453 4.06242 8.94534C4.56242 5.34534 7.46242 2.44534 11.0624 2.04534C15.8624 1.54534 19.9624 5.24534 19.9624 9.94534C20.0624 12.0453 19.2624 13.9453 18.0624 15.3453Z"
											fill="currentColor" />
										<path
											d="M12.0624 13.0453C13.7193 13.0453 15.0624 11.7022 15.0624 10.0453C15.0624 8.38849 13.7193 7.04535 12.0624 7.04535C10.4056 7.04535 9.06241 8.38849 9.06241 10.0453C9.06241 11.7022 10.4056 13.0453 12.0624 13.0453Z"
											fill="currentColor" />
									</svg>
								</span>
								<!--end::Svg Icon-->{{ Str::limit($admin->address, 40, ' ...') }}
							</a>
							@endif
						</div>
						<!--end::Info-->
					</div>
					<!--end::User-->
				</div>
				<!--end::Title-->
			</div>
			<!--end::Info-->
		</div>

		<!--begin::Navs-->
		<ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bold">
			<!--begin::Nav item-->
			<li class="nav-item mt-2">
				<a class="nav-link text-active-dark ms-0 me-10 py-5 {{ Request::routeIs('admin.show.profile') ? 'active' : '' }}"
					href="{{ route('admin.show.profile') }}">Overview</a>
			</li>
			<!--end::Nav item-->
			<!--begin::Nav item-->
			<li class="nav-item mt-2">
				<a class="nav-link text-active-dark ms-0 me-10 py-5 {{ Request::routeIs('admin.edit.profile') ? 'active' : '' }}"
					href="{{ route('admin.edit.profile') }}">Profile Edit</a>
			</li>
			<!--end::Nav item-->
			<!--begin::Nav item-->
			<li class="nav-item mt-2">
				<a class="nav-link text-active-dark ms-0 me-10 py-5 {{ Request::routeIs('admin.change.password.view') ? 'active' : '' }}"
					href="{{ route('admin.change.password.view') }}">Change Password</a>
			</li>
			<!--end::Nav item-->
		</ul>
		<!--begin::Navs-->
	</div>
</div>
<!--end::Navbar-->