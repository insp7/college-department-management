<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\StaffEvent;
use App\Constants\FileConstants;
use Illuminate\Support\Facades\Auth;
use App\Services\StaffEventService;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Carbon;

class StaffEventController extends Controller
{
    protected $staffeventservice;

    public function __construct(StaffEventService $staffeventservice)
    {
        $this->staffeventservice = $staffeventservice;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('staff-events.manage-staff-events');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('staff-events.add-staff-events');
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
            'date' => 'required|date',
            'name_of_event' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'type' => 'required|string',
        ]);
        try{
            $this->staffeventservice->create($validatedData, Auth::id());

            /*LOG ACTIVITY*/
            activity()
                ->causedBy(Auth::user())
                ->withProperties([
                    'date' => Carbon::now()->toDateTimeString(),
                    'title' => 'Staff Event Added',
                ])
                ->log("Staff Event $request->subject added");

            return redirect('staff-events')->with([
                'type' => 'success',
                'title' => 'Staff Event added successfully',
                'message' => 'The Staff Event has been added successfully'
            ]);
        } catch (Exception $exception) {

            return redirect()->back()->with([
                'type' => 'danger',
                'title' => 'Failed to add the Staff Event',
                'message' => "There was some issue in adding the Staff Event"
            ]);
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\StaffEvent  $StaffEvent
     * @return \Illuminate\Http\Response
     */
    public function show(StaffEvent $StaffEvent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\StaffEvent  $StaffEvent
     * @return \Illuminate\Http\Response
     */
    public function edit(StaffEvent $StaffEvent)
    {
        
        return view('staff-events.edit-staff-events',['staff'=>$StaffEvent]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\StaffEvent  $StaffEvent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
     
        $validatedData = $request->validate([
            'date' => 'required|date',
            'name_of_event' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'type' => 'required|string',
            
        ]); 
         try {
            $this->staffeventservice->update($validatedData,Auth::id(),$id);
            return redirect('staff-events')->with([
                'type' => 'success',
                'title' => 'Staff Event updated successfully',
                'message' => 'The Staff Event has been updated successfully'
            ]);
        } catch (Exception $exception) {

            return redirect()->back()->with([
                'type' => 'danger',
                'title' => 'Failed to update the Staff Event',
                'message' => "There was some issue in adding the Staff Event"
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\StaffEvent  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $this->staffeventservice->delete($id, Auth::id());
            return redirect()->back()->with([
                'type' => 'success',
                'title' => 'Staff Event Deleted successfully',
                'message' => 'The given Staff Event has been deleted successfully'
            ]);
        } catch (Exception $exception) {
            return redirect()->back()->with([
                'type' => 'danger',
                'title' => 'Failed To Delete Staff Event',
                'message' => 'Error in deleting Staff Event'
            ]);
        }
    }
    /**
     * Returns the data for datatables.
     * @return mixed Resulting data in datatables.net format
     * @throws \Exception*
     */
    public function getStaffEvents()
    {
        /*CURRENT Staff Events*/
        $StaffEvent = $this->staffeventservice->getDatatable(Auth::id());

        return DataTables::of($StaffEvent)
            ->addColumn('edit', function (StaffEvent $StaffEvent) {
            return '<button id="' . $StaffEvent->id . '" class="edit fa fa-pencil-alt btn-sm btn-warning"></button>'
            ;})
            ->addColumn('delete', function ( StaffEvent $StaffEvent) {
                return '<button id="' . $StaffEvent->id . '" class="delete fa fa-trash btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal"></button>';
            })
            ->rawColumns(['edit', 'delete'])
            ->make(true);
    }
}
