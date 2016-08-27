<?php

$tickets = \App\Ticket::all();
$opentickets = \App\Ticket::where('closed', false)->get();
$pendingtickets = \App\Ticket::where('replied', false)->get();

?>

@extends('main')

@section('content')

    <div class="row tickets">
        <div class="col-md-3">
            <ul class="nav nav-pills nav-stacked">
                <li><a data-toggle="tab" href="#menu1">New/updatet tickets ({{$pendingtickets->count()}})</a></li>
                <li><a data-toggle="tab" href="#menu2">Open tickets</a></li>
                <li><a data-toggle="tab" href="#menu3">All Tickets</a></li>
            </ul>
        </div>
        <div class="col-md-9">
            <div class="tab-content">
                <div id="menu1" class="tab-pane fade">
                    @foreach($pendingtickets as $ticket)
                        <a href="/ticket/{{$ticket->id}}">
                            <div class="ticket">
                                <table>
                                    <tr>
                                        <td>{{$ticket->id}}</td>
                                        <td>
                                            {!! $ticket->closed ? '<span style="background-color: red;" class="ticket-status">closed</span>':
                                             '<span style="background-color: green;" class="ticket-status">open</span>'!!}
                                        </td>
                                        <td>
                                            <h1>{{$ticket->title}}</h1>
                                            <h2>{{$ticket->department}}</h2>
                                        </td>
                                        <td>
                                            <h3>{{$ticket->Account}}</h3>
                                        </td>
                                        <td>
                                            <h4>{{$ticket->created_at}}</h4>
                                        </td>
                                    </tr>
                                </table>


                            </div>
                        </a>
                    @endforeach
                </div>
                <div id="menu2" class="tab-pane fade">
                    @foreach($opentickets as $ticket)
                        <a href="/ticket/{{$ticket->id}}">
                            <div class="ticket">
                                <table>
                                    <tr>
                                        <td>{{$ticket->id}}</td>
                                        <td>
                                            {!! $ticket->closed ? '<span style="background-color: red;" class="ticket-status">closed</span>':
                                             '<span style="background-color: green;" class="ticket-status">open</span>'!!}
                                        </td>
                                        <td>
                                            <h1>{{$ticket->title}}</h1>
                                            <h2>{{$ticket->department}}</h2>
                                        </td>
                                        <td>
                                            <h3>{{$ticket->Account}}</h3>
                                        </td>
                                        <td>
                                            <h4>{{$ticket->created_at}}</h4>
                                        </td>
                                    </tr>
                                </table>


                            </div>
                        </a>
                    @endforeach
                </div>
                <div id="menu3" class="tab-pane fade">
                    @foreach($tickets as $ticket)
                        <a href="/ticket/{{$ticket->id}}">
                            <div class="ticket">
                                <table>
                                    <tr>
                                        <td>{{$ticket->id}}</td>
                                        <td>
                                            {!! $ticket->closed ? '<span style="background-color: red;" class="ticket-status">closed</span>':
                                             '<span style="background-color: green;" class="ticket-status">open</span>'!!}
                                        </td>
                                        <td>
                                            <h1>{{$ticket->title}}</h1>
                                            <h2>{{$ticket->department}}</h2>
                                        </td>
                                        <td>
                                            <h3>{{$ticket->Account}}</h3>
                                        </td>
                                        <td>
                                            <h4>{{$ticket->created_at}}</h4>
                                        </td>
                                    </tr>
                                </table>


                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection