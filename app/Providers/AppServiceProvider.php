<?php

namespace App\Providers;

use App\Models\Table;
use App\Models\Restaurant;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
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
        View::composer(['member.sidebar', 'member.reservation.index'], function ($view) {
            $user = Auth::user();
            $user_id = $user->id;

            $restaurants = Restaurant::where('user_id', $user_id)->get(['id']);

            $reservations = [];

            foreach ($restaurants as $restaurant) {
                $restaurant_id = $restaurant->id;

                $tables = Table::where('restaurant_id', $restaurant_id)->get(['id']);

                foreach ($tables as $table) {
                    $table_id = $table->id;

                    $reservations = array_merge($reservations, Reservation::where('table_id', $table_id)->get()->toArray());
                }
            }

            $reservation_count = count($reservations);

            $view->with('reservation_count', $reservation_count);
        });
    
    }
}
