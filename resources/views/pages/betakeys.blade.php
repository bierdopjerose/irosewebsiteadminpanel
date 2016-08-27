<?php

$accounts = \App\UserInfo::where('AllowBeta', true)->get();
$keys = \App\Betareservation::all();
$pendingkeys = \App\Betareservation::where('check', false)->get();

?>

@extends('main')

@section('content')

    <div class="row betakeys">
        <div class="col-md-3">
            <ul class="nav nav-pills nav-stacked">
                <li><a data-toggle="tab" href="#menu1">New/updatet beta reservations ({{$pendingkeys->count()}})</a>
                </li>
                <li><a data-toggle="tab" href="#menu2">All beta reservations</a></li>
                <li><a data-toggle="tab" href="#menu3">Beta accounts</a></li>
            </ul>
        </div>

        <div class="col-md-9">
            <div class="tab-content">
                <div id="menu1" class="tab-pane fade">
                    @foreach($pendingkeys as $key)
                        <div class="betakey">

                            <div id="reason" class="panel panel-primary">
                                <div class="panel-heading"><h2>{{$key->Email}}</h2></div>
                                <div class="panel-body">{!!  nl2br(e($key->reason)) !!}</div>
                                <div class="panel-footer">
                                    <table>
                                        <tr>
                                            <td style="padding-right: 10px">
                                                <form role="form" method="post" action="/betakeyaccept/{{$key->Email}}">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <button type="submit" class="btn btn-success">Accept</button>
                                                </form>
                                            </td>

                                            <td>
                                                <form>
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <button type="submit" class="btn btn-danger">Reject</button>
                                                </form>
                                            </td>

                                        </tr>
                                    </table>
                                </div>
                            </div>

                        </div>
                    @endforeach
                </div>
                <div id="menu2" class="tab-pane fade">
                    @foreach($keys as $key)
                        <div class="betakey">

                            <div id="reason" class="panel panel-primary">
                                <div class="panel-heading"><h2>{{$key->Email}}</h2></div>
                                <div class="panel-body">{!!  nl2br(e($key->reason)) !!}</div>
                                <div class="panel-footer">
                                    @if(!$key->check)
                                        <table>
                                            <tr>
                                                <td style="padding-right: 10px">
                                                    <form role="form" method="post"
                                                          action="/betakeyaccept/{{$key->Email}}">
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                        <button type="submit" class="btn btn-success">Accept</button>
                                                    </form>
                                                </td>

                                                <td>
                                                    <form>
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                        <button type="submit" class="btn btn-danger">Reject</button>
                                                    </form>
                                                </td>

                                            </tr>
                                        </table>
                                    @elseif($key->accepted)
                                        <span class="green">ACCEPTED</span>
                                    @else
                                        <span class="red">REJECTED</span>
                                    @endif
                                </div>
                            </div>

                        </div>
                    @endforeach
                </div>
                <div id="menu3" class="tab-pane fade">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Account</th>
                            <th>Email</th>
                            <th>IP</th>
                        </tr>
                        </thead>
                        <tbody>
                    @foreach($accounts as $account)
                        <tr>
                            <td>{{$account->Account}}</td>
                            <td>{{$account->Email}}</td>
                            <td>{{$account->ip}}</td>
                        </tr>
                    @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection