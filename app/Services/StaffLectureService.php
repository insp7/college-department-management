<?php

namespace App\Services;

use App\StaffLecture;
use Illuminate\Support\Facades\DB;

class StaffLectureService
{
    public function create($validatedData, $report_path, $user_id)
    {
        DB::beginTransaction();

        $staff_lecture = StaffLecture::create([
            'date' => $validatedData['date'],
            'subject' => $validatedData['subject'],
            'class' => $validatedData['class'],
            'no_of_students' => $validatedData['no_of_students'],
            'expert_name' => $validatedData['expert_name'],
            'expert_profile' => $validatedData['expert_profile'],
            'organization' => $validatedData['organization'],
            'report_path' => $validatedData['report_path'],
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
        return StaffLecture::where('created_by', $id)->orderBy('created_at', 'desc');
    }

    public function delete($id, $user_id)
    {
        DB::beginTransaction();
        StaffLecture::where('created_by', $user_id)
            ->where('id', $id)
            ->delete();
        DB::commit();
    }

    public function update($validatedData, $report_path, $user_id,$id)
    {
        DB::beginTransaction();

        StaffLecture::where('id',$id)->update($validatedData);
        $staff_lecture = StaffLecture::where('id', $id);

        DB::commit();
}
}
