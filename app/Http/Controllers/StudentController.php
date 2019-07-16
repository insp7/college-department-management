<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Student;

class StudentController extends Controller
{
    //
    public function retriveClasses(Request $request){
        $results = DB::select('SELECT id,year FROM classes');
        return view('student.add-student')->with('results', $results);
    }
    
    public function show(){
        return view("student.add-student");
    }
    public function store(Request $request){
        try {

            //dd($request->all());
            $name = explode(' ', $request['name']);
            $code = substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 6)), 0, 8);//randomly genrating string


            DB::beginTransaction();

            $user = User::create([
                'email' => $request['email'],
                'first_name' => $name[1],
                'last_name' => $name[0],
                'middle_name' => $name[2],
                'password' => Hash::make($code),
                'created_by' => Auth::id(),
                'additional_columns' => $code,//additional_columns has unhashed password
            ]);

            $user->assignRole('Student');

            Student::create([
                'roll_no' => $request['roll_no'],
                'created_by' => 1,
                'class_id' => $request['select-class'],
                'user_id' => $user->id
            ]);

            DB::commit();

            return redirect()->action('StudentController@retriveClasses')->with([
                'type' => 'success',
                'title' => 'Student added successfully',
                'message' => 'The Student has been added successfully'
            ]);
        }catch (Exception $exception) {

            return redirect()->back()->with([
                'type' => 'danger',
                'title' => 'Failed to add the Student',
                'message' => "There was some issue in adding the Student"
            ]);
        }
        //return view('student.add-student');

    }


}

