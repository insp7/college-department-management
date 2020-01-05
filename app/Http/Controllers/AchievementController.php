<?php

namespace App\Http\Controllers;

use App\Services\SAchievementService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
use App\sachievement;
use App\sachievementimage;
use App\Constants\FileConstants;



class AchievementController extends Controller 
{



    protected $staffAchievementService;

    public function __construct(SAchievementService $staffAchievementService)
    {
        $this->staffAchievementService = $staffAchievementService;
    }




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('staff-achievements.manage-achievement');
    }

    public function showProfile() {
        return view('user.profile');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('staff-achievements.add-achievement');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'achievement_name' => 'required',
            'achievement_description' => 'required',
            'year' => 'required|min:4|max:4',
            'file'=> 'required'
        ]);
            $user_id = Auth::id();
            $attachments = $request->file();
            foreach ($attachments as $name => $attachment) {
            // The file name of the attachment
            $fileName = $user_id . '_' . $name . '_' . time() . '.' . $attachment->getClientOriginalExtension();
            // exact path on the current machine
            $destinationPath = public_path(FileConstants::STUDENT_Acheivements_ATTACHMENTS_PATH );
            // Moving the image
            $attachment->move($destinationPath, $fileName);
            // The relative path to the image
            $image_relative_path = FileConstants::STUDENT_Acheivements_ATTACHMENTS_PATH  . $fileName;
            }

        try {
            $staff_achievement=$this->staffAchievementService->store($validatedData,$image_relative_path, Auth::id());

            return redirect()->back()->with([
                'type' => 'success',
                'title' => 'Staff added successfully',
                'message' => 'The given achievement has been added successfully'
            ]);
        }catch (Exception $exception) {
            return redirect()->back()->with([
                'type' => 'danger',
                'title' => 'Failed to add the staff',
                'message' => "There was some issue in adding the achievement"
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        //
        $id = $request->sachievement;
        $sachievement = sachievement::find($id);
        return view('staff-achievements.edit-achievement')->with('sachievement', $sachievement);
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

        $validatedData = $request->validate([
            'achievement_name' => 'required',
            'achievement_description' => 'required',
            'year' => 'required|min:4|max:4'
        ]);
        $user_id = Auth::id();
            $attachments = $request->file();
            foreach ($attachments as $name => $attachment) {
            // The file name of the attachment
            $fileName = $user_id . '_' . $name . '_' . time() . '.' . $attachment->getClientOriginalExtension();
            // exact path on the current machine
            $destinationPath = public_path(FileConstants::STUDENT_Acheivements_ATTACHMENTS_PATH );
            // Moving the image
            $attachment->move($destinationPath, $fileName);
            // The relative path to the image
            $image_relative_path = FileConstants::STUDENT_Acheivements_ATTACHMENTS_PATH  . $fileName;
            }

        $updateSuccessful=$this->staffAchievementService->update($validatedData, $id, $image_relative_path,Auth::id());

        try {
            if ($updateSuccessful) {
                return redirect('/sachievement')->with([
                    'type' => 'success',
                    'title' => 'Achievement updated successfully',
                    'message' => 'The achievement has been updated successfully'
                ]);
            }
        }catch (Exception $exception) {
            return redirect()->back()->with([
                'type' => 'danger',
                'title' => 'Failed to update the achievement',
                'message' => "There was some issue in updating the achievement"
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
        try {
            $this->staffAchievementService->delete($id, Auth::id());
            return redirect()->back()->with([
                'type' => 'success',
                'title' => 'Achievement Deleted successfully',
                'message' => 'The given Ac has been deleted successfully'
            ]);
        } catch (Exception $exception) {
            return redirect()->back()->with([
                'type' => 'danger',
                'title' => 'Failed To Delete Research Project',
                'message' => 'Error in deleting Research Project'
            ]);
        }
    }

    public function getAchievements()
    {
        $staffAchievement = $this->staffAchievementService->getDatatable(Auth::id());

        return DataTables::of($staffAchievement)
            ->addColumn('edit', function (sachievement $sachievement) {
                return '<button id="' . $sachievement->id . '" class="edit fa fa-pencil-alt btn-sm btn-warning" data-toggle="modal" data-target="#editModal"></button>';
            })
            ->addColumn('delete', function (sachievement $sachievement) {
                return '<button id="' . $sachievement->id . '" class="delete fa fa-trash btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal"></button>';
            })
            ->addColumn('view', function (sachievement $sachievement) {
                return '<button id="' . $sachievement->media->image_path . '" class="view fa fa-eye btn-sm btn-success" data-toggle="modal" data-target="#viewModal"></button>';
            })
            ->addColumn('date', function (sachievement $sachievement) {
                return date('F d, Y', strtotime($sachievement->created_at));
            })
            ->rawColumns(['edit', 'delete','view'])
            ->make(true);
    }
}


