<?php

namespace App\Http\Controllers;

use App\Classs;
use App\Exports\StudentsExport;
use App\Imports\StudentsImport;
use App\PublishedBook;
use App\Services\ClassService;
use App\Services\PublishedBookService;
use App\Services\StudentService;
use App\Student;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;

class NotificationController extends Controller
{



    public function __construct()
    {

    }


    public function markAllAsRead(){
        Auth::user()
            ->unreadNotifications()
            ->markAsRead();

        return redirect()->back();
    }

}
