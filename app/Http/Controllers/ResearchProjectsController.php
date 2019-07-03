<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\ResearchProject;
use App\Services\ResearchProjectsService;
use Yajra\DataTables\Facades\DataTables;

class ResearchProjectsController extends Controller
{

    protected $researchProjectsService;

    public function __construct(ResearchProjectsService $researchProjectsService)
    {
        $this->researchProjectsService = $researchProjectsService;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('research-projects.manage-research-projects');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('research-projects.add-research-project');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'principal_investigator' => 'required',
            'grant_details' => 'required',
            'title' => 'required',
            'amount' => 'required|numeric',
            'year' => 'required|date'
        ]);

        try {
            $this->researchProjectsService->store($validatedData, Auth::id());
            return redirect('/research-projects')->with([
                'type' => 'success',
                'title' => 'Research Project added successfully',
                'message' => 'The given Research Project has been added successfully'
            ]);
        } catch (Exception $exception) {
            return redirect()->back()->with([
                'type' => 'danger',
                'title' => 'Failed to add the Research Project',
                'message' => "There was some issue in adding the Research Project"
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $id = $request->research_project;
        $research_project = ResearchProject::find($id);
        return view('research-projects.edit-research-project')->with('research_project', $research_project);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'principal_investigator' => 'required',
            'grant_details' => 'required',
            'title' => 'required',
            'amount' => 'required|numeric',
            'year' => 'required|date'
        ]);

        $updateSuccessful = $this->researchProjectsService->update($validatedData, $id, Auth::id());

        if($updateSuccessful) {
            return redirect('/research-projects')->with([
                'type' => 'success',
                'title' => 'Research Project updated successfully',
                'message' => 'The given Research Project has been updated successfully'
            ]);
        }

        return redirect()->back()->with([
            'type' => 'danger',
            'title' => 'Failed to update the Research Project',
            'message' => "There was some issue in updating the Research Project"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $this->researchProjectsService->delete($id, Auth::id());
            return redirect()->back()->with([
                'type' => 'success',
                'title' => 'Research Project Deleted successfully',
                'message' => 'The given Research Project has been deleted successfully'
            ]);
        } catch (Exception $exception) {
            return redirect()->back()->with([
                'type' => 'danger',
                'title' => 'Failed To Delete Research Project',
                'message' => 'Error in deleting Research Project'
            ]);
        }
    }

    /**
     * Returns the data for datatables.
     * @return mixed Resulting data in datatables.net format
     * @throws \Exception*
     */
    public function getResearchProjects()
    {
        /*CURRENT USER PUBLISHED BOOKS*/
        $researchProjects = $this->researchProjectsService->getDatatable(Auth::id());

        return DataTables::of($researchProjects)
            ->addColumn('edit', function (ResearchProject $researchProject) {
//                Redirect to page
                return '<button id="' . $researchProject->id . '" class="edit fa fa-pencil-alt btn-sm btn-warning" data-toggle="modal" data-target="#editModal"></button>';
            })
            ->addColumn('delete', function (ResearchProject $researchProject) {
                return '<button id="' . $researchProject->id . '" class="delete fa fa-trash btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal"></button>';
            })
            ->addColumn('date', function (ResearchProject $researchProject) {
                return date('F d, Y', strtotime($researchProject->created_at));
            })
            ->rawColumns(['edit', 'delete'])
            ->make(true);
    }
}