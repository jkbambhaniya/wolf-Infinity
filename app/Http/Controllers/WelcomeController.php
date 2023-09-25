<?php

namespace App\Http\Controllers;

use App\Models\Cms;
use App\Models\Faq;
use App\Models\AppSettings;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{

	/**
	 *  Get CMS data
	 */
	public function getCmsData($slug)
	{
		$cms = Cms::where('slug', $slug)->first();
		$siteSettingAll = SiteSetting::get();
		$siteSetting = [];
		foreach ($siteSettingAll as $siteSettingVal) {
			$siteSetting[$siteSettingVal->key] = $siteSettingVal->value;
		}
		if ($cms) {
			return view('cms-page-view', compact('cms', 'siteSetting'));
		}
		return abort(404);
	}
}
