<?php
/**
 * Created by PhpStorm.
 * User: Dhananjay
 * Date: 6/24/2019
 * Time: 11:49 AM
 */

namespace App\Services;


use App\Exceptions\BaseException;
use App\Staff;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StaffService {

    public function create($validatedData, $user_id) {
        DB::beginTransaction();

            $user = User::create([
                'email' => $validatedData['email'],
                'password' => Hash::make($validatedData['password']),
                'created_by' => $user_id
            ]);

            $user->assignRole('Staff');

            Staff::create([
                'user_id' => $user->id,
                'created_by' => $user_id
            ]);
        DB::commit();
    }

    /**
     * @param $userValidatedData
     * @param $staffValidatedData
     * @param $user_id
     */
    public function completeRegistration($userValidatedData, $staffValidatedData,$user_id) {

        DB::beginTransaction();
        $user = User::find($user_id);

        /*HASH THE USER PASSWORD*/
        $userValidatedData['password'] = Hash::make($userValidatedData['password']);
        /*FORMAT DATE*/
        $userValidatedData['date_of_birth']=Carbon::parse($userValidatedData['date_of_birth'])->format('y-m-d');


        /*UPDATE USERS TABLE*/
        $status=$user
            ->update($userValidatedData);

        error_log('after user update..............................');

        if($status) {

            error_log('creating staff successfully');
            error_log(json_encode($staffValidatedData));

            /*FORMAT DATE*/
            $staffValidatedData['date_of_joining_institute']=Carbon::parse($staffValidatedData['date_of_joining_institute'])->format('y-m-d');

            $user->staff->update($staffValidatedData);

            error_log('staff created successfully');
            /*MAKE FULLY REGISTERED TRUE*/
            $user->staff
                ->update(
                    [
                        'is_fully_registered' => 1
                    ]);
        } else {
            DB::rollBack();
            throw BaseException('Error while updating user details');
        }

        DB::commit();
    }

    public function getRegisteredStaffDatatable()
    {
        return Staff::where('is_fully_registered', 1)->orderBy('created_at', 'desc');
    }

    public function getUnRegisteredStaffDatatable()
    {
        return Staff::where('is_fully_registered', 0)->orderBy('created_at', 'desc');
    }

    /**
     * Fetch id, first_name, last_name of all the staff
     *
     * @return array
     */
    public function fetchAllStaff() {
        return DB::select('SELECT id, first_name, last_name, email FROM users WHERE id IN (SELECT user_id FROM staff)');
    }

    public function getStaffGroupByDateOfJoiningInstitute(){
        $staff = Staff::where('is_fully_registered', 1)->select('date_of_joining_institute')->get();
        $year_count_array = array();

        foreach ($staff as $s) {
            $year_count_array[] = Carbon::createFromFormat('Y-m-d', $s->date_of_joining_institute)->year;
        }

        return array_count_values($year_count_array);
    }

    public function delete(int $id) {
        try {
            Staff::destroy($id);
            return true;
        } catch(Exception $e) {
            return false;
        }
    }

    public function getStaffDetailsById(int $id) {
        return Staff::findOrFail($id);
    }

    public function getUserDetailsForStaff(int $id) {
        return DB::select('SELECT * FROM users WHERE id IN (SELECT user_id FROM staff WHERE id = :id)', ['id' => $id]);
    }

    public function update($validatedData, $id, $user_id) {
        try {
            DB::beginTransaction();
                $user = User::findOrFail($id);
                $user->first_name = $validatedData['first_name'];
                $user->last_name = $validatedData['last_name'];
                $user->middle_name = $validatedData['middle_name'];
                $user->gender = $validatedData['gender'];
                $user->date_of_birth = $validatedData['date_of_birth'];
                $user->contact_no = $validatedData['contact_no'];
                $user->updated_by = $user_id;
                $user->save();

                $staff = Staff::findOrFail($id);
//                if(isset($validatedData['is_teaching'])) $staff->is_teaching = $validatedData['is_teaching'];
//                if(isset($validatedData['is_permanent'])) $staff->is_parmanent = $validatedData['is_permanent'];
                $staff->pan = $validatedData['pan'];
                $staff->employee_id = $validatedData['employee_id'];
                $staff->save();
            DB::commit();

            return true;
        } catch (Exception $exception) {
            return false;
        }
    }

    /**
     * This method is called when a staff wants to update his own profile.
     *
     * @param $validatedData array Specifies the updated data.
     * @param $user_id int Specifies the user_id of the staff whose details are to be updated.
     * @return bool true if update performed is successful, else false.
     */
    public function updateStaffProfile($validatedData, $user_id) {
        try {
            DB::beginTransaction();
                $user = User::findOrFail($id);
                $user->first_name = $validatedData['first_name'];
                $user->last_name = $validatedData['last_name'];
                $user->middle_name = $validatedData['middle_name'];
                $user->date_of_birth = $validatedData['date_of_birth'];
                $user->contact_no = $validatedData['contact_no'];
                $user->address = $validatedData['address'];
                $user->email = $validatedData['email'];
                $user->updated_by = $user_id;
                $user->save();

                $staff = Staff::findOrFail($id);
                $staff->designation = $validatedData['designation'];
                $staff->save();
            DB::commit();

            return true;
        } catch(Exception $exception) {
            return false;
        }
    }
}