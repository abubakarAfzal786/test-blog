<?php

namespace App\Listeners;

use App\Events\ChatTypingEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ChatTypingEventListener
{
	/**
	 * Create the event listener.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//
	}

	/**
	 * Handle the event.
	 *
	 * @param  ChatTypingEvent  $event
	 * @return void
	 */
	public function handle(ChatTypingEvent $event)
	{
		//
	}
}
