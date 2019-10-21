<?php

namespace App\Http\Controllers;

use App\Services\SAchievementService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


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
        return view('staff.manage-staff');
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
        $validatedData = $request->validate([
            'achievement_name' => 'required',
            'achievement_description' => 'required',
            'year' => 'required|min:4|max:4'
        ]);

        try {
            $this->staffAchievementService->store($validatedData, Auth::id());
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
    public function edit($id)
    {
        //
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
    }
}


