<?php
/**
 * Created by PhpStorm.
 * User: shubham
 * Date: 21-10-2019
 * Time: 14:31
 */

namespace App\Services;


use App\sachievement;
use Illuminate\Support\Facades\DB;

class SAchievementService
{
    public function store($validatedData, $user_id) {
        DB::beginTransaction();
        $staff_achievement = sachievement::create([
            'staff_id' => $user_id,
            'achievement_name' => $validatedData['achievement_name'],
            'achievement_description' => $validatedData['achievement_description'],
            'year' => $validatedData['year'],
            'created_by' => $user_id
        ]);
        DB::commit();

        return $staff_achievement;

    }
}
