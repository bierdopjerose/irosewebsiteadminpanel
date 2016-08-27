@extends('main')

@section('content')

    <div class="row ticket-message">
        <div class="col-md-3 ticket-info">
            <h2>{{$ticket->title}}</h2>
            {!! $ticket->closed ? '<span style="background-color: red;" class="ticket-status">closed</span>':
                                             '<span style="background-color: green;" class="ticket-status">open</span>'!!}
            <ul>
                <li><strong>Department: </strong> {{$ticket->department}}</li>
                <li></li>
                <li><strong>Account:</strong> {{$ticket->Account}}</li>
                <li><strong>IP:</strong> {{$ticket->ip}}</li>

            </ul>

            <form role="form" method="post" action="/closeticket/{{$ticket->id}}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <button type="submit" class="btn btn-danger">close ticket</button>
            </form>
        </div>
        <div class="col-md-9">
            @foreach($messages as $message)
                <div {!! $message->replygm ? 'style="background-color: #e0e0e0;"' : ''!!} class="message">
                    {!! nl2br(e($message->message)) !!}
                </div>
            @endforeach

            <form role="form" method="post" action="/replyticket/{{$ticket->id}}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <textarea rows="10" class="form-control" name="message" placeholder="Enter reply here"></textarea>
                </div>
                {{$errors->error->first('error')}}
                <button type="submit" class="btn btn-primary">Reply</button>
            </form>
        </div>
    </div>

@endsection