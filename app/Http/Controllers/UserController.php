<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * A custom route that logs out the user and redirect him/her to the login page
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function logout()
    {

        Auth::logout();
        return Redirect('/login');
    }

    public function settings()
    {
        return view('user.settings');
    }

    public function myProfile()
    {

        return view('user.profile')->with(
            [
                'user' => Auth::user()
            ]);
    }
}
