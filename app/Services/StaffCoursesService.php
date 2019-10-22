<?php

namespace App\Services;

use App\StaffCourse;
use Illuminate\Support\Facades\DB;


/**
 * Class StudentCoursesService
 * @package App\Services
 */
class StaffCoursesService {

    /**
     * Stores a student-course into the database.
     *
     * @param array $validatedData
     * @param int $user_id
     * @return mixed
     */
    public function store($validatedData, $user_id) {
        $staff_course = StaffCourse::create([
            'details' => $validatedData['details'],
            'name' => $validatedData['name'],
            'location' => $validatedData['location'],
            'start_date' => $validatedData['start_date'],
            'end_date' => $validatedData['end_date'],
            'created_by' => $user_id
        ]);

        return $staff_course;
    }

    /**
     * Returns a list of staff-courses for the user specified by $id
     *
     * @param int $id
     * @return mixed
     */
    public function getDatatable($id)
    {
        return StaffCourse::where('created_by', $id)->orderBy('created_at', 'desc');
    }

    /**
     * Deletes a record from the relation specified by the $id.
     *
     * @param int $id Specifies a unique record in the relation
     * @param int $user_id Specifies the user's id who performed this delete
     * @return mixed
     */
    public function delete($id, $user_id) {
        return StaffCourse::where('created_by', $user_id)
            ->where('id', $id)
            ->delete();
    }

    /**
     * Updates a row record in the relation specified by the $id.
     *
     * @param array $validatedData The updated data
     * @param int $id Specifies a unique record in the relation
     * @param int $user_id Specifies the user's id who performed this update
     * @return bool
     */
    public function update($validatedData, $id, $user_id) {
        try {
                $staff_course = StaffCourse::findOrFail($id);

                $staff_course->name = $validatedData['name'];
                $staff_course->details = $validatedData['details'];
                $staff_course->location = $validatedData['location'];
                $staff_course->start_date = $validatedData['start_date'];
                $staff_course->end_date = $validatedData['end_date'];
                $staff_course->updated_by = $user_id;

                $staff_course->save();

            return true;
        } catch (Exception $exception) {
            return false;
        }
    }
}
