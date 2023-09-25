@extends('layouts.admin.app')

@section('title')
{{ $title }}
@endsection
@section('content')
<x-admin.flash-message></x-admin.flash-message>
<div class="col-xl-12 col-lg-12">
	<!--begin::Card-->
	<div class="card">
		<form method="POST" action="{{ route('admin.site.setting.store') }}"
			class="form fv-plugins-bootstrap5 fv-plugins-framework mt-3" id="site_setting_form"
			enctype="multipart/form-data">
			@csrf
			<div class="card-body">
				<div class="mb-3">
					<h2 class="fw-bold">Site Settings</h2>
					<div class="separator separator-dashed my-10"></div>
					<!--begin::Row-->
					<div class="row gx-10 mb-5">
						@if ($siteSettings)
						@foreach ($siteSettings as $key => $setting)
						@if($loop->iteration % 2 == 0)
						<!--begin::Col-->
						<div class="col-lg-6">
							<label
								class="form-label fs-6 fw-bold text-gray-700 mb-3">{{ Str::title(Str::replace('_', ' ', $setting->key)) }}</label>
							<!--begin::Input group-->
							<div class="mb-5 fv-row fv-plugins-icon-container">
								@if($setting->key == 'site_address')
								<textarea class="form-control maxlengt @error("
									value.$setting->key") is-invalid @enderror" rows="3" name="value[{{ $setting->key }}]" placeholder="{{ Str::title(Str::replace('_', ' ', $setting->key)) }}"> {{ old("value.$setting->key", $setting->value) }} </textarea>
								@elseif($setting->key == 'site_logo')
								<!--begin::Col-->
								<div class="col-lg-8">
									<!--begin::Image input-->
									<div class="image-input image-input-outline @error('value.'.$setting->key)
																								is-invalid @enderror" data-kt-image-input="true" style="background-image: url('{{
																										asset('admin-assets/media/svg/avatars/blank.svg') }}')">
										<!--begin::Preview existing avatar-->
										@if ($setting->value &&
										Storage::exists($setting->value))
										<div class="image-input-wrapper w-175px h-125px"
											style="background-image: url({{ Storage::url($setting->value) }})">
										</div>
										@else
										<div class="image-input-wrapper w-175px h-125px"
											style="background-image: url({{ asset('admin-assets/media/svg/avatars/blank.svg') }})">
										</div>
										@endif
										<!--end::Preview existing avatar-->
										<!--begin::Label-->
										<label
											class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
											data-kt-image-input-action="change" data-bs-toggle="tooltip"
											aria-label="Change avatar" data-bs-original-title="Change avatar"
											data-kt-initialized="1">
											<i class="bi bi-pencil-fill fs-7"></i>
											<!--begin::Inputs-->
											<input type="file" name="value[{{ $setting->key }}]"
												accept=".png, .jpg, .jpeg">
											<input type="hidden" name="value[site_logo_remove]">
											<!--end::Inputs-->
										</label>
										<!--end::Label-->
										<!--begin::Cancel-->
										<span
											class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
											data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
											aria-label="Cancel avatar" data-bs-original-title="Cancel avatar"
											data-kt-initialized="1">
											<i class="bi bi-x fs-2"></i>
										</span>
										<!--end::Cancel-->
										<!--begin::Remove-->
										@if ($setting->value)
										<span
											class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
											data-kt-image-input-action="remove" data-bs-toggle="tooltip"
											aria-label="Remove avatar" data-bs-original-title="Remove avatar"
											data-kt-initialized="1">
											<i class="bi bi-x fs-2"></i>
										</span>
										@endif
										<!--end::Remove-->
									</div>
									<!--end::Image input-->
									<!--begin::Hint-->
									<div class="form-text">Allowed file types: jpeg, png, jpg, svg, heic.</div>
									@error("value.$setting->key")
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
									<!--end::Hint-->
								</div>
								<!--end::Col-->
								@elseif($setting->key == 'favicon')
								<!--begin::Col-->
								<div class="col-lg-8">
									<!--begin::Image input-->
									<div class="image-input image-input-outline @error('value.'.$setting->key)
																																is-invalid @enderror" data-kt-image-input="true" style="background-image: url('{{
																																		asset('admin-assets/media/svg/avatars/blank.svg') }}')">
										<!--begin::Preview existing avatar-->
										@if ($setting->value &&
										Storage::exists($setting->value))
										<div class="image-input-wrapper w-125px h-125px"
											style="background-image: url({{ Storage::url($setting->value) }})">
										</div>
										@else
										<div class="image-input-wrapper w-125px h-125px"
											style="background-image: url({{ asset('admin-assets/media/svg/avatars/blank.svg') }})">
										</div>
										@endif
										<!--end::Preview existing avatar-->
										<!--begin::Label-->
										<label
											class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
											data-kt-image-input-action="change" data-bs-toggle="tooltip"
											aria-label="Change avatar" data-bs-original-title="Change avatar"
											data-kt-initialized="1">
											<i class="bi bi-pencil-fill fs-7"></i>
											<!--begin::Inputs-->
											<input type="file" name="value[{{ $setting->key }}]"
												accept=".png, .jpg, .jpeg">
											<input type="hidden" name="value[favicon_remove]">
											<!--end::Inputs-->
										</label>
										<!--end::Label-->
										<!--begin::Cancel-->
										<span
											class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
											data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
											aria-label="Cancel Icon" data-bs-original-title="Cancel Icon"
											data-kt-initialized="1">
											<i class="bi bi-x fs-2"></i>
										</span>
										<!--end::Cancel-->
										<!--begin::Remove-->
										@if ($setting->value)
										<span
											class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
											data-kt-image-input-action="remove" data-bs-toggle="tooltip"
											aria-label="Remove Icon" data-bs-original-title="Remove Icon"
											data-kt-initialized="1">
											<i class="bi bi-x fs-2"></i>
										</span>
										@endif
										<!--end::Remove-->
									</div>
									<!--end::Image input-->
									<!--begin::Hint-->
									<div class="form-text">Allowed file types: jpeg, png, jpg, svg, heic.</div>
									@error("value.$setting->key")
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
									<!--end::Hint-->
								</div>
								<!--end::Col-->
								@else
								<input type="text" name="value[{{ $setting->key }}]" class="form-control maxlengt @error('value.'.$setting->key)
								is-invalid @enderror" placeholder="{{ Str::title(Str::replace('_', ' ', $setting->key))
								}}" value="{{ old(" value.$setting->key", $setting->value) }}">
								@endif
								@error("value.$setting->key")
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
							<!--end::Input group-->
						</div>
						<!--end::Col-->
						@else
						<!--begin::Col-->
						<div class="col-lg-6">
							<label
								class="form-label fs-6 fw-bold text-gray-700 mb-3">{{ Str::title(Str::replace('_', ' ', $setting->key)) }}</label>
							<!--begin::Input group-->
							<div class="mb-5 fv-row fv-plugins-icon-container">
								@if($setting->key == 'site_address')
								<textarea
									class="form-control maxlengt @error('value.'.$setting->key) is-invalid @enderror"
									rows="3" name="value[{{ $setting->key }}]"
									placeholder="{{ Str::title(Str::replace('_', ' ', $setting->key)) }}">
								{{ old("value.$setting->key", $setting->value) }} </textarea>
								@elseif($setting->key == 'site_logo')
								<!--begin::Col-->
								<div class="col-lg-8">
									<!--begin::Image input-->
									<div class="image-input image-input-outline @error('value.'.$setting->key)
																is-invalid @enderror" data-kt-image-input="true" style="background-image: url('{{
																		asset('admin-assets/media/svg/avatars/blank.svg') }}')">
										<!--begin::Preview existing avatar-->
										@if ($setting->value &&
										Storage::exists($setting->value))
										<div class="image-input-wrapper w-175px h-125px"
											style="background-image: url({{ Storage::url($setting->value) }})">
										</div>
										@else
										<div class="image-input-wrapper w-175px h-125px"
											style="background-image: url({{ asset('admin-assets/media/svg/avatars/blank.svg') }})">
										</div>
										@endif
										<!--end::Preview existing avatar-->
										<!--begin::Label-->
										<label
											class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
											data-kt-image-input-action="change" data-bs-toggle="tooltip"
											aria-label="Change avatar" data-bs-original-title="Change avatar"
											data-kt-initialized="1">
											<i class="bi bi-pencil-fill fs-7"></i>
											<!--begin::Inputs-->
											<input type="file" name="value[{{ $setting->key }}]"
												accept=".png, .jpg, .jpeg">
											<input type="hidden" name="value[site_logo_remove]">
											<!--end::Inputs-->
										</label>
										<!--end::Label-->
										<!--begin::Cancel-->
										<span
											class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
											data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
											aria-label="Cancel avatar" data-bs-original-title="Cancel avatar"
											data-kt-initialized="1">
											<i class="bi bi-x fs-2"></i>
										</span>
										<!--end::Cancel-->
										<!--begin::Remove-->
										@if ($setting->value)
										<span
											class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
											data-kt-image-input-action="remove" data-bs-toggle="tooltip"
											aria-label="Remove avatar" data-bs-original-title="Remove avatar"
											data-kt-initialized="1">
											<i class="bi bi-x fs-2"></i>
										</span>
										@endif
										<!--end::Remove-->
									</div>
									<!--end::Image input-->
									<!--begin::Hint-->
									<div class="form-text">Allowed file types: jpeg, png, jpg, svg, heic.</div>
									@error("value.$setting->key")
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
									<!--end::Hint-->
								</div>
								<!--end::Col-->
								@elseif($setting->key == 'favicon')
								<!--begin::Col-->
								<div class="col-lg-8">
									<!--begin::Image input-->
									<div class="image-input image-input-outline @error('value.'.$setting->key)
																																									is-invalid @enderror" data-kt-image-input="true" style="background-image: url('{{
																																											asset('admin-assets/media/svg/avatars/blank.svg') }}')">
										<!--begin::Preview existing avatar-->
										@if ($setting->value &&
										Storage::exists($setting->value))
										<div class="image-input-wrapper w-125px h-125px"
											style="background-image: url({{ Storage::url($setting->value) }})">
										</div>
										@else
										<div class="image-input-wrapper w-125px h-125px"
											style="background-image: url({{ asset('admin-assets/media/svg/avatars/blank.svg') }})">
										</div>
										@endif
										<!--end::Preview existing avatar-->
										<!--begin::Label-->
										<label
											class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
											data-kt-image-input-action="change" data-bs-toggle="tooltip"
											aria-label="Change avatar" data-bs-original-title="Change avatar"
											data-kt-initialized="1">
											<i class="bi bi-pencil-fill fs-7"></i>
											<!--begin::Inputs-->
											<input type="file" name="value[{{ $setting->key }}]"
												accept=".png, .jpg, .jpeg">
											<input type="hidden" name="value[favicon_remove]">
											<!--end::Inputs-->
										</label>
										<!--end::Label-->
										<!--begin::Cancel-->
										<span
											class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
											data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
											aria-label="Cancel Icon" data-bs-original-title="Cancel Icon"
											data-kt-initialized="1">
											<i class="bi bi-x fs-2"></i>
										</span>
										<!--end::Cancel-->
										<!--begin::Remove-->
										@if ($setting->value)
										<span
											class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
											data-kt-image-input-action="remove" data-bs-toggle="tooltip"
											aria-label="Remove Icon" data-bs-original-title="Remove Icon"
											data-kt-initialized="1">
											<i class="bi bi-x fs-2"></i>
										</span>
										@endif
										<!--end::Remove-->
									</div>
									<!--end::Image input-->
									<!--begin::Hint-->
									<div class="form-text">Allowed file types: jpeg, png, jpg, svg, heic.</div>
									@error("value.$setting->key")
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
									<!--end::Hint-->
								</div>
								<!--end::Col-->
								@else
								<input type="text" name="value[{{ $setting->key }}]" class="form-control maxlengt @error('value.'.$setting->key)
								is-invalid @enderror" placeholder="{{ Str::title(Str::replace('_', ' ', $setting->key))
								}}" value="{{ old(" value.$setting->key", $setting->value) }}">
								@endif
								@error("value.$setting->key")
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
							<!--end::Input group-->
						</div>
						<!--end::Col-->
						@endif
						@endforeach
						@endif
					</div>
					<!--end::Row-->

					<div class="separator separator-dashed my-10"></div>
					<h2 class="fw-bold ">Theme Settings</h2>
					<!--begin::Row-->
					<div class="row gx-10 my-5">
						@if ($themeSettings)
						@foreach ($themeSettings as $key => $setting)
						@if($loop->iteration % 2 == 0)
						<!--begin::Col-->
						<div class="col-lg-6">
							<label
								class="form-label fs-6 fw-bold text-gray-700 mb-3">{{ Str::title(Str::replace('_', ' ', $setting->key)) }}</label>
							<!--begin::Input group-->
							<div class="mb-5">
								<input type="color" name="value[{{ $setting->key }}]" class="form-control @error('value.'.$setting->key)
								is-invalid @enderror" placeholder="{{ Str::title(Str::replace('_', ' ', $setting->key))
								}}" value="{{ old(" value.$setting->key", $setting->value) }}">
								@error("value.$setting->key")
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
							<!--end::Input group-->
						</div>
						<!--end::Col-->
						@else
						<!--begin::Col-->
						<div class="col-lg-6">
							<label
								class="form-label fs-6 fw-bold text-gray-700 mb-3">{{ Str::title(Str::replace('_', ' ', $setting->key)) }}</label>
							<!--begin::Input group-->
							<div class="mb-5">
								<input type="color" name="value[{{ $setting->key }}]" class="form-control @error('value.'.$setting->key)
								is-invalid @enderror" placeholder="{{ Str::title(Str::replace('_', ' ', $setting->key))
								}}" value="{{ old('value.'.$setting->key, $setting->value) }}">
								@error("value.$setting->key")
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
							<!--end::Input group-->
						</div>
						<!--end::Col-->
						@endif
						@endforeach
						@endif
					</div>
					<!--end::Row-->
				</div>
			</div>
			<!--begin::Actions-->
			<div class="card-footer d-flex justify-content-end py-6 px-9">
				<button type="submit" class="btn btn-primary" id="site_setting_submit">Save</button>
			</div>
		</form>
	</div>
	<!--end::Card-->
</div>
@endsection
@section('pagewise_js')
<script src="{{ asset('admin-assets/js/admin/settings/site-setting.js') }}?{{ time() }}">
</script>
@endsection