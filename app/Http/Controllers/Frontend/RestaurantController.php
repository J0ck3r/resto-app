<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Menu;
use App\Models\Restaurant;
use App\Http\Controllers\Controller;
use SebastianBergmann\GlobalState\Restorer;

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
        $menus = Menu::where('restaurant_id', $restaurants)->get();
        return view('restaurants.show', compact('menus'));
    }
}
