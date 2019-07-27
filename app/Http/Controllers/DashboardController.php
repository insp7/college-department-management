<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //
    public function index(){

        $user = Auth::user();

        if($user->hasRole('Admin')){
            return view('dashboard.admin')->with(
                [
                    'user' => $user,
                ]
            );;
        }elseif ($user->hasRole('Staff')){
            return view('dashboard.staff')->with(
                [
                    'user'=>$user,
                ]
            );
        }elseif ($user->hasRole('Student')){
            return view('dashboard.student')->with(
                [
                    'user' => $user,
                ]
            );;
        }else{
            abort(404);
        }
    }
}
