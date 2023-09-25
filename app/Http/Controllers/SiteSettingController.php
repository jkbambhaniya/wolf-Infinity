<?php

namespace App\Http\Controllers;

use Throwable;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use App\Http\Traits\ImageUploadTrait;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\Settings\SiteSettingUpdateRequest;

class SiteSettingController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 */
	public function create()
	{
		$settings = SiteSetting::get();
		$siteSettings = [];
		$themeSettings = [];
		if ($settings) {
			foreach ($settings as $setting) {
				if ($setting->field_group_name == 'site_setting') {
					$siteSettings[] = $setting;
				} else if ($setting->field_group_name == 'theme_setting') {
					$themeSettings[] = $setting;
				}
			}
		}
		return view('admin.settings.site-setting', [
			'title' => 'Site Setting',
			'siteSettings' => $siteSettings,
			'themeSettings' => $themeSettings,
			'breadcrumb' => array()
		]);
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(SiteSettingUpdateRequest $request)
	{
		$data = $request->safe()->all();
		try {
			if ($data['value']) {
				foreach ($data['value'] as $key => $value) {
					if ($key == 'site_logo') {
						$file = $value;
						$siteSetting = SiteSetting::where('key', $key)->first();
						if ($request->site_logo_remove == 1) {
							if ($siteSetting->value && Storage::exists($siteSetting->value)) {
								ImageUploadTrait::imageDelete($siteSetting->value);
							}
							$value = NULL;
						}
						if ($file) {
							if ($siteSetting->value && Storage::exists($siteSetting->value)) {
								ImageUploadTrait::imageDelete($siteSetting->value);
							}
							$path = ImageUploadTrait::imageUpload($file, 'siteLogo');
							$value = $path;
						}
					}
					if ($key == 'favicon') {
						$file = $value;
						$siteSetting = SiteSetting::where('key', $key)->first();
						if ($request->favicon_remove == 1) {
							if ($siteSetting->value && Storage::exists($siteSetting->value)) {
								ImageUploadTrait::imageDelete($siteSetting->value);
							}
							$value = NULL;
						}
						if ($file) {
							if ($siteSetting->value && Storage::exists($siteSetting->value)) {
								ImageUploadTrait::imageDelete($siteSetting->value);
							}
							$path = ImageUploadTrait::imageUpload($file, 'favicon');
							$value = $path;
						}
					}
					SiteSetting::where('key', $key)->update(['value' => $value]);
				}
				Session::flash('success', __('messages.admin.site_setting_updated_succ'));
				return redirect(route('admin.site.setting.create'));
			} else {
				Session::flash('error', __('messages.admin.errors.something_went_wrong'));
				return redirect(route('admin.site.setting.create'));
			}
		} catch (Throwable $exception) {
			Session::flash('error', $exception->getMessage());
			return redirect(route('admin.site.setting.create'));
		}
	}

	/**
	 * Display the specified resource.
	 */
	public function show(SiteSetting $siteSetting)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 */
	public function edit(SiteSetting $siteSetting)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(Request $request, SiteSetting $siteSetting)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(SiteSetting $siteSetting)
	{
		//
	}
}
