<?php

namespace App\Http\Controllers;

use App\Services\StudentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    //
    protected $studentService;

    public function __construct(StudentService $studentService)
    {
        $this->studentService = $studentService;
    }
    public function retriveClasses(Request $request){
        $results = DB::select('SELECT id,year FROM classes');
        return view('student.add-student')->with('results', $results);
    }

    public function show(){
        return view("student.add-student");
    }
    public function store(Request $request){

        $validatedData = $request->validate([
            'name' => 'required|max:100',
            'email' => 'required|email|unique:users',
            'roll_no' => '',
            'select-class' => ''
        ]);

        try {
            $this->studentService->create($validatedData,Auth::id());
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
    public function destroy($id)
    {
        try {
            $this->studentService->delete_student($id, Auth::id());
            return redirect()->back()->with([
                'type' => 'success',
                'title' => 'Student Deleted successfully',
                'message' => 'The given Event has been deleted successfully'
            ]);
        } catch (Exception $exception) {
            return redirect()->back()->with([
                'type' => 'danger',
                'title' => 'Failed To Delete Student',
                'message' => 'Error in deleting Event'
            ]);
        }
    }
}

