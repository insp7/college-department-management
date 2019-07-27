<?php

namespace App\Services;

use App\StudentScholarship;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class StudentScholarshipService
{
    public function create($validatedData, $user_id)
    {
        DB::beginTransaction();

        $student_scholarship = StudentScholarship::create([
            'sponsors_name' => $validatedData['sponsors_name'],
            'details' => $validatedData['details'],
            'amount' => $validatedData['amount'],
            'isPrivate' => $validatedData['isPrivate'],
            'year' => $validatedData['year'],
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
        return StudentScholarship::where('created_by', $id)->orderBy('created_at', 'desc');;
    }

    public function delete($id, $user_id)
    {
        DB::beginTransaction();
        StudentScholarship::where('created_by', $user_id)
            ->where('id', $id)
            ->delete();
        DB::commit();
    }

    public function update($validatedData,$user_id,$id)
    {
        DB::beginTransaction();
        StudentScholarship::where('id',$user_id)
                ->where('created_by',$id)
                ->update($validatedData);
        $student_scholarship = StudentScholarship::where('id', $user_id);

        DB::commit();
        return true;
}
}
