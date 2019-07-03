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

class StaffService
{

    public function create($validatedData, $user_id){
        DB::beginTransaction();

            $user=User::create([
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
}