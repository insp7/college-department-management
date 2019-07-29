<?php

namespace App\Http\Controllers;

use App\Constants\FileConstants;
use App\Event;
use App\Services\StaffService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
use App\Services\EventsService;

class EventsController extends Controller
{

    protected $eventsService, $staffService;

    /**
     * EventsController constructor.
     *
     * @param EventsService $eventsService
     * @param StaffService $staffService
     */
    public function __construct(EventsService $eventsService, StaffService $staffService)
    {
        $this->eventsService = $eventsService;
        $this->staffService = $staffService;
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
            'start_date' => 'required|date|before:end_date',
            'end_date' => 'required|date|after:start_date',
        ]);

        try {
            $this->eventsService->store($validatedData, Auth::id());
            return redirect('/admin/events')->with([
                'type' => 'success',
                'title' => 'Event added successfully',
                'message' => 'The given Event has been added successfully'
            ]);
        } catch (Exception $exception) {
            return redirect()->back()->with([
                'type' => 'danger',
                'title' => 'Failed to add the Event',
                'message' => "There was some issue in adding the Event"
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Event $event
     */
    public function show(Event $event)
    {

    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Request $request)
    {
        $id = $request->event;
        $event = $this->eventsService->getEventDetailsById($id);
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
            'start_date' => 'required|date|before:end_date',
            'end_date' => 'required|date|after:start_date',
            'internal_participants_count' => 'required|numeric',
            'external_participants_count' => 'required|numeric',
            'institute_funding' => 'required|numeric',
            'sponsor_funding' => 'required|numeric',
            'expenditure' => 'required|numeric',
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
     * Soft delete the event specified by the id.
     *
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

    // CUSTOM METHODS

    /**
     * Fetch all events and display them in the form of datatables.
     *
     * @return mixed
     * @throws \Exception
     */
    public function getEvents() {
        $events = $this->eventsService->getDatatable();

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
            ->addColumn('total_participants', function(Event $event) {
                return $event->internal_participants_count + $event->external_participants_count . '. (Internal: ' . $event->internal_participants_count . ' External: ' . $event->external_participants_count . ')';
            })
            ->addColumn('view_coordinators', function(Event $event) {
                return '<button id="' . $event->id . '" class="view_coordinators fa fa-eye btn-sm btn-success"></button>';
            })
            ->addColumn('add_coordinator', function(Event $event) {
                return '<button id="' . $event->id . '" class="add_coordinator fa fa-plus-square btn-sm btn-primary"></button>';
            })
            ->addColumn('edit', function(Event $event) {
                return '<button id="' . $event->id . '" class="edit fa fa-pencil-alt btn-sm btn-warning"></button>';
            })
            ->addColumn('delete', function(Event $event) {
                return '<button id="' . $event->id . '" class="delete fa fa-trash btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal"></button>';
            })
            ->addColumn('date', function(Event $event) {
                return date('F d, Y', strtotime($event->created_at));
            })
            ->rawColumns(['view_coordinators', 'add_coordinator', 'edit', 'delete'])
            ->make(true);
    }


    /**
     * Returns the Available coordinators which can be assigned to an event.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function assignCoordinator(Request $request) {
        $event_id = $request->event;
        $unassigned_coordinators = $this->eventsService->getUnassignedCoordinators($event_id);

        return view('events.add-event-coordinators')
            ->with('event_id', $event_id)
            ->with('unassigned_coordinators', $unassigned_coordinators);
    }

    /**
     * Specified coordinators from the request are stored in the database.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
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

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function viewCoordinators(Request $request) {
        return view('events.view-coordinators');
    }

    /**
     * Fetch coordinators for a particular event specified in the request.
     *
     * @param Request $request
     * @return mixed
     * @throws \Exception
     */
    public function getCoordinators(Request $request) {

        $event_id = $request->event;
        $coordinators = $this->eventsService->getCoordinatorsForEvent($event_id);

        return DataTables::of($coordinators)
            ->addColumn('name', function ($coordinator) {
                return $coordinator->first_name . ' ' . $coordinator->last_name;
            })
            ->addColumn('email', function ($coordinator) {
                return $coordinator->email;
            })
            ->addColumn('delete', function($coordinator) {
                return '<button id="' . $coordinator->id . '" class="delete fa fa-trash btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal"></button>';
            })

            ->rawColumns(['delete'])
            ->make(true);
    }

    /**
     * Deletes a coordinator for the particular event(specified in the request).
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function removeCoordinator(Request $request) {
        $event_id = $request->event;
        $staff_id = $request->coordinator;

        $coordinatorRemoved = $this->eventsService->removeCoordinator($event_id, $staff_id);

        if($coordinatorRemoved) {
            return redirect()->back()->with([
                'type' => 'success',
                'title' => 'Coordinator Removed',
                'message' => 'The given Coordinator has been removed successfully'
            ]);
        }

        return redirect()->back()->with([
            'type' => 'danger',
            'title' => 'Failed to remove coordinator',
            'message' => "There was some issue in removing the coordinator"
        ]);
    }


    /**
     * Fetch events assigned for a particular staff.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getEventsByStaffId(Request $request) {
        $user_id = $request->staff;
        $events = $this->eventsService->getEventsByStaffId($user_id);

        return view('events.events-to-coordinate')->with('events', $events);
    }

    /**
     * Fetch end-event form for filling final details.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getEndEventForm(Request $request) {
        $event_id = $request->event;

        $event = Event::findOrFail($event_id);

        return view('events.end-event')->with('event', $event);
    }

    /**
     * Marks the event as completed.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function endEvent(Request $request) {
        $event_id = $request->event;

        $event_data = $request->validate([
            'internal_participants_count' => 'required|numeric',
            'external_participants_count' => 'required|numeric',
            'institute_funding' => 'required|numeric',
            'sponsor_funding' => 'required|numeric',
            'expenditure' => 'required|numeric',
            'event_images' => 'sometimes|required',
            'event_images.*' =>'sometimes|mimes:jpeg,png,bmp,tiff'
        ]);

        $image_relative_paths = [];
        $user_id = Auth::id();

        if($request->hasfile('event_images')) {
            $i = 0;

            foreach($request->file('event_images') as $news_feed_image) {

                // The file name of the attachment
                $fileName = $user_id . '_' . $i++ . '_' . time() . '.' . $news_feed_image->getClientOriginalExtension();

                // exact path on the current machine
                $destinationPath = public_path(FileConstants::EVENT_IMAGES_ATTACHMENTS_PATH);

                // Moving the image
                $news_feed_image->move($destinationPath, $fileName);

                // The relative path to the image
                $image_relative_paths[]= FileConstants::EVENT_IMAGES_ATTACHMENTS_PATH.$fileName;
            }
        }

        $eventSuccessfullyEnded = $this->eventsService->eventEnd($event_id, $event_data, $image_relative_paths, Auth::id());

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

    /**
     * Fetches images uploaded for a particular event specified in the request.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getEventImages(Request $request) {
        $event_id = $request->event;
        $event_images_path = $this->eventsService->getImagesPath($event_id);
        $hostName = $request->getHttpHost();

        return view('events.event-images')
            ->with('event_images_path', $event_images_path)
            ->with('hostName', $hostName);
    }

    /**
     * Converts a particular event(specified in the request) to news.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function publishAsNews(Request $request) {
        $event_id = $request->event;

        $publishedSuccessfully = $this->eventsService->publishEventAsNews($event_id, Auth::id());

        if($publishedSuccessfully) {
            return redirect()->back()->with([
                'type' => 'success',
                'title' => 'Event published successfully',
                'message' => 'The given Event has been published successfully'
            ]);
        }

        return redirect()->back()->with([
            'type' => 'danger',
            'title' => 'Failed to Publish the event',
            'message' => "There was some issue in publishing the Event"
        ]);
    }
}
