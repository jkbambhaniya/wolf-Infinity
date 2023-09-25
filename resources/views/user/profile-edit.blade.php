@extends('layouts.app')
@section('content')
<section class="section-sm mt-0">
	<div class="container">
		<div class="row justify-content-center mt-5 max-vh-100">
			<aside class="col-lg-4 right-0 ">
				@auth
				<!-- about me -->
				<div class="widget widget-about">
					<h4 class="widget-title">Hi, {{Auth::user()->full_name}}</h4>
					<img class="img-fluid" src="{{Auth::user()->profile_url}}" alt="Themefisher">
					<p>{{Auth::user()->bio}}</p>
					<ul class="list-inline social-icons mb-3">

						<li class="list-inline-item"><a href="#"><i class="ti-facebook"></i></a></li>

						<li class="list-inline-item"><a href="#"><i class="ti-twitter-alt"></i></a></li>

						<li class="list-inline-item"><a href="#"><i class="ti-linkedin"></i></a></li>

						<li class="list-inline-item"><a href="#"><i class="ti-github"></i></a></li>

						<li class="list-inline-item"><a href="#"><i class="ti-youtube"></i></a></li>

					</ul>
				</div>
				@endauth
				<!-- tags -->
				<div class="widget">
					<h4 class="widget-title"><span>Topics</span></h4>
					<ul class="list-inline widget-list-inline widget-card" id="widget_topics_card">
						@if($user->topics)
						@foreach($user->topics as $topic)
						<li class="list-inline-item"><a href="tags.html">{{$topic->name}}</a></li>
						@endforeach
						@endif
					</ul>
					<div class="d-grid gap-2">
						<button class="btn btn-main" type="button" data-bs-toggle="modal"
							data-bs-target="#topicUpdateModal">{{ __('Add More Topics') }}</button>
					</div>
				</div>
			</aside>
			<div class="col-lg-8 mb-5 mb-lg-0">
				<ul class="nav nav-tabs shadow bg-white" id="myTab" role="tablist">
					<li class="nav-item" role="presentation">
						<button
							class="nav-link @if(old('form_type') == 'edit_profile') active @endif @if(!old('form_type')) active @endif"
							id="edit-profile-tab" data-bs-toggle="tab" data-bs-target="#edit-profile" type="button"
							role="tab" aria-controls="edit-profile" aria-selected="true">edit profile</button>
					</li>
					<li class="nav-item" role="presentation">
						<button class="nav-link @if(old('form_type') == 'change_password') active @endif"
							id="change-password-tab" data-bs-toggle="tab" data-bs-target="#change-password"
							type="button" role="tab" aria-controls="change-password" aria-selected="false">Change
							Password</button>
					</li>
				</ul>
				<div class="tab-content mt-4 h-25 " id="myTabContent">
					<div class="tab-pane fade @if(old('form_type') == 'edit_profile') show active @endif @if(!old('form_type')) show active @endif"
						id="edit-profile" role="tabpanel" aria-labelledby="edit-profile-tab">
						<article class="card mb-4">
							<div class="card-body">
								<form method="POST" action="{{route('user.update.profile')}}"
									enctype="multipart/form-data" class="needs-validation">
									@csrf
									<div class="form-group">
										<div class="avatar-upload">
											<div class="avatar-edit">
												<input type='file' id="imageUpload" name="image"
													accept=".png, .jpg, .jpeg" />
												<label for="imageUpload"></label>
											</div>
											<div class="avatar-preview">
												<div id="imagePreview"
													style="background-image: url({{$user->profile_url}});">
												</div>
											</div>
										</div>
									</div>
									<div class="row mb-2">
										<div class="col-12 col-md-6 col-lg-6">
											<div class="form-floating has-validation">
												<input type="text" name="first_name"
													class="form-control @error('first_name') is-invalid @enderror"
													id="first_name" placeholder="{{ __('First Name') }}"
													value="{{ old('first_name',$user->last_name) }}" required>
												<label for="first_name">{{ __('First Name') }}</label>
												@error('first_name')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
												@enderror
											</div>
										</div>
										<div class="col-12 col-md-6 col-lg-6">
											<div class="form-floating has-validation">
												<input type="text" name="last_name"
													class="form-control @error('last_name') is-invalid @enderror"
													id="last_name" placeholder="{{ __('Last Name') }}"
													value="{{ old('last_name',$user->last_name) }}" required>
												<label for="last_name">{{ __('Last Name') }}</label>
												@error('last_name')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
												@enderror
											</div>
										</div>
									</div>
									<div class="mb-2">
										<div class="form-floating has-validation mb-2">
											<input type="email" name="email"
												class="form-control @error('email') is-invalid @enderror" id="email"
												placeholder="{{ __('Email') }}" value="{{ old('email',$user->email) }}"
												required>
											<label for="email">{{ __('Email') }}</label>
											@error('email')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
											@enderror
										</div>
									</div>
									<div class="mb-2">
										<div class="form-floating has-validation mb-2">
											<input type="text" name="phone"
												class="form-control @error('phone') is-invalid @enderror" id="phone"
												placeholder="{{ __('Phone') }}" value="{{ old('phone',$user->phone) }}"
												required>
											<label for="phone">{{ __('Phone') }}</label>
											@error('phone')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
											@enderror
										</div>
									</div>
									<div class="mb-2">
										<div class="form-floating has-validation mb-2">
											<input type="text" name="date_of_birth"
												class="form-control @error('date_of_birth') is-invalid @enderror"
												id="date_of_birth" placeholder="{{ __('Date Of Birth') }}"
												value="{{ old('date_of_birth',$user->date_of_birth) }}" required>
											<label for="date_of_birth">{{ __('Date Of Birth') }}</label>
											@error('date_of_birth')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
											@enderror
										</div>
									</div>
									<div class="mb-4">
										<div class="form-floating has-validation mb-2">
											<textarea name="bio" id="bio" class="form-control h-25" rows="5"
												placeholder="Bio...">{{old('bio',$user->bio)}}</textarea>
											<label for="bio">{{ __('Bio...') }}</label>
											@error('bio')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
											@enderror
										</div>
									</div>
									<div class="d-flex gap-2 justify-content-center">
										<button type="submit" name="form_type" value="edit_profile"
											class="btn btn-main w-50">Submit</button>
									</div>
								</form>
							</div>
						</article>
					</div>
					<div class="tab-pane fade @if(old('form_type') == 'change_password') show active @endif"
						id="change-password" role="tabpanel" aria-labelledby="change-password-tab">
						<article class="card mb-4">
							<div class="card-body">
								<form method="POST" action="{{ route('user.change.password') }}"
									enctype="multipart/form-data" class="needs-validation">
									@csrf
									<div class="mb-2">
										<div class="form-floating has-validation mb-2">
											<input type="password" name="current_password"
												class="form-control @error('current_password') is-invalid @enderror"
												id="current_password" placeholder="{{ __('Current Password') }}"
												required>
											<label for="current_password">{{ __('Current Password') }}</label>
											@error('current_password')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
											@enderror
										</div>
									</div>
									<div class="mb-2">
										<div class="form-floating has-validation mb-2">
											<input type="password" name="new_password"
												class="form-control @error('new_password') is-invalid @enderror"
												id="new_password" placeholder="{{ __('New Password') }}" required>
											<label for="new_password">{{ __('New Password') }}</label>
											@error('new_password')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
											@enderror
										</div>
									</div>
									<div class="mb-4">
										<div class="form-floating has-validation mb-2">
											<input type="password" name="new_password_confirmation"
												class="form-control @error('new_password_confirmation') is-invalid @enderror"
												id="new_password_confirmation"
												placeholder="{{ __('Confirm New Password') }}" required>
											<label
												for="new_password_confirmation">{{ __('Confirm New Password') }}</label>
											@error('new_password_confirmation')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
											@enderror
										</div>
									</div>
									<div class="d-flex gap-2 justify-content-center">
										<button type="submit" name="form_type" value="change_password"
											class="btn btn-main w-50">Submit</button>
									</div>
								</form>
							</div>
						</article>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<div class="modal fade" id="topicUpdateModal" tabindex="-1" aria-labelledby="topicUpdateModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title" id="topicUpdateModalLabel">{{ __('Add Topic') }}</h3>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form method="POST" action="" class="needs-validation" novalidate id="userTopicsUpdateForm">
					<ul class="list-inline widget-list-inline widget-card">
						@if($topics)
						@php
						$topic_ids = $user->topics->pluck('id')->toArray();
						@endphp
						@foreach($topics as $topic)
						<li class="list-inline-item">
							<input type="checkbox" class="btn-check" id="{{$topic->slug}}" @if(in_array($topic->id,
							$topic_ids)) checked @endif autocomplete="off" name="topic" value="{{$topic->id}}">
							<label class="btn btn-outline-main" for="{{$topic->slug}}">{{$topic->name}}</label>
						</li>
						@endforeach
						@endif
					</ul>
				</form>
			</div>
			<div class="modal-footer d-block px-4">
				<div class="d-flex justify-content-center">
					<button class="btn btn-main col-7" type="submit" value="topicAdd" name="form_type"
						id="userTopicsUpdateBtn">{{ __('Submit') }}</button>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('pagewise_js')
