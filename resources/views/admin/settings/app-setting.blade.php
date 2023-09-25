@extends('layouts.admin.app')

@section('title')
{{ $title }}
@endsection
@section('content')
<x-admin.flash-message></x-admin.flash-message>
<div class="col-xl-12 col-lg-12">
	<!--begin::Card-->
	<div class="card">
		<div class="card-body">
			<form method="POST" action="{{ route('admin.app.setting.store') }}"
				class="form fv-plugins-bootstrap5 fv-plugins-framework mt-3" id="app_update_form">
				@csrf
				<div class="table-responsive">
					<table class="table table-rounded table-row-bordered border border-gray-300 gy-7 gs-7">
						<thead>
							<tr class="fw-semibold fs-6 text-gray-900 border-bottom-2 border-gray-300">
								<th>App Name</th>
								<th>Version</th>
								<th class="text-end">Compulsory Update ?</th>
							</tr>
						</thead>
						<tbody>
							@if($appSettings)
							@foreach($appSettings as $key => $settings)
							@if($settings->name != 'maintenance_mode')
							<tr>
								<td>{{Str::title(Str::replace('_', ' ', $settings->name))}}</td>
								<td>
									<div class="fv-row fv-plugins-icon-container">
										<input type="tel" name="setting[{{$settings->name}}]"
											id="setting_{{$settings->id}}"
											class="form-control form-control-lg form-control-solid maxlength @error('setting.'.$settings->name) is-invalid @enderror"
											placeholder="setting" maxlength="15" value="{{old("
											setting.$settings->name",$settings->setting)}}">
										@error("setting.$settings->name")
										<span class="invalid-feedback" role="alert">
											{{ $message }}
										</span>
										@enderror
									</div>
								</td>
								<td class="text-end">
									<!--begin::Label-->
									<div class="d-flex justify-content-end">
										<div
											class="form-check form-switch form-check-custom form-check-success form-check-solid">
											<input class="form-check-input  h-40px w-60px" type="checkbox"
												name="compulsory[{{$settings->name}}]" value="1" {{
												old("compulsory.$key",$settings->compulsory) == '1' ? 'checked' : '' }}
											/>
										</div>
									</div>
									<!--begin::Label-->
								</td>
							</tr>
							@endif
							@endforeach
							@endif
						</tbody>
					</table>
				</div>
				<div class="table-responsive mt-5">
					<table class="table table-rounded table-row-bordered border border-gray-300 gy-7 gs-7">
						<thead>
							<tr class="fw-semibold fs-6 text-gray-900 border-bottom-2 border-gray-300">
								<th>Maintance Mode</th>
								<th class="text-end">Maintenance Mode Enable ?</th>
							</tr>
						</thead>
						<tbody>
							@if($appSettings)
							@foreach($appSettings as $settings)
							@if($settings->name == 'maintenance_mode')
							<tr>
								<td>{{Str::title(Str::replace('_', ' ', $settings->name))}}</td>
								<td class="text-end">
									<!--begin::Label-->
									<div class="d-flex justify-content-end">
										<div
											class="form-check form-switch form-check-custom form-check-success form-check-solid">
											<input type="hidden" name="setting[{{$settings->name}}]" value="0">
											<input class="form-check-input h-40px w-60px" type="checkbox"
												name="compulsory[{{$settings->name}}]" value="1" {{
												old("compulsory.$key",$settings->compulsory) == '1' ? 'checked' : '' }}
											/>
										</div>
									</div>
									<!--begin::Label-->
								</td>
							</tr>
							@endif
							@endforeach
							@endif
						</tbody>
					</table>
				</div>
				<!--begin::Actions-->
				<div class="card-footer d-flex justify-content-end py-6 px-9">
					<button type="button" class="btn btn-primary" data-bs-toggle="modal"
						data-bs-target="#password_modal">Save</button>
				</div>
				<!--end::Actions-->
				<div class="modal fade" tabindex="-1" id="password_modal">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h3 class="modal-title">Password</h3>

								<!--begin::Close-->
								<div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
									aria-label="Close">
									<span class="svg-icon svg-icon-1"></span>
								</div>
								<!--end::Close-->
							</div>

							<div class="modal-body">
								<div class="fv-row fv-plugins-icon-container">
									<input type="text" name="setting_password" id="setting_password" class="form-control form-control-lg form-control-solid maxlength 
										@error('setting_password') is-invalid @enderror" placeholder="Setting Password" maxlength="15"
										value="{{old('setting_password')}}">
									@error("setting_password")
									<span class="invalid-feedback" role="alert">
										{{ $message }}
									</span>
									@enderror
								</div>
							</div>

							<div class="modal-footer">
								<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-primary" id="app_update_submit">Save</button>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
	<!--end::Card-->
</div>
@endsection
@section('pagewise_js')
<script>
	var pass = "{{config('app.app_setting_password')}}";
	$(document).ready(function() {
            var settingPasswordError = "{{$errors->has('setting_password')}}";
            if(settingPasswordError){
                $('#password_modal').modal('show');
            }
        });
</script>
<script src="{{ asset('admin-assets/js/admin/settings/app-setting.js') }}?{{ time() }}"></script>
@endsection