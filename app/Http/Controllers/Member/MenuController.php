<?php

namespace App\Http\Controllers\Member;

use App\Models\Menu;
use App\Models\Category;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\MenuStoreRequest;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        {
            $restaurants = Restaurant::where('user_id', Auth::user()->id)->get();
            $menus = Menu::withTrashed()->get();

            $nonDeletedMenus = $menus->reject(function($menu) 
            { 
                // Separate non-deleted menus
                return $menu->deleted_at != null;
            });

            $softDeletedMenus = $menus->filter(function($menu) 
            { 
                // Separate soft-deleted menus
                return $menu->deleted_at != null;
            });

            return view('member.menus.index', compact('menus', 'restaurants', 'nonDeletedMenus', 'softDeletedMenus'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $restaurants = Restaurant::where('user_id', Auth::user()->id)->get();
        $categories = Category::all();
        $menus = Menu::all();
        return view('member.menus.create', compact('categories', 'restaurants'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MenuStoreRequest $request)
    {
        $image = $request->file('image')->store('public/menus');
        $menu = Menu::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $image,
            'restaurant_id' => $request->restaurant_id
        ]);

        if($request->has('categories'))
        {
            $menu->categories()->attach($request->categories);
        }

        return to_route('member.menus.index')->with('success', 'Menu created successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        $categories = Category::all();
        return view('member.menus.edit', compact('menu', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required'
        ]);
        $image = $menu->image;
        if($request->hasFile('image'))
        {
            Storage::delete($menu->image);
            $image = $request -> file('image')->store('public/menus');
        }
        $menu->update([
            'name' => $request->name,
            'description' => $request->description,
            'image'=> $image,
            'price' => $request->price
        ]);

        if($request->has('categories'))
        {
            $menu->categories()->sync($request->categories);
        }

        return to_route('member.menus.index')->with('success', 'Menu updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        // check if the menu is already soft deleted
        $isSoftDeleted = $menu->trashed();

        // detach the categories
        $menu->categories()->detach();

        // soft delete the menu
        $menu->delete();

        // restore or permanently delete link
        $link = '';
        if ($isSoftDeleted) {
            $link = '<a href="' . route('member.menus.restore', $menu->id) . '">Restore</a> | 
                    <a href="' . route('member.menus.force-delete', $menu->id) . '">Permanently Delete</a>';
        }

        return redirect()->route('member.menus.index')->with('danger', 'Menu deleted successfully. ' . $link);
    }

    public function restore($id)
    {
        $menu = Menu::withTrashed()->findOrFail($id);
        $menu->restore();

        return redirect()->route('member.menus.index')->with('success', 'Menu restored successfully');
    }

    public function forceDelete($id)
    {
        $menu = Menu::onlyTrashed()->findOrFail($id);
        Storage::delete($menu->image);
        $menu->forceDelete();
        
        return redirect()->route('member.menus.index')->with('success', 'Menu permanently deleted');
    }
}
