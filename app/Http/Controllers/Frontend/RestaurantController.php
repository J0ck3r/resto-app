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
        return view('restaurants.show', compact('menus', 'testimonials', 'restaurants'));
    }
}
