<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
  /**
   * Register any application services.
   */
  public function register(): void
  {
    //
  }

  /**
   * Bootstrap any application services.
   */
  public function boot(): void
  {
    Gate::define('superadmin', function (User $user) {
      return  $user->level === 'superadmin';
    });

    Gate::define('owner', function (User $user) {
      return  $user->level === 'owner';
    });

    Gate::define('kasir', function (User $user) {
      return  $user->level === 'kasir';
    });
  }
}
