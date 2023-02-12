<?php

namespace App\Http\Controllers\Member;

use Carbon\Carbon;
use App\Models\Table;
use App\Enums\TableStatus;
use App\Models\Restaurant;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ReservationStoreRequest;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $user_id = $user->id;

        $restaurants = Restaurant::where('user_id', $user_id)->get(['id']);

        $reservations = [];

        foreach ($restaurants as $restaurant) 
        {
            $restaurant_id = $restaurant->id;
    
            $tables = Table::where('restaurant_id', $restaurant_id)->get(['id']);

        foreach ($tables as $table) 
        {
            $table_id = $table->id;

            $reservations[] = Reservation::where('table_id', $table_id)->get();
        }
        }

            return view('member.reservation.index', ['reservations' => $reservations]);
        }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tables = Table::where('status', TableStatus::Avaliable)->get();
        return view('member.reservation.create', compact('tables'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReservationStoreRequest $request)
    {
        $table = Table::findOrFail($request->table_id);
        if($request->guest_count > $table->guest_count)
        {
            return back()->with('warning', 'Please choose the table base on guests.');
        }
        $request_date = Carbon::parse($request->res_date);
        foreach ($table->reservations as $res)
        {
            if($res->res_date->format('Y-m-d') == $request_date->format('Y-m-d'))
            {
                return back()->with('warning', 'This table is reserved for this day');
            }
        }
        Reservation::create($request->validated());

        

        return to_route('member.reservation.index')->with('success', 'Reservation created successfully');
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
    public function edit(Reservation $reservation)
    {
        $tables = Table::where('status', TableStatus::Avaliable)->get();
        return view('member.reservation.edit', compact('reservation', 'tables'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ReservationStoreRequest $request, Reservation $reservation)
    {
        $table = Table::findOrFail($request->table_id);
        if($request->guest_count > $table->guest_count)
        {
            return back()->with('warning', 'Please choose the table base on guests.');
        }
        $request_date = Carbon::parse($request->res_date);
        $reservations = $table->reservations()->where('id', '!=', $reservation->id)->get();
        foreach ($reservations as $res)
        {
            if($res->res_date->format('Y-m-d') == $request_date->format('Y-m-d'))
            {
                return back()->with('warning', 'This table is reserved for this day');
            }
        }
        $reservation->update($request->validated());

        return to_route('member.reservation.index')->with('success', 'Reservation updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservation $reservation)
    {
        $reservation->delete();

        return to_route('member.reservation.index')->with('warning', 'Reservation deleted successfully');
    }
}
