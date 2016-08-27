<?php
$job = array(
        0 => 'Visitor',
        111 => 'Soldier',
        121 => 'Knight',
        122 => 'Champ',
        211 => 'Muse',
        221 => 'Mage',
        222 => 'Cleric',
        311 => 'Hawker',
        321 => 'Raider',
        322 => 'Scout',
        411 => 'Dealer',
        421 => 'Bourg',
        422 => 'Artisan'
);
$account = \App\UserInfo::find('bierdopje');
$user = session('account');
?>

@extends('main')

@section('content')
    <div class="row border">
        <div class="col-md-12">
            <h1>User management</h1>
            <form method="post" action="/searchuser" role="form">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <label for="account">Account:</label>
                    <input type="text" class="form-control" id="account" name="account" required>
                </div>
                <button type="submit" class="btn btn-primary">search</button>
            </form>
        </div>
    </div>

    <div class="row">
        @if(isset($user))
            <div class="col-md-12 user-panel">

                <div class="row">
                    <h1>
                        @if($user->Right > 1)
                            [GM {{$user->Right}}]
                        @elseif($user->Right < 1)
                            [BANNED]
                        @endif
                        {{$user->Account}}
                    </h1>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <h2>Account info</h2>
                        <ul>
                            <li><h3>Name: </h3>{{$user->FirstName}} {{$user->LastName}}</li>
                            <li><h3>Birthday: </h3>{{$user->Birthday}}</li>
                            <li><h3>Email: </h3>{{$user->Email}}</li>
                            <li><h3>Security: </h3>{{$user->answer}}</li>
                            <li><h3>Beta: </h3>{{$user->AllowBeta}}</li>
                            <li><h3>IP: </h3>{{$user->ip}}</li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <h2>Change access</h2>
                        <form method="post" action="">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button type="submit" class="btn btn-danger">ban</button>
                        </form>
                        <form method="post" action="">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button type="submit" class="btn btn-info">unban</button>
                        </form>

                        @if($account->Right == 768)
                            <form method="post" action="">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="form-group">
                                    <label for="level">Admin level:</label>
                                    <select name="level" class="form-control">
                                        <option value="256">256</option>
                                        <option value="512">512</option>
                                        <option value="768">768</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="tag">Tag prefix:</label>
                                    <select name="tag" class="form-control">
                                        <option value="[EVENT]">[EVENT]</option>
                                        <option value="[DEV]">[DEV]</option>
                                        <option value="[GM]">[GM]</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="character">Character:</label>
                                    <input type="text" class="form-control" id="account" name="character"
                                           placeholder="character" required>
                                </div>
                                <button type="submit" class="btn btn-warning">make staff member</button>
                            </form>
                        @endif
                    </div>
                    <div class="col-md-4">
                        <h2>Change account</h2>
                        <form method="post" action="">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                                <label for="password">Change password:</label>
                                <input type="text" class="form-control" id="account" name="password"
                                       placeholder="password" required>
                            </div>
                            <button type="submit" class="btn btn-default">change password</button>
                        </form>
                    </div>
                </div>

                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Char name</th>
                        <th>Level</th>
                        <th>Class</th>
                        <th>Zullie</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach(\App\Avatar::where('txtACCOUNT', $user->Account)->get() as $char)
                        <tr>
                            <td>{{$char->txtNAME}}</td>
                            <td>{{$char->btLEVEL}}</td>
                            <td>{{$job[$char->intJOB]}}</td>
                            <td>{{$char->intMoney}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection