<?php

namespace App\Providers;

use App\Model\Categoryitem;
use App\Model\ChartItem;
use App\Model\Item;
use Facade\FlareClient\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
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
        //
        $category = Categoryitem::all();
        $item = Item::with('itemhasimages')->limit(3)->get();
        $latest = Item::with('itemhasimages')->first();
        //return $latest;
        view()->share(['Category' => $category, 'Item' => $item, 'Latest' => $latest,]);
        Schema::defaultStringLength(191);
    }
}
