<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\StudentFurtherStudies;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Services\StudentFurtherStudiesService;
use Yajra\DataTables\Facades\DataTables;

class StudentFurtherStudiesController extends Controller
{
    protected $studentfurtherstudiesservice;

    public function __construct(StudentFurtherStudiesService $studentfurtherstudiesservice)
    {
        $this->studentfurtherstudiesservice = $studentfurtherstudiesservice;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('student-further-studies.manage-furtherstudies');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('student-further-studies.add-furtherstudies');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->has('type')){
            if($request->has('obtained') && $request->has('outof')){
                $validatedData = $request->validate([
                    'hasOpted' => 'boolean',
                    'type' => 'nullable',
                    'hasGiven' => 'boolean',
                    'obtained' => 'nullable',
                    'outof' => 'nullable',
                ]);
            }
            else if($request->hasGiven == '0'){
                $validatedData = $request->validate([
                    'hasOpted' => 'boolean',
                    'type' => 'nullable',
                    'hasGiven' => 'boolean',
                ]);
            }
            else{
                $validatedData = $request->validate([
                    'hasOpted' => 'boolean',
                    ]);
            }
        }

        try {
            $student_furtherstudies = $this->studentfurtherstudiesservice->create($validatedData, Auth::id());

            /*LOG ACTIVITY*/
            activity()
                ->causedBy(Auth::user())
                ->withProperties([
                    'date' => Carbon::now()->toDateTimeString(),
                    'title' => 'Student Further Studies Added',
                ])
                ->log('StudentFurtherStudies $student_furtherstudies->type added');

            return redirect('/student-further-studies')->with([
                'type' => 'success',
                'title' => 'Student Further Studies added successfully',
                'message' => 'The Student Further Studies Information has been added successfully'
            ]);
        } catch (Exception $exception) {

            return redirect()->back()->with([
                'type' => 'danger',
                'title' => 'Failed to add the Student Further Studies',
                'message' => "There was some issue in adding the Student Further Studies Information"
            ]);
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\StudentFurtherStudies
     * @return \Illuminate\Http\Response
     */
    public function show(StudentFurtherStudies $studentfurtherstudies)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\StudentFurtherStudies  $studentfurtherstudies
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $studentfurtherstudies=StudentFurtherStudies::find($id);
        return view('student-further-studies.edit-furtherstudies',['studentfurtherstudies'=>$studentfurtherstudies,'user'=>Auth::user()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\StudentFurtherStudies  $studentfurtherstudies
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
     
        $validatedData = $request->validate([
            'hasOpted' => 'boolean',
            'type' => 'nullable',
            'hasGiven' => 'boolean',
            'obtained' => 'nullable',
            'outof' => 'nullable',
        ]); 

        $updateSuccessful = $this->studentfurtherstudiesservice->update($validatedData, $id, Auth::id());

        if($updateSuccessful) {
            return redirect('/student-further-studies')->with([
                'type' => 'success',
                'title' => 'Student Further Studies updated successfully',
                'message' => 'The given Student Further Studies Information has been updated successfully'
            ]);
        }

        return redirect()->back()->with([
            'type' => 'danger',
            'title' => 'Failed to update the Student Further Studies',
            'message' => "There was some issue in updating the Student Further Studies Information"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\StudentFurtherStudies  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $this->studentfurtherstudiesservice->delete($id, Auth::id());
            return redirect()->back()->with([
                'type' => 'success',
                'title' => 'Student Further Studies Deleted successfully',
                'message' => 'The given Student Further Studies Information has been deleted successfully'
            ]);
        } catch (Exception $exception) {
            return redirect()->back()->with([
                'type' => 'danger',
                'title' => 'Failed To Delete Student Further Studies',
                'message' => 'Error in deleting Student Further Studies Information'
            ]);
        }
    }

    /**
     * Returns the data for datatables.
     * @return mixed Resulting data in datatables.net format
     * @throws \Exception*
     */
    public function getStudentFurtherStudies()
    {
        /*CURRENT Student Further Studies*/
        $studentfurtherstudies1 =$this->studentfurtherstudiesservice->getDatatable(Auth::id());

        return DataTables::of($studentfurtherstudies1)
            ->addColumn('edit', function (StudentFurtherStudies $studentfurtherstudies) {
            return '<button id="' . $studentfurtherstudies->id . '" class="edit fa fa-pencil-alt btn-sm btn-warning"></button>'
            ;})
            ->addColumn('delete', function (StudentFurtherStudies $studentfurtherstudies) {
                return '<button id="' . $studentfurtherstudies->id . '" class="delete fa fa-trash btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal"></button>';
            })
            ->rawColumns(['edit', 'delete'])
            ->make(true);
    }
}