<header class="navigation fixed-top nav-bg">
	<div class="container">
		<nav class="navbar navbar-expand-lg navbar-white p-0">
			<a class="navbar-brand order-1 p-0" href="{{route('welcome')}}">
				<img class="img-fluid" width="100px" src="{{asset('logo/full-logo.png')}}" alt="">
			</a>
			<div class="collapse navbar-collapse order-lg-2 order-3 justify-content-end" id="navigation">
				@auth
				<ul class="navbar-nav ml-auto ">
					<li class="nav-item">
						<a class="nav-link" href="#">Following</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Membership</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="{{route('post.create')}}">Write</a>
					</li>
					<li class="nav-item dropup-center dropup">
						<button class="navbar-toggler" type="button" data-bs-toggle="dropdown"
							data-bs-target="#navbar-user" aria-controls="navbarNav" aria-expanded="false"
							aria-label="Toggle navigation">
						</button>
						<div class="collapse navbar-collapse" id="navbar-user">
							<ul class="navbar-nav">
								<li class="nav-item dropdown">
									<a class="nav-link p-3" href="javascript:void(0);" id="navbarDropdownMenuLink"
										role="button" data-bs-toggle="dropdown" aria-haspopup="true"
										aria-expanded="false">
										<img src="{{Auth::user()->profile_url}}" width="35" height="35"
											class="rounded-circle">
									</a>
									<div class="dropdown-menu dropdown-menu-right"
										aria-labelledby="navbarDropdownMenuLink">
										<a class="dropdown-item"
											href="{{route('user.edit.profile')}}">{{ __('Edit Profile') }}</a>
										<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
										                                                     document.getElementById('logout-form').submit();">
											{{ __('Logout') }}
										</a>

										<form id="logout-form" action="{{ route('logout') }}" method="POST"
											class="d-none">
											@csrf
										</form>
									</div>
								</li>
							</ul>
						</div>
					</li>
				</ul>
				@else
				<ul class="navbar-nav ml-auto ">
					<li class="nav-item">
						<a class="nav-link" href="#">Our story</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Membership</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="javascript:void(0);" data-bs-toggle="modal"
							data-bs-target="#loginModal">Sign In</a>
					</li>
					<li class="nav-item">
						<button class="btn btn-main btn-block nav-link text-white" href="javascript:void(0);"
							data-bs-toggle="modal" data-bs-target="#registerModal">Get
							started</button>
					</li>
				</ul>
				@endauth
			</div>
			<div class="order-2 order-lg-3 d-flex align-items-center">
				<button class="navbar-toggler border-0 order-1" type="button" data-bs-toggle="collapse"
					data-bs-target="#navigation">
					<i class="ti-menu"></i>
				</button>
			</div>
		</nav>
	</div>
</header>