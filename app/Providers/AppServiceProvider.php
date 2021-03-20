<?php

namespace App\Providers;

use App\Models\Admin\Page;
use Illuminate\Support\ServiceProvider;

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
        $menus = Page::where('status', 1)->get();
        view()->share('menus', $menus);
    }
}
