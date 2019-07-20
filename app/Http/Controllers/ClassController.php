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
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;

class ClassController extends Controller
{

    protected $classService;
    protected $studentService;

    public function __construct(ClassService $classService, StudentService $studentService)
    {
        $this->classService = $classService;
        $this->studentService = $studentService;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        activity()->log('Look mum, I logged something');
        return view('class.manage-classes');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('class.add-class');
    }

    public function createClassStudents($id){
        //
        try {

            $class= Classs::findOrFail($id);

            return view('class.add-class-students')->with([
                'class' => $class
            ]);

        }catch (Exception $exception) {
            return redirect()->back()->with([
                'type' => 'danger',
                'title' => 'Failed to open Add students form',
                'message' => "There was some issue in showing add class students form"
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validatedData=$request->validate([
            'year' => 'required|numeric',
        ]);

        try {
            $class = $this->classService->store($validatedData, Auth::id());

            /*LOG ACTIVITY*/
            activity()
                ->causedBy(Auth::user())
                ->withProperties([
                    'date' => Carbon::now()->toDateTimeString(),
                    'title' => 'Class Added',
                ])
                ->log("Class $class->year added");


            return redirect('/classes')->with([
                'type' => 'success',
                'title' => 'Class added successfully',
                'message' => 'The given Class has been added successfully'
            ]);
        }catch (Exception $exception) {
            return redirect()->back()->with([
                'type' => 'danger',
                'title' => 'Failed to add the Class',
                'message' => "There was some issue in adding the class"
            ]);
        }

    }

    public function storeClassStudents($id, Request $request){
        $request->validate([
            'students-sheet' => 'required|mimes:xlsx',
        ]);



        try {
            Excel::import(new StudentsImport($id), request()->file('students-sheet'));

            return redirect('/classes/'.$id)->with([
                'type' => 'success',
                'title' => 'Class Students added successfully',
                'message' => 'The given Students has been added successfully'
            ]);
        }catch (Exception $exception) {
            return redirect()->back()->with([
                'type' => 'danger',
                'title' => 'Failed to add the Class Students',
                'message' => "There was some issue in adding the class Students"
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        try {

            $class= Classs::findOrFail($id);

            return view('class.view-class')->with([
                'class' => $class
            ]);

        }catch (Exception $exception) {
            return redirect()->back()->with([
                'type' => 'danger',
                'title' => 'Failed to show the Class',
                'message' => "There was some issue in showing the class"
            ]);
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //fetch the published according to id and auth::id
        //$gst = $this->gstService->get($id);
        //        return view('gsts.edit-gst')->with([
        //            'gst' => $gst
        //        ]);
        return view('published-books.edit-published-book');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validatedData=$request->validate([
            'state_name' => 'required|max:255|regex:/[a-zA-Z]+$/',
            'code' => 'required|numeric|unique:states,code,'.$id
        ]);

        try {
            $this->stateService->edit($validatedData, $id, Auth::id);
            return redirect('/published-books')->with([
                'type' => 'success',
                'title' => 'Published Book added successfully',
                'message' => 'The given Published Book has been added successfully'
            ]);
        } catch (Exception $exception) {
            return redirect()->back()->with([
                'type' => 'danger',
                'title' => 'Published Book added successfully',
                'message' => 'The given Published Book has been added successfully'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        try {
            $this->publishedBookService->delete($id,Auth::id());
            return redirect()->back()->with([
                'type' => 'success',
                'title' => 'Published Book Deleted successfully',
                'message' => 'The given Published Book has been deleted successfully'
            ]);
        } catch (Exception $exception) {
            return redirect()->back()->with([
                'type' => 'danger',
                'title' => 'Failed To Delete Published Book',
                'message' => 'Error in deleting Published Book'
            ]);
        }
    }

    /**
     * Returns the data for datatables.
     * @return mixed Resulting data in datatables.net format
     * @throws \Exception*
     */
    public function getClasses()
    {
        /*CURRENT USER PUBLISHED BOOKS*/
        $classes = $this->classService->getDatatable();

        return DataTables::of($classes)
            ->addColumn('edit', function(Classs $class) {
//                Redirect to page
                return '<button id="'.$class->id.'" class="edit fa fa-pencil-alt btn-sm btn-warning" data-toggle="modal" data-target="#editModal"></button>';
            })
            ->addColumn('delete', function(Classs $class) {
                return '<button id="'.$class->id.'" class="delete fa fa-trash btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal"></button>';
            })
            ->addColumn('view', function(Classs $class) {
                return '<a  class="view fa fa-search-plus btn-sm btn-success" href="/classes/'.$class->id.'"></a>';
            })
            ->rawColumns(['edit', 'delete', 'view'])
            ->make(true);
    }

    public function getClassStudents($id)
    {
        error_log('get class students called');
        try{
            $class = Classs::findOrFail($id);

            $students = $this->classService->getClassStudentsDatatable($class);

            error_log(json_encode($students));
            error_log('value of students/.........');
            return DataTables::of($students)
                ->addColumn('name', function(Student $student) {
//                Redirect to page
                    return $student->user->first_name.' '.$student->user->middle_name.' '.$student->user->last_name;
                })
                ->addColumn('email', function(Student $student) {
//                Redirect to page
                    return $student->user->email;
                })
                ->addColumn('edit', function(Student $student) {
//                Redirect to page
                    return '<button id="'.$student->id.'" class="edit fa fa-pencil-alt btn-sm btn-warning" data-toggle="modal" data-target="#editModal"></button>';
                })
                ->addColumn('delete', function(Student $student) {
                    return '<button id="'.$student->id.'" class="delete fa fa-trash btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal"></button>';
                })
                ->rawColumns(['edit', 'delete'])
                ->make(true);

        }catch (\Exception $exception){
            return redirect()->back()->with([
                'type' => 'danger',
                'title' => 'Failed To Delete Published Book',
                'message' => 'Error in deleting Published Book'
            ]);
        }




    }


}
