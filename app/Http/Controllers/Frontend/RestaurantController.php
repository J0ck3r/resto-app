<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Menu;
use App\Models\Restaurant;
use App\Http\Controllers\Controller;
use App\Models\Testimonial;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurants = Restaurant::all();
        return view('restaurants.index', compact('restaurants'));
    }

    public function show($restaurants)
    {
        $testimonials = Testimonial::where('restaurant_id', $restaurants)->get();
        $menus = Menu::where('restaurant_id', $restaurants)->get();
        $count = $testimonials->count('rating');
         // Calculate average rating
        $avg_rating = $testimonials->avg('rating');
        $avg_rating = number_format($avg_rating, 1);
        $max = 5;

        // Calculate number of filled stars and percentage of last star
        $percent = round($avg_rating * 20);
        //dd($percent, $avg_rating);
        return view('restaurants.show', compact('menus', 'testimonials', 'restaurants', 'avg_rating', 'count', 'percent', 'max'));
    }
}
