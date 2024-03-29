<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Authenticated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LogAuthenticated
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
   * @param  \Illuminate\Auth\Events\Authenticated  $event
   * @return void
   */
  public function handle(Authenticated $event)
  {
    $event->user->last_login_at = now();
    $event->user->save();
  }
}
