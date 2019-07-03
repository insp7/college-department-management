<?php


namespace App\Services;

use App\Event;
use Illuminate\Support\Facades\DB;

class EventsService
{
    public function store($validatedData, $user_id) {
        DB::beginTransaction();
            $event = Event::create([
                'name' => $validatedData['name'],
                'details' => $validatedData['details'],
                'address' => $validatedData['address'],
                'type' => $validatedData['type'],
                'start_date' => $validatedData['start_date'],
                'end_date' => $validatedData['end_date'],
                'additional_columns' => $validatedData['additional_columns'],
                'created_by' => $user_id
            ]);
        DB::commit();

        return $event;

    }


//    public function getDatatable($id)
//    {
//        return Event::where('created_by', $id)->orderBy('created_at', 'desc');
//    }

    public function getDatatable()
    {
        return Event::all();
    }

    public function delete($id, $user_id) {
        return Event::where('created_by', $user_id)
            ->where('id', $id)
            ->delete();
    }

    public function update($validatedData, $id, $user_id) {

        try {
            DB::beginTransaction();
                $event = Event::find($id);
                $event->name = $validatedData['name'];
                $event->details = $validatedData['details'];
                $event->address = $validatedData['address'];
                $event->type = $validatedData['type'];
                $event->start_date = $validatedData['start_date'];
                $event->end_date = $validatedData['end_date'];
                $event->institute_funding = $validatedData['institute_funding'];
                $event->sponsor_funding = $validatedData['sponsor_funding'];
                $event->internal_participants_count = $validatedData['internal_participants_count'];
                $event->external_participants_count = $validatedData['external_participants_count'];
                $event->expenditure = $validatedData['expenditure'];
                $event->additional_columns = $validatedData['additional_columns'];
                $event->updated_by = $user_id;
                $event->save();
            DB::commit();

            return true;
        } catch (Exception $exception) {
            return false;
        }
    }

    public function addCoordinators($event_id, $coordinators) {
        try {
            DB::beginTransaction();
                $event = Event::find($event_id);
                $event->staff()->attach($coordinators);
                $event->save();
            DB::commit();

            return true;
        } catch (Exception $exception) {
            return false;
        }
    }

    public function eventEnd($event_id, $event, $user_id) {
        try {
//            dd($event);
            DB::beginTransaction();

                // Insert final details about event and end
                $event_row = Event::find($event_id);
                $event_row->institute_funding = $event['institute_funding'];
                $event_row->sponsor_funding = $event['sponsor_funding'];
                $event_row->expenditure = $event['expenditure'];
                $event_row->internal_participants_count = $event['internal_participants_count'];
                $event_row->external_participants_count = $event['external_participants_count'];
                $event_row->is_completed = 1;
                $event_row->updated_by = $user_id;
                $event_row->updated_at = now();
                $event_row->save();
            DB::commit();

            return true;
        } catch (Exception $exception) {
            return false;
        }
    }
}