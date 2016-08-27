@extends('main')

@section('content')
    <div class="row news">
        <div class="col-md-4">
            <form role="form" method="post" action="/editnews">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <select name="id" class="form-control" >
                        @foreach($news as $item)
                            <option value="{{$item->id}}">{{$item->title}}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Edit</button>
            </form>
        </div>
    </div>
    <div class="row">
        <h1>New news message</h1>
        <form method="post" action="/news" role="form">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
                <input class="form-control" type="text" name="title" placeholder="title" required>
            </div>
            <div class="form-group">
                <select class="form-control" name="type">
                    <option value="update">update</option>
                    <option value="notice">notice</option>
                    <option value="event">event</option>
                </select>
            </div>
            <div class="form-group">
                <input class="form-control" type="text" id="birthdate" name="publish" placeholder="publish on" required>
            </div>
            <div class="form-group">
                <textarea class="form-control" rows="20" name="body" required placeholder="News message (HTML is allowed)"></textarea>
            </div>
            {{session('message')}}
            <button type="submit" class="btn btn-primary">Place</button>
        </form>
    </div>

    <script>
        $( function() {
            $( "#birthdate" ).datepicker({
                yearRange: "-110:+50",
                changeMonth: true,
                changeYear: true
            });
        } );
    </script>
@endsection