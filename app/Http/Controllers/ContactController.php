<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use Brian2694\Toastr\Facades\Toastr;

class ContactController extends Controller
{
    public function sendMessage(Request $request){
        $request->validate([
            'name'=> 'required',
            'email'=> 'required|email',
            'subject'=> 'required',
            'message'=> 'required',
        ]);

        Contact::create([
            'name'=>$request->input('name'),
            'email'=>$request->input('email'),
            'subject'=>$request->input('subject'),
            'message'=>$request->input('message')
        ]);

        Toastr::success('Message send successfully. We will contact with you shotly', 'Success', ["positionClass" => "toast-top-right"]);

        return redirect()->back();

    }
}
