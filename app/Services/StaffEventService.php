<?php

namespace App\Services;

use App\StaffEvent;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class StaffEventService
{
    public function create($validatedData, $user_id)
    {
        DB::beginTransaction();

        $validatedData['date'] = Carbon::parse($validatedData['date'])->format('y-m-d');
        $validatedData['start_date'] = Carbon::parse($validatedData['date'])->format('y-m-d');
        $validatedData['end_date'] = Carbon::parse($validatedData['date'])->format('y-m-d');

        $staff_event = StaffEvent::create([
            'date' => $validatedData['date'],
            'name_of_event' => $validatedData['name_of_event'],
            'start_date' => $validatedData['start_date'],
            'end_date' => $validatedData['start_date'],
            'type' => $validatedData['type'],
            'created_by' => $user_id
        ]);

        DB::commit();
    }
    /**
     * Returns the list of states for datatables.net
     * @return mixed : List of States.
     */
    public function getDatatable($id)
    {
        return StaffEvent::where('created_by', $id)->orderBy('created_at', 'desc');
    }

    public function delete($id, $user_id)
    {
        DB::beginTransaction();
        StaffEvent::where('created_by', $user_id)
            ->where('id', $id)
            ->delete();
        DB::commit();
    }

    public function update($validatedData,$user_id,$id)
    {
        DB::beginTransaction();

        $validatedData['date'] = Carbon::parse($validatedData['date'])->format('y-m-d');
        $validatedData['start_date'] = Carbon::parse($validatedData['date'])->format('y-m-d');
        $validatedData['end_date'] = Carbon::parse($validatedData['date'])->format('y-m-d');

        StaffEvent::where('id',$id)->update($validatedData);
        $staff_event = StaffEvent::where('id', $id);

        DB::commit();
}
}
