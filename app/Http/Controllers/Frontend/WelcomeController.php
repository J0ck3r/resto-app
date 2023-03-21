<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Menu;
use App\Models\Category;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WelcomeController extends Controller
{
    public function index()
    {
        $restaurants = Restaurant::all();
        $specials = Category::where('name', 'specials')->first();
        $menus = Menu::all();
        return view('welcome', compact('specials', 'restaurants', 'menus'));
    }

    public function thankyou()
    {
        return view('thankyou');
    }
}
