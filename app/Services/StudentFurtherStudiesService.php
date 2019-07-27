<?php

namespace App\Services;

use App\StudentFurtherStudies;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class StudentFurtherStudiesService
{
    public function create($validatedData, $user_id)
    {
        DB::beginTransaction();

        $student_furtherstudies = StudentFurtherStudies::create([
            'hasOpted' => $validatedData['hasOpted'],
            'type' => $validatedData['type'],
            'hasGiven' => $validatedData['hasGiven'],
            'obtained' => $validatedData['obtained'],
            'outof' => $validatedData['outof'],
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
        return StudentFurtherStudies::where('created_by', $id)->orderBy('created_at', 'desc');;
    }

    public function delete($id, $user_id)
    {
        DB::beginTransaction();
        StudentFurtherStudies::where('created_by', $user_id)
            ->where('id', $id)
            ->delete();
        DB::commit();
    }

    public function update($validatedData,$user_id,$id)
    {
        DB::beginTransaction();
        StudentFurtherStudies::where('id',$user_id)
                ->where('created_by',$id)
                ->update($validatedData);
        $student_furtherstudies = StudentFurtherStudies::where('id', $user_id);

        DB::commit();
        return true;
}
}
