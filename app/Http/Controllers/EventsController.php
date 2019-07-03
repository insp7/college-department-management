<?php

namespace App\Http\Controllers;

use App\Event;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use App\Services\EventsService;

class EventsController extends Controller
{

    protected $eventsService;

    public function __construct(EventsService $eventsService)
    {
        $this->eventsService = $eventsService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('events.manage-events');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('events.add-event');
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
            'name' => 'required|max:100',
            'details' => 'required|max:255',
            'address' => 'required|max:255',
            'type' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'additional_columns' => ''
        ]);

        try {
            $this->eventsService->store($validatedData, Auth::id());
            return redirect('/admin/events')->with([
                'type' => 'success',
                'title' => 'IPR added successfully',
                'message' => 'The given Publication has been added successfully'
            ]);
        } catch (Exception $exception) {
            return redirect()->back()->with([
                'type' => 'danger',
                'title' => 'Failed to add the Publication',
                'message' => "There was some issue in adding the Publication"
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Request $request)
    {
        $id = $request->event;
        $event = Event::find($id);
        return view('events.edit-event')->with('event', $event);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:100',
            'details' => 'required|max:255',
            'address' => 'required|max:255',
            'type' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'internal_participants_count' => 'required|numeric',
            'external_participants_count' => 'required|numeric',
            'institute_funding' => 'required|numeric',
            'sponsor_funding' => 'required|numeric',
            'expenditure' => 'required|numeric',
            'additional_columns' => ''
        ]);

        $updateSuccessful = $this->eventsService->update($validatedData, $id, Auth::id());

        if($updateSuccessful) {
            return redirect('/admin/events/')->with([
                'type' => 'success',
                'title' => 'Event updated successfully',
                'message' => 'The given Event has been updated successfully'
            ]);
        }

        return redirect()->back()->with([
            'type' => 'danger',
            'title' => 'Failed to update the Event',
            'message' => "There was some issue in updating the Event"
        ]);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        try {
            $this->eventsService->delete($id, Auth::id());
            return redirect()->back()->with([
                'type' => 'success',
                'title' => 'Event Deleted successfully',
                'message' => 'The given Event has been deleted successfully'
            ]);
        } catch (Exception $exception) {
            return redirect()->back()->with([
                'type' => 'danger',
                'title' => 'Failed To Delete Event',
                'message' => 'Error in deleting Event'
            ]);
        }
    }

    public function getEvents() {
        $events = $this->eventsService->getDatatable(Auth::id());

        return DataTables::of($events)
            ->addColumn('details', function (Event $event) {
                return $event->details . '. Address: ' . $event->address;
            })
            ->addColumn('funding', function (Event $event) {
                return $event->institute_funding + $event->sponsor_funding . '. (Institute: ' . $event->institute_funding . '. Sponsor: ' . $event->sponsor_funding . '.)';
            })
            ->addColumn('duration', function(Event $event) {
                return 'Started from: ' . $event->start_date . ' End Date: ' . $event->end_date;
            })
            ->addColumn('total_participants', function (Event $event) {
                return $event->internal_participants_count + $event->external_participants_count . '. (Internal: ' . $event->internal_participants_count . ' External: ' . $event->external_participants_count . ')';
            })
            ->addColumn('add_coordinator', function(Event $event) {
                return '<button id="' . $event->id . '" class="add_coordinator fa fa-plus-square btn-sm btn-primary"></button>';
            })
            ->addColumn('edit', function(Event $event) {
//                Redirect to page
                return '<button id="' . $event->id . '" class="edit fa fa-pencil-alt btn-sm btn-warning"></button>';
            })
            ->addColumn('delete', function(Event $event) {
                return '<button id="' . $event->id . '" class="delete fa fa-trash btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal"></button>';
            })
            ->addColumn('date', function(Event $event) {
                return date('F d, Y', strtotime($event->created_at));
            })
            ->rawColumns(['add_coordinator', 'edit', 'delete'])
            ->make(true);
    }


    public function assignCoordinator(Request $request) {
        $event_id = $request->event;
////        $event = Event::find($id);
//        $staff = Staff::all();
        $results = DB::select('SELECT id, first_name, last_name FROM users WHERE id IN (SELECT user_id FROM staff)');
//        select id, name from users where id = select user_id from staff;
//        dd($result);

//        $users = User::select('id', 'first_name', 'last_name')->where()
        return view('events.add-event-coordinators')->with('results', $results)->with('event_id', $event_id);
    }

    public function addCoordinator(Request $request) {
        $event_id = $request->id;
        $coordinators = $request->input('event_coordinators');

        $insertionSuccessful = $this->eventsService->addCoordinators($event_id, $coordinators);

        if($insertionSuccessful) {
            return redirect('/admin/events/')->with([
                'type' => 'success',
                'title' => 'Coordinator added successfully',
                'message' => 'The given Coordinator has been added successfully'
            ]);
        }

        return redirect()->back()->with([
            'type' => 'danger',
            'title' => 'Failed to add the coordinators',
            'message' => 'There was some issue in adding the coordinators'
        ]);
    }

    public function getEventsByStaffId(Request $request) {
        $user_id = $request->staff;
        $events = DB::select('SELECT * FROM events WHERE id IN (SELECT event_id FROM event_staff WHERE staff_id = ?)', [$user_id]);

        return view('events.events-to-coordinate')->with('events', $events);
    }

    public function getEndEventForm(Request $request) {
        $event_id = $request->event;

        $event = Event::find($event_id);

        return view('events.end-event')->with('event', $event);
    }

    public function endEvent(Request $request) {
        $event_id = $request->event;

        $event_data = $request->validate([
            'internal_participants_count' => 'required|numeric',
            'external_participants_count' => 'required|numeric',
            'institute_funding' => 'required|numeric',
            'sponsor_funding' => 'required|numeric',
            'expenditure' => 'required|numeric',
        ]);

        $eventSuccessfullyEnded = $this->eventsService->eventEnd($event_id, $event_data, Auth::id());

        if($eventSuccessfullyEnded) {
            return redirect('/events/manage/' . Auth::id())->with([
                'type' => 'success',
                'title' => 'Event Ended',
                'message' => 'Event Details Saved'
            ]);
        }

        return redirect()->back()->with([
            'type' => 'danger',
            'title' => 'Failed to end event',
            'message' => 'There was some issue in ending the event'
        ]);
    }
}
