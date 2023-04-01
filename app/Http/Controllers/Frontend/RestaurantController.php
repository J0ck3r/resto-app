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
        // Calculate Star count
        $five_star_ratings = $testimonials->filter(function($testimonial)
        {
            return $testimonial->rating == 5;
        })->count();
        $four_star_ratings = $testimonials->filter(function($testimonial)
        {
            return $testimonial->rating == 4;
        })->count();
        $three_star_ratings = $testimonials->filter(function($testimonial)
        {
            return $testimonial->rating == 3;
        })->count();
        $two_star_ratings = $testimonials->filter(function($testimonial)
        {
            return $testimonial->rating == 2;
        })->count();
        $one_star_ratings = $testimonials->filter(function($testimonial)
        {
            return $testimonial->rating == 1;
        })->count();
        // Calculate Star percentage
        $five_star_percent = round(($five_star_ratings * 100) / $count);
        $four_star_percent = round(($four_star_ratings * 100) / $count);
        $three_star_percent = round(($three_star_ratings * 100) / $count);
        $two_star_percent = round(($two_star_ratings * 100) / $count);
        $one_star_percent = round(($one_star_ratings * 100) / $count);
        // Calculate number of filled stars and percentage of last star
        $percent = round($avg_rating * 20);
       // dd($count, $five_star_percent);
        return view('restaurants.show', compact('menus', 'testimonials', 'restaurants', 'avg_rating', 'count', 'percent', 'five_star_percent', 'four_star_percent', 'three_star_percent', 'two_star_percent', 'one_star_percent'));
    }
}
