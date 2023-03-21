<?php

namespace App\Http\Controllers\Member;

use App\Models\Restaurant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\RestaurantStoreRequest;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $count = Restaurant::select('*')->where('user_id', Auth::user()->id)->count();
        $restaurants = Restaurant::all();
        return view('member.restaurants.index', compact('restaurants', 'count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('member.restaurants.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RestaurantStoreRequest $request)
    {
        $image = $request -> file('image')->store('public/restaurants');

        $restaurant = Restaurant::create([
            'name' => $request->name,
            'description' => $request->description,
            'location' => $request->location,
            'image' => $image,
            'user_id' => $request->user_id,
            'open_time' => $request->open_time,
            'close_time' => $request->close_time
        ]);

        if($request->has('users'))
        {
            $restaurant->users()->attach($request->users);
        }

        return to_route('member.restaurants.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $restaurants = Restaurant::all();
        return view('member.restaurants.edit', compact('restaurants'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Restaurant $restaurant)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'location' => 'required'
        ]);
        $image = $restaurant->image;
        if($request->hasFile('image'))
        {
            Storage::delete($restaurant->image);
            $image = $request -> file('image')->store('public/restaurants');
        }
        $restaurant->update([
            'name' => $request->name,
            'description' => $request->description,
            'location'=> $request->location,
            'open_time' => $request->open_time,
            'close_time' => $request->close_time,
            'image'=> $image
        ]);

        return to_route('member.restaurants.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant)
    {
        Storage::delete($restaurant->image);
        $restaurant->delete();

        return to_route('member.restaurants.index');
    }
}
