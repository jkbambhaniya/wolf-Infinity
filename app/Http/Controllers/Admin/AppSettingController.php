<?php

namespace App\Http\Controllers\Admin;

use Throwable;
use App\Models\AppSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\Admin\Settings\AppSettingUpdateRequest;

class AppSettingController extends Controller
{

	/**
	 * Only for "admin" guard are allowed except
	 * for logout.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('admin');
	}

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
		$appSettings = AppSetting::orderBy('name', 'ASC')->get();
		return view('admin.settings.app-setting', [
			'title' => 'App Setting',
			'appSettings' => $appSettings,
			'breadcrumb' => array()
		]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(AppSettingUpdateRequest $request)
	{
		$data = $request->safe()->all();
		try {
			if ($data['setting_password'] == config('app.app_setting_password')) {
				if ($data['setting']) {
					foreach ($data['setting'] as $key => $value) {
						$compulsory = '0';
						if (isset($request->compulsory) && isset($request->compulsory[$key])) {
							$compulsory = '1';
						}
						AppSetting::where('name', $key)->update(['setting' => $value, 'compulsory' => $compulsory]);
					}
				}
				Session::flash('success', __('messages.admin.app_setting_update_succ'));
				return redirect(route('admin.app.create'));
			} else {
				return Redirect::back()->withErrors(['setting_password' => __('messages.admin.errors.valid_setting_password')])->withInput();
			}
		} catch (Throwable $exception) {
			Session::flash('error', $exception->getMessage());
			return redirect(route('admin.app.create'));
		}
	}
}
