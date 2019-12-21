<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Reservation;
use Brian2694\Toastr\Facades\Toastr;

class ReservationController extends Controller
{
    public function index(){

       $reservations= Reservation::all();

       return view ('admin.reservation.index', compact('reservations'));
    }

    public function status ($id){
        $reservation = Reservation::find($id);

        $reservation->update([
            'status' => true
        ]);

        Toastr::success('Reservation successully confrimed', 'Success', ["positionClass" => "toast-top-right"]);

        return redirect()->back();
    }

    public function destroy($id){
        $reservation = Reservation::find($id);
        $reservation->delete();

        Toastr::success('Reservation requeste successfully deleted.', 'success',["positionClass" => "toast-top-right"] );

        return redirect()->back();
    }
}
