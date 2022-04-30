<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            "name" =>"required",
            "email" =>"required|email",
            "subject" =>"required",
            "message" =>"required",
        ]);
        $msg =new  \App\Contact();
        $msg->name = $request->name;
        $msg->email = $request->email;
        $msg->subject = $request->subject;
        $msg->message = $request->message;
        $msg->save();
        Toastr::success("Message has been sent. We will be in touch shortly.",'Success',["positionClass" => "toast-top-center"]);
        return redirect()->back();
    }
}
