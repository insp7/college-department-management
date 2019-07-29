<?php

namespace App\Http\Controllers;

use App\Services\StaffService;
use App\Staff;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    protected $staffService;

    public function __construct(StaffService $staffService)
    {
        $this->staffService = $staffService;
    }
    //
    public function index(){

        $user = Auth::user();

        if($user->hasRole('Admin')){

            $staff_count=$this->staffService->getStaffGroupByDateOfJoiningInstitute();

            $years = array_keys($staff_count);
            error_log(json_encode($years));
            $counts = array_values($staff_count);
            return view('dashboard.admin')->with([
                'years' => $years,
                'counts' => $counts,
            ]);

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
            );
        }else{
            abort(404);
        }
    }
}