<script>
	$("#imageUpload").change(function() {
		if (this.files && this.files[0]) {
		var reader = new FileReader();
		reader.onload = function(e) {
		$('#imagePreview').css('background-image', 'url('+e.target.result +')');
		$('#imagePreview').hide();
		$('#imagePreview').fadeIn(650);
		}
		reader.readAsDataURL(this.files[0]);
		}
	});
	const routeUserUpdateTopic = "{{ route('update.topic') }}";
	var userTopicsUpdateAjax = null;
	$('#userTopicsUpdateBtn').click(function(){
		$("#userTopicsUpdateBtn").attr("disabled", true);
		$("[data-bs-target='#topicUpdateModal']").attr("disabled", true);
		$("#userTopicsUpdateBtn").html('<span class="spinner-grow spinner-grow-sm text-white" role="status" aria-hidden="true"></span>\
		<span class="text-white">Loading...</span>');
		const topics = [];
		var data = $('#userTopicsUpdateForm').serializeArray().reduce(function(obj, item) {
			topics.push(item.value);
			/* obj[item.name] = item.value;
			return obj; */
		}, {});
		userTopicsUpdateAjax = $.ajax({
			method: "POST",
			dataType: "json",
			url: routeUserUpdateTopic,
			data: {
				topics: topics,
				_token: csrfToken,
			},
			beforeSend: function () {
				if (userTopicsUpdateAjax != null) {
					userTopicsUpdateAjax.abort();
				}
			},
			success: function (resultData) {
				$('#topicUpdateModal').modal('hide');
				Toast.fire({
					icon: "success",
					title:
						"<span style='color:black'>" +
						resultData.message +
						"</span>",
				});
				$('#widget_topics_card').html('');
				var topicsHtml = '';
				$.each( resultData.data, function( key, value ) {
					topicsHtml += '<li class="list-inline-item"><a href="tags.html">'+value.name+'</a></li>';
				});
				$('#widget_topics_card').html(topicsHtml);
				$("#userTopicsUpdateBtn").html('Submit');
				$("#userTopicsUpdateBtn").attr("disabled", false);
				$("[data-bs-target='#topicUpdateModal']").attr("disabled", false);
			},
			error: function(resultData) {
				Toast.fire({
				icon: "error",
				title:
				"<span style='color:black'>" +
					resultData.responseJSON.message +
					"</span>",
				});
				$("#userTopicsUpdateBtn").html('Submit');
				$("#userTopicsUpdateBtn").attr("disabled", false);
				$("[data-bs-target='#topicUpdateModal']").attr("disabled", false);
			}
		});
	});
</script>
@endsection