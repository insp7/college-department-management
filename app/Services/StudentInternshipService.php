<?php

/**
 * Created by PhpStorm.
 * User: Pushpak
 * Date: 02/07/2019
 * Time: 9:27 PM
 */

namespace App\Services;

use App\StudentInternship;
use App\StudentInternshipImage;
use Illuminate\Support\Facades\DB;


class StudentInternshipService
{
    public function create($validatedData, $image_relative_path, $user_id)
    {
        DB::beginTransaction();

        $student_internship = StudentInternship::create([
            'company_name' => $validatedData[ 'company_name'],
            'start_date' => $validatedData['start_date'],
            'end_date' => $validatedData['end_date'],
            'is_paid' => $validatedData['is_paid'],
            'created_by' => $user_id
        ]);
        StudentInternshipImage::create([
                'student_internship_id' => $student_internship->id,
                'image_path' => $image_relative_path,
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
        return StudentInternship::where('created_by', $id)->orderBy('created_at', 'desc');
    }

    public function delete($id, $user_id)
    {
        return StudentInternship::where('created_by', $user_id)
            ->where('id', $id)
            ->delete();
    }
}
