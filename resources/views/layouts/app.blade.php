<!DOCTYPE html>

<html lang="en-us">

	<head>
		<meta charset="utf-8">
		<title>{{config('app.name')}} - {{$title ?? ''}}</title>

		<!-- mobile responsive meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

		<!-- CSRF Token -->
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<!-- plugins -->
		<link rel="stylesheet" href="{{asset('theme/plugins/bootstrap/bootstrap.min.css')}}">
		<link rel="stylesheet" href="{{asset('theme/plugins/themify-icons/themify-icons.css')}}">
		<link rel="stylesheet" href="{{asset('theme/plugins/fontawesome/css/all.min.css')}}">
		<link rel="stylesheet" href="{{asset('theme/plugins/sweetalert2/sweetalert2.min.css')}}">
		<link rel="stylesheet" href="{{asset('theme/plugins/slick/slick.css')}}">

		<!-- Main Stylesheet -->
		<link rel="stylesheet" href="{{asset('theme/css/style.css')}}">

		<!--Favicon-->
		<link rel="shortcut icon" href="{{asset('theme/images/favicon.png')}}" type="image/x-icon">
		<link rel="icon" href="{{asset('theme/images/favicon.png')}}" type="image/x-icon">
		@yield('pagewise_css')
	</head>

	<body>
		<!-- header -->
		<x-front.header></x-front.header>
		<!-- /header -->
		@yield('content')

		<!-- footer -->
		{{-- <x-front.footer></x-front.footer> --}}
		<!-- /footer -->
		@guest
		<x-front.modal.login></x-front.modal.login>
		<x-front.modal.forgot-password></x-front.modal.forgot-password>
		<x-front.modal.register></x-front.modal.register>
		@endguest
		@auth
		@if(Auth::user()->email_verified_at == '')
		<x-front.modal.user-add-topic></x-front.modal.user-add-topic>
		@endif
		@endauth
		<!-- JS Plugins -->
		<script src="{{asset('theme/plugins/jQuery/jquery.min.js')}}"></script>
		<script src="{{asset('theme/plugins/bootstrap/bootstrap.bundle.min.js')}}"></script>
		<script src="{{asset('theme/plugins/slick/slick.min.js')}}"></script>
		<script src="{{asset('theme/plugins/instafeed/instafeed.min.js')}}"></script>
		<script src="{{asset('theme/plugins/fontawesome/js/all.min.js')}}"></script>
		<script src="{{asset('theme/plugins/sweetalert2/sweetalert2.all.min.js')}}"></script>
		<!-- Main Script -->
		<script src="{{asset('theme/js/script.js')}}"></script>
		@yield('pagewise_js')
		<script>
			const csrfToken = "{{ csrf_token() }}";
			const routeResetPassword = "{{ route('password.email') }}";
			const routeLogin = "{{ route('login') }}";
			// A $( document ).ready() block.
			$( document ).ready(function() {
				@if(old('form_type') == 'login')
					$('#loginModal').modal('show');
				@endif
				@if(old('form_type') == 'register')
					$('#registerModal').modal('show');
				@endif
				@auth
					@if(Auth::user()->email_verified_at == '')
						const routeUserAddTopic = "{{ route('add.topic') }}";
						$('#topicAddModal').modal('show');
						var userTopicsAddAjax = null;
						$('#userTopicsAddBtn').click(function(){
							$("#userTopicsAddBtn").attr("disabled", true);
							$("[data-bs-target='#topicAddModal']").attr("disabled", true);
							$("#userTopicsAddBtn").html('<span class="spinner-grow spinner-grow-sm text-white" role="status" aria-hidden="true"></span>\
							<span class="text-white">Loading...</span>');
							const topics = [];
							var data = $('#userTopicsAddForm').serializeArray().reduce(function(obj, item) {
								topics.push(item.value);
								/* obj[item.name] = item.value;
								return obj; */
							}, {});
							userTopicsAddAjax = $.ajax({
								method: "POST",
								dataType: "json",
								url: routeUserAddTopic,
								data: {
									topics: topics,
									_token: csrfToken,
								},
								beforeSend: function () {
									if (userTopicsAddAjax != null) {
										userTopicsAddAjax.abort();
									}
								},
								success: function (resultData) {
									$('#topicAddModal').modal('hide');
									Toast.fire({
										icon: "success",
										title:
											"<span style='color:black'>" +
											resultData.message +
											"</span>",
									});
									$("#userTopicsAddBtn").html('Submit');
									$("#userTopicsAddBtn").attr("disabled", false);
									$("[data-bs-target='#topicAddModal']").attr("disabled", false);
								},
								error: function(resultData) {
									Toast.fire({
									icon: "error",
									title:
									"<span style='color:black'>" +
										resultData.responseJSON.message +
										"</span>",
									});
									$("#userTopicsAddBtn").html('Submit');
									$("#userTopicsAddBtn").attr("disabled", false);
									$("[data-bs-target='#topicAddModal']").attr("disabled", false);
								}
							});
						});
					@endif
				@endauth
				// Fetch all the forms we want to apply custom Bootstrap validation styles to
				var forms = document.querySelectorAll('.needs-validation')

				// Loop over them and prevent submission
				Array.prototype.slice.call(forms)
					.forEach(function (form) {
					form.addEventListener('submit', function (event) {
						if (!form.checkValidity()) {
						event.preventDefault()
						event.stopPropagation()
						}

						form.classList.add('was-validated')
					}, false)
				})
				var resetPasswordAjax = null;
				$('#resetPasswordBtn').click(function(){
					$("#resetPasswordBtn").attr("disabled", true);
					$("#resetPasswordEmail").attr("readonly", true);
					$("[data-bs-target='#loginModal']").attr("disabled", true);
					$("#resetPasswordBtn").html('<span class="spinner-grow spinner-grow-sm text-white" role="status" aria-hidden="true"></span>\
					<span class="text-white">Loading...</span>');
					var data = $('#resetPasswordForm').serializeArray().reduce(function(obj, item) {
						obj[item.name] = item.value;
						return obj;
					}, {});
					resetPasswordAjax = $.ajax({
						method: "POST",
						dataType: "json",
						url: routeResetPassword,
						data: {
							email: data.resetPasswordEmail,
							_token: csrfToken,
						},
						beforeSend: function () {
							if (resetPasswordAjax != null) {
								resetPasswordAjax.abort();
							}
						},
						success: function (resultData) {
							$('#resetPasswordForm').trigger("reset");
							$('#forgotPasswordModal').modal('hide');
							Toast.fire({
								icon: "success",
								title:
									"<span style='color:black'>" +
									resultData.message +
									"</span>",
							});
							$("#resetPasswordBtn").attr("disabled", false);
							$("#resetPasswordEmail").attr("readonly", false);
							$("[data-bs-target='#loginModal']").attr("disabled", false);
							$("#resetPasswordBtn").html('Send Password Reset Link');
						},
						error: function(resultData) {
							$('#resetPasswordEmail').addClass('is-invalid');
							Toast.fire({
							icon: "error",
							title:
							"<span style='color:black'>" +
								resultData.responseJSON.message +
								"</span>",
							});
							$("#resetPasswordBtn").attr("disabled", false);
							$("#resetPasswordEmail").attr("readonly", false);
							$("[data-bs-target='#loginModal']").attr("disabled", false);
							$("#resetPasswordBtn").html('Send Password Reset Link');
						}
					});
				});

				/* var loginAjax = null;
				$('#loginBtn').click(function(){
					$("#loginBtn").attr("disabled", true);
					$("#resetPasswordEmail").attr("readonly", true);
					$("[data-bs-target='#loginModal']").attr("disabled", true);
					$("#loginBtn").html('<span class="spinner-grow spinner-grow-sm text-white" role="status" aria-hidden="true"></span>\
					<span class="text-white">Loading...</span>');
					var data = $('#loginForm').serializeArray().reduce(function(obj, item) {
						obj[item.name] = item.value;
						return obj;
					}, {});
					console.log(data);
					loginAjax = $.ajax({
						method: "POST",
						dataType: "json",
						url: routeLogin,
						data: {
							email: data.email,
							password: data.password,
							_token: csrfToken,
						},
						beforeSend: function () {
							if (loginAjax != null) {
								loginAjax.abort();
							}
						},
						success: function (resultData) {
							$('#loginForm').trigger("reset");
							$('#loginModal').modal('hide');
							Toast.fire({
								icon: "success",
								title: "Login success",
							});
							$("#loginBtn").attr("disabled", false);
							$("[data-bs-target='#loginModal']").attr("disabled", false);
							$("#loginBtn").html('Login');
						},
						error: function(resultData) {
							$('#resetPasswordEmail').addClass('is-invalid');
							Toast.fire({
							icon: "error",
							title:
							"<span style='color:black'>" +
								resultData.responseJSON.message +
								"</span>",
							});
							$("#loginBtn").attr("disabled", false);
							$("[data-bs-target='#loginModal']").attr("disabled", false);
							$("#loginBtn").html('Login');
						}
					});
				}); */

				$('#forgotPasswordModal').on('hidden.bs.modal', function (e) {
					$('#resetPasswordForm').trigger("reset");
					$('#resetPasswordEmail').removeClass('is-invalid');
				})

				$('#loginModal').on('hidden.bs.modal', function (e) {
					$('#loginForm').trigger("reset");
					$('#email').removeClass('is-invalid');
					$('#password').removeClass('is-invalid');
					$('#email').val('');
					$('#password').val('');
				})

				$('#registerModal').on('hidden.bs.modal', function (e) {
					$('#registerForm').trigger("reset");
					$('#first_name').removeClass('is-invalid');
					$('#last_name').removeClass('is-invalid');
					$('#email').removeClass('is-invalid');
					$('#password').removeClass('is-invalid');
					$('#first_name').val('');
					$('#last_name').val('');
					$('#email').val('');
					$('#password').val('');
				})
				
			}).on('blur keydown', '#resetPasswordEmail', function() {
				$('#resetPasswordEmail').removeClass('is-invalid');
			});
			$(".togglePassword").click(function (e) {
				e.preventDefault();
				var type = $(this).parent().find("input").attr("type");
				if(type == "password"){
					$(this).find( "svg" ).toggleClass("fa-eye")
					$(this).parent().find("input").attr("type","text");
				}else if(type == "text"){
					$(this).find( "svg" ).toggleClass("fa-eye	")
					$(this).parent().find("input").attr("type","password");
				}
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
			@foreach (['error', 'warning', 'success', 'info', 'status'] as $msg)
				@if (Session::has($msg))
					@if($msg == 'status')
						var icon = 'success';
					@else
						var icon = '{{ $msg }}';
					@endif
					Toast.fire({
						icon: icon,
						title: "<span style='color:black'>{{ Session::get($msg) }}</span>",
					})
				@endif
			@endforeach
		</script>
	</body>

</html>