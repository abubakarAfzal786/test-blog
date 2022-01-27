<?php

namespace App\Http\Controllers;

use App\Chat;
use App\Events\ChatEvent;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Broadcast;

class ChatController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		//
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
	public function get_chat()
	{
		$user_id = request('user_id');
		$friend_id = request('friend_id');
		$chat = Chat::orWhere([['sender_id', '=', $user_id], ['receiver_id', '=', $friend_id]])
			->orWhere([['sender_id', '=', $friend_id], ['receiver_id', '=', $user_id]])->get();
		return response($chat);
	}
	public function send_chat()
	{
		$user_id = request('user_id');
		$friend_id = request('friend_id');
		$message = request('message');
		$send_chat = new Chat();
		$send_chat->sender_id = $user_id;
		$send_chat->receiver_id = $friend_id;
		$send_chat->message = $message;
		$send_chat->save();
		event(new ChatEvent($send_chat));
		return response($send_chat);
	}
	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Chat  $chat
	 * @return \Illuminate\Http\Response
	 */
	public function show(Chat $chat)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Chat  $chat
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Chat $chat)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Chat  $chat
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Chat $chat)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Chat  $chat
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Chat $chat)
	{
		//
	}
}
