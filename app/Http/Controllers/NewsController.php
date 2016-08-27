<?php

namespace App\Http\Controllers;

use App\Newsitem;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;


class NewsController extends Controller
{
    function getNewsPage() {
        $news = Newsitem::all();

        return view('pages.news')
            ->with('news', $news);
    }

    function create() {
        $news = new Newsitem();

        $news->type = Input::get('type');
        $news->title = Input::get('title');
        $news->body = Input::get('body');
        $news->publish = Input::get('publish');

        if($news->save())
            return back()
                ->with('message', "Succes!");
    }

    function update($id) {
        $news = Newsitem::find($id);

        $news->title = Input::get('title');
        $news->type = Input::get('type');
        $news->publish = Input::get('publish');
        $news->body = Input::get('body');

        if($news->save())
            return redirect('/news');
    }

    function editnews() {
        return view('pages.editnews')
            ->with('news', Newsitem::find(Input::get('id')));
    }


}
