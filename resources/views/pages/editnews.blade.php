@extends('main')

@section('content')
    <div class="row editnews">
        <form method="post" action="/news/{{$news->id}}" role="form">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
                <input class="form-control" type="text" name="title" placeholder="title" value="{{$news->title}}"
                       required>
            </div>
            <div class="form-group">
                <select class="form-control" name="type">
                    <option {{$news->type == 'update' ? 'selected' : ''}} value="update">update</option>
                    <option {{$news->type == 'notice' ? 'selected' : ''}} value="notice">notice</option>
                    <option {{$news->type == 'event' ? 'selected':''}} value="event">event</option>
                </select>
            </div>
            <div class="form-group">
                <input class="form-control" type="text" id="birthdate" name="publish" value="{{$news->publish}}"
                       required>
            </div>
            <div class="form-group">
                <textarea class="form-control" rows="20" name="body" required>{{$news->body}}</textarea>
            </div>
            {{session('message')}}
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection