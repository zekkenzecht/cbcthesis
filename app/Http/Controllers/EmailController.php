<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
class EmailController extends Controller
{
    public function create()
    {
      return view('emails.create');
    }

    public function send(Request $request){
    $mailto = explode(',',$request->emailto);
      Mail::raw($request->content, function ($message) use ($mailto,$request) {
        foreach ($mailto as $key => $value) {
          $message->from($request->sender);
            $message->to($value);
        }

      });


      return "Your email has been sent successfully";
    }
}
