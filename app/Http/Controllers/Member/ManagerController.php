<?php

namespace App\Http\Controllers\Member;

use App\Models\Manager;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        {
            $managers = Manager::all();
            return view('member.managers.index', compact('managers'));
        }
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Manager $manager)
    {
        $restaurants = Restaurant::all();
        return view('member.managers.edit', compact('manager', 'restaurants'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Manager $manager)
    {
        $request->validate([
            'name' => 'required',
            'town' => 'required'
        ]);
        $manager->update([
            'name' => $request->name,
            'town' => $request->town
        ]);

        if($request->has('restaurants'))
        {
            $manager->restaurants()->sync($request->restaurants);
        }

        return to_route('member.managers.index')->with('success', 'Manager updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Manager $manager)
    {
        $manager->restaurants()->detach();
        $manager->user_id->delete();

        return to_route('member.manager.index')->with('danger', 'Manager deleted successfully');
    }
}
