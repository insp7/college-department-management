<?php
/**
 * Created by PhpStorm.
 * User: Dhananjay
 * Date: 6/24/2019
 * Time: 11:49 AM
 */

namespace App\Services;


use App\Staff;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StaffService
{

    public function create($validatedData, $user_id){
        DB::beginTransaction();

            $user=User::create([
                'email' => $validatedData['email'],
                'password' =>Hash::make($validatedData['password']),
                'created_by' => $user_id
            ]);

            Staff::create([
                'user_id' => $user->id,
                'created_by' => $user_id
            ]);
        DB::commit();
    }
}