<?php

namespace App\Http\Controllers\Member;

use App\Models\Reservation;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{
    public function index()
{
    return view('member.index');
}

    public function count()
    {
        $reservations = Reservation::all();
        $reservation_count = $reservations->count();
        return view('member.sidebar', compact('reservation_count'));
    }
}
