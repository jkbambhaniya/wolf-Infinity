<?php

namespace App\Http\Controllers\Admin;

use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CountriesResource;

class CountryController extends Controller
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
		$countries = Country::orderBy('name', 'ASC');
		if (!empty($request->search)) {
			$search = $request->search;
			$countries = $countries->where(function ($query) use ($search) {
				$query->where('name', 'LIKE', "%{$search}%")
					->orWhere('iso3', 'LIKE', "%{$search}%")
					->orWhere('iso2', 'LIKE', "%{$search}%");
			});
		}
		$countries = $countries->get();
		return (CountriesResource::collection($countries))->additional([
			'status' => true,
			'message' => __('messages.api.profile_fetch_succ')
		]);
	}

	/**
	 * Get all resource using ajax
	 */
	public function getCountry($id, Request $request)
	{
		$countries = Country::find($id);
		return (new CountriesResource($countries))->additional([
			'status' => true,
			'message' => __('messages.api.profile_fetch_succ')
		]);
	}
}
