<?php

namespace App\Http\Controllers\Admin;

use App\Models\City;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CitiesResource;

class CitiesController extends Controller
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
		//
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(Request $request)
	{
		//
	}

	/**
	 * Display the specified resource.
	 */
	public function show(string $id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 */
	public function edit(string $id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(Request $request, string $id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(string $id)
	{
		//
	}

	/**
	 * Get all resource using ajax
	 */
	public function getAll(Request $request)
	{
		$cities = City::where(['country_id' => $request->countryId, 'state_id' => $request->stateId])->orderBy('name', 'ASC');
		if (!empty($request->search)) {
			$search = $request->search;
			$cities = $cities->where(function ($query) use ($search) {
				$query->where('name', 'LIKE', "%{$search}%");
			});
		}
		$cities = $cities->get();
		return (CitiesResource::collection($cities))->additional([
			'status' => true,
			'message' => __('messages.api.profile_fetch_succ')
		]);
	}

	/**
	 * Get resource using ajax
	 */
	public function getCity($id, Request $request)
	{
		$city = City::find($id);
		return (new CitiesResource($city))->additional([
			'status' => true,
			'message' => __('messages.api.profile_fetch_succ')
		]);
	}
}
