<?php

namespace App\Http\Controllers;

use App\Betakey;
use App\Betareservation;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class BetaController extends Controller
{
   function accept($email) {
       $res = Betareservation::find($email);
       $key = Betakey::where('used', false)->get()->first();

       if(isset($res)) {
           $res->accepted = true;
           $res->check = true;

           if($res->save()) {
               Mail::send('emails.betakey', ['key' => $key], function ($m) use ($email) {
                   $m->from('noreply@revisedonline.com', 'Rose Revised');

                   $m->to($email)->subject('Your beta key is here');
               });

               $key->used = true;
               $key->save();

           }
       }
       return back();
   }
}
