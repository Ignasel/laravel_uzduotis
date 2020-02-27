<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Gate::define('updateTask', function ($user, $todo) {
            return $user->id === $todo->userID;
        });

        Gate::define('deleteTask', function ($user, $todo) {
            return $user->id === $todo->userID;
        });
    }
}
