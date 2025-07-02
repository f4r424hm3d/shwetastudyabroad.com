<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use App\Models\Destination;
use Illuminate\Support\ServiceProvider;

class MenuServiceProvider extends ServiceProvider
{
  /**
   * Register services.
   *
   * @return void
   */
  public function register()
  {
    //
  }

  /**
   * Bootstrap services.
   *
   * @return void
   */
  public function boot()
  {
    View::composer('front.layouts.header', function ($view) {
      $menuDestinations = Destination::where('status', 1)->inRandomOrder()->limit(24)->get();
      $view->with('menuDestinations', $menuDestinations);
    });
  }
}
