<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reservation;
use Brian2694\Toastr\Facades\Toastr;

class ReservationController extends Controller
{
    public function reserve(Request $request){

        $request->validate([
            'name'=>'required',
            'phone'=>'required',
            'email'=>'required|email',
            'dateandtime'=>'required',
        ]);

        Reservation::create([
            'name'=> $request->input('name'),
            'phone'=> $request->input('phone'),
            'email'=> $request->input('email'),
            'date_and_time'=> $request->input('dateandtime'),
            'message'=> $request->input('message'),
            'status' => false
        ]);

        Toastr::success('Reservation request send successfully. We will confirm to you shotly', 'Success', ["positionClass" => "toast-top-right"]);

        return redirect()->back();

    }
}
