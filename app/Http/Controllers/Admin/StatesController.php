<?php

namespace App\Http\Controllers\Admin;

use App\Models\State;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\StatesResource;

class StatesController extends Controller
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
		$states = State::where(['country_id' => $request->countryId])->orderBy('name', 'ASC');
		if (!empty($request->search)) {
			$search = $request->search;
			$states = $states->where(function ($query) use ($search) {
				$query->where('name', 'LIKE', "%{$search}%");
			});
		}
		$states = $states->get();
		return (StatesResource::collection($states))->additional([
			'status' => true,
			'message' => __('messages.api.profile_fetch_succ')
		]);
	}

	/**
	 * Get resource using ajax
	 */
	public function getState($id, Request $request)
	{
		$state = State::find($id);
		return (new StatesResource($state))->additional([
			'status' => true,
			'message' => __('messages.api.profile_fetch_succ')
		]);
	}
}
