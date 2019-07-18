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
            return view('dashboard.admin');
        }elseif ($user->hasRole('Staff')){
            return view('dashboard');
        }elseif ($user->hasRole('Student')){
            return view('dashboard');
        }else{
            abort(404);
        }
    }
}
