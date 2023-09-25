<?php

namespace App\Providers;

use App\Models\Topic;
use App\Models\SiteSetting;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
	/**
	 * Register any application services.
	 */
	public function register(): void
	{
		//
	}

	/**
	 * Bootstrap any application services.
	 */
	public function boot(): void
	{
		view()->composer('layouts.admin.app', function ($view) {
			$siteSettingAll = SiteSetting::get();
			$siteSetting = [];
			foreach ($siteSettingAll as $siteSettingVal) {
				$siteSetting[$siteSettingVal->key] = $siteSettingVal->value;
			}
			$view->with(['siteSetting' => $siteSetting]);
		});

		view()->composer('layouts.admin.auth.app', function ($view) {
			$siteSettingAll = SiteSetting::get();
			$siteSetting = [];
			foreach ($siteSettingAll as $siteSettingVal) {
				$siteSetting[$siteSettingVal->key] = $siteSettingVal->value;
			}
			$view->with(['siteSetting' => $siteSetting]);
		});

		view()->composer('components.admin.header', function ($view) {
			$siteSettingAll = SiteSetting::get();
			$siteSetting = [];
			foreach ($siteSettingAll as $siteSettingVal) {
				$siteSetting[$siteSettingVal->key] = $siteSettingVal->value;
			}
			$view->with(['siteSetting' => $siteSetting]);
		});

		view()->composer('components.admin.auth.site-logo-img', function ($view) {
			$siteSettingAll = SiteSetting::get();
			$siteSetting = [];
			foreach ($siteSettingAll as $siteSettingVal) {
				$siteSetting[$siteSettingVal->key] = $siteSettingVal->value;
			}
			$view->with(['siteSetting' => $siteSetting]);
		});

		view()->composer('components.front.topics-card', function ($view) {
			$topics = Topic::where('status', 'active')->latest()->limit(10)->get();
			$view->with(['topics' => $topics]);
		});

		view()->composer('components.front.modal.user-add-topic', function ($view) {
			$topics = Topic::where('status', 'active')->latest()->get();
			$view->with(['topics' => $topics]);
		});
	}
}
