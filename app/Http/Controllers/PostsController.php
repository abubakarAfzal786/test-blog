<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostsRequest;
use App\Http\Resources\PostResource;
use App\post;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function __construct()
	{
		$this->middleware('JWT', ['except' => ['index', 'show']]);
	}
	public function index()
	{
		return  PostResource::collection(post::all());
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(PostsRequest $request)
	{

		$post = auth()->user()->post()->create($request->all());
		return response(new PostResource($post), '200');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\post  $post
	 * @return \Illuminate\Http\Response
	 */
	public function show($post)
	{
		return  PostResource::collection(post::where('slug', $post)->with('replies')->get());
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\post  $post
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		return post::find($id);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\post  $post
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, post $post)
	{
		try {
			post::where('id', $post->id)->update($request->all());
			return response(['message' => 200]);
		} catch (Exception $ex) {
			return response(['message' => $ex->getMessage()]);
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\post  $post
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(post $post)
	{
		$post->delete();
		return "Deleted";
	}
}
