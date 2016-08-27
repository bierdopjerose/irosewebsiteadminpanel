<?php

namespace App\Http\Controllers;

use App\Ticket;
use App\Ticketmessage;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class TicketController extends Controller
{
   function ticket($id) {
       $ticket = Ticket::find($id);
       $messages = Ticketmessage::where('ticketid', $id)->get();

       return view('pages.ticket')
           ->with('ticket', $ticket)
           ->with('messages', $messages);
   }

   function reply($id) {
       $message = new Ticketmessage();
       $message->ticketid = $id;
       $message->message = Input::get('message');
       $message->replygm = true;

       if($message->save()) {
           $ticket = Ticket::find($id);
           $ticket->replied = true;

           $ticket->save();

           return back();
       }

       return back()
           ->withErrors(array('error' => 'An error occured'), 'error');
   }

   function close($id) {
       $ticket = Ticket::find($id);

       $ticket->closed = true;
       $ticket->replied = true;

       if($ticket->save()) {
           return back();
       }

   }
}
