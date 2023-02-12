<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\RestaurantStoreRequest;

class RestaurantController extends Controller
{
    public function index()
    {
        $restaurants = Restaurant::all();
        $users = User::all();
        return view('admin.restaurants.index', compact('restaurants', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('admin.restaurants.create', compact('users'));
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

        Restaurant::create([
            'user_id' => $request->user_id,
            'name' => $request->name,
            'description' => $request->description,
            'location' => $request->location,
            'image' => $image
        ]);

        return to_route('admin.restaurants.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurant $restaurant)
    {
        $users = User::all();
        return view('admin.restaurants.edit', compact('restaurant', 'users'));
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
            'location' => 'required',
            'user_id' => 'required'
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
            'image'=> $image,
            'user_id' => $request->user_id
        ]);
        return to_route('admin.restaurants.index');
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
        $restaurant->users()->detach();
        $restaurant->delete();

        return to_route('admin.restaurants.index');
    }
}
