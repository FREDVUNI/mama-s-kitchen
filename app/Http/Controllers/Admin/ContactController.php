<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $messages = \App\Contact::all();
        return view("admin/message/index",compact("messages"));
    }
    public function show($message)
    {
        $msg = \App\Contact::FindOrFail($message);
        return view("admin/message/show",compact("msg"));

    }
    public function destroy(\App\Contact $message)
    {
        $message->delete();
        return redirect("admin/messages")->with("success","Message has been deleted.");

    }
}
