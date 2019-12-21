<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Reservation;

class ReservationController extends Controller
{
    public function index(){

       $reservations= Reservation::all();

       return view ('admin.reservation.index', compact('reservations'));
    }
}
