<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Destination;

class FooterServiceProvider extends ServiceProvider
{
  public function boot()
  {
    // Share the destinations list with the footer
    View::composer('front.layouts.footer', function ($view) {
      // Fetch 14 random destinations
      $destinations = Destination::where('status', 1)
        ->inRandomOrder()
        ->limit(14)
        ->get();

      // Split into two groups: first 7 for Top Countries, next 7 for Study Abroad
      $topCountries = $destinations->take(7);
      $studyAbroad = $destinations->skip(7)->take(7);

      $view->with([
        'topCountries' => $topCountries,
        'studyAbroad' => $studyAbroad
      ]);
    });
  }
}
