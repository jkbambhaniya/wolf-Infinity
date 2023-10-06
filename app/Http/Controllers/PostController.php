<?php

namespace App\Http\Controllers;

use Throwable;
use App\Models\Post;
use App\Models\User;
use App\Models\Topic;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index()
	{
		return view('post.create', [
			'title' => 'Add Post',
		]);
	}

	/**
	 * Show the form for creating a new resource.
	 */
	public function create()
	{
		$user = User::find(Auth::user()->id);
		$post = new Post();
		$post->user_id = $user->id;
		$post->save();
		return redirect(route('post.edit', $post->id));
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(Request $request)
	{
		try {
			$user = User::find(Auth::user()->id);
			$post = new Post();
			$post->user_id = $user->id;
			$post->name = 'dasdasda';
			$post->slug = 'sdfsdfsd';
			$post->data = json_encode($request->data);
			/* $requestArray = $request->safe()->all();
			$requestArray['first_name'] = Str::title($requestArray['first_name']);
			$requestArray['last_name'] = Str::title($requestArray['last_name']); */
			$post->save();
			return response()->json([
				'id' =>  $post->id,
				'status' =>  true,
				'message' =>  __('messages.admin.topic_create_or_update_succ')
			]);
		} catch (Throwable $exception) {
			return response()->json([
				'status' =>  false,
				'message' => $exception->getMessage()
			]);
		}
	}

	/**
	 * Display the specified resource.
	 */
	public function show(Post $post)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 */
	public function edit(Post $post)
	{
		return view('post.create', [
			'title' => 'Add Post',
			'post' => $post
		]);
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(Request $request, Post $post)
	{
		try {
			$user = User::find(Auth::user()->id);
			$post->user_id = $user->id;
			$post->name = 'dasdasda';
			$post->slug = 'sdfsdfsd';
			$post->data = json_encode($request->data);
			$post->save();
			return response()->json([
				'id' =>  $post->id,
				'status' =>  true,
				'message' =>  __('messages.admin.topic_create_or_update_succ')
			]);
		} catch (Throwable $exception) {
			return response()->json([
				'status' =>  false,
				'message' => $exception->getMessage()
			]);
		}
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(Post $post)
	{
		//
	}
}
