<?php

namespace App\Http\Controllers;

use App\UserInfo;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class AccountController extends Controller
{
    function search() {
        return back()
            ->with('account', UserInfo::find(Input::get('account')));
    }

    function ban($account) {
        $user = UserInfo::find($account);

        if(isset($user)) {
            $user->Right = 0;
        }
    }


}
