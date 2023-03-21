<?php

namespace App\Http\Controllers\Member;

use App\Models\Table;
use App\Models\Restaurant;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\TableStoreRequest;
use Illuminate\Support\Facades\Validator;

class TableController extends Controller
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
            $tables = Table::all();
            return view('member.tables.index', compact('tables', 'restaurants'));
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
       
        return view('member.tables.create', compact('restaurants'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TableStoreRequest $request, Table $table)
{
    $table->table_number = $request->table_number;
    $validator = Validator::make($table->toArray(), [
        'table_number' => [
            'required',
            Rule::unique('tables')->where(function ($query) use ($request, $table) {
                return $query->where('restaurant_id', $request->restaurant_id)->where('id', '!=', $table->id);
            })
        ]
    ]);

    if ($validator->fails()) {
        return back()->withErrors($validator)->withInput();
    }

    $table->restaurant_id = $request->restaurant_id;
    $table->guest_count = $request->guest_count;
    $table->status = $request->status;
    $table->location = $request->location;
    $table->save();

    return to_route('member.tables.index')->with('success', 'Table created successfully');
}


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Table $table)
    {
        $restaurants = Restaurant::where('user_id', Auth::user()->id)->get();
        return view('member.tables.edit', compact('table', 'restaurants'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TableStoreRequest $request, Table $table)
    { 
        {
            $table->restaurant_id = $request->restaurant_id;
            $table->table_number = $request->table_number;
            $table->status = $request->status;
            $table->guest_count = $request->guest_count;
            $table->location = $request->location;

            // Validate the updated table_number
            $validator = Validator::make($table->toArray(), 
            ['table_number' => ['required',  Rule::unique('tables')->where(function ($query) use ($request, $table) 
            {
                return $query->where('restaurant_id', $request->restaurant_id)->where('id', '!=', $table->id)->whereNull('deleted_at');
            })
        ]
    ]);

            if ($validator->fails()) 
            {
                return back()->withErrors($validator)->withInput();
            }

            $table->save();
        } 
            return to_route('member.tables.index')->with('success', 'Table updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Table $table)
    {
        $table->delete();
        $table->reservations()->delete();

        return to_route('member.tables.index')->with('danger', 'Table deleted successfully');
    }
}
