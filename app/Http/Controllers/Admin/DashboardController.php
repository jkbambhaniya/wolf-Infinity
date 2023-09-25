<?php

namespace App\Http\Controllers\Admin;

use DatePeriod;
use DateInterval;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Booking;
use App\Models\Earning;
use Illuminate\Http\Request;
use App\Models\ServiceProvider;
use App\Http\Traits\CommonTraits;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
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
	 *
	 * @return
	 */
	public function index()
	{
		return view('admin.dashboard', [
			'title' => 'Dashboard',
		]);
	}
}
