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
use App\sachievementimage;

class SAchievementService
{
    public function store($validatedData,$image_relative_path, $user_id) {
        DB::beginTransaction();
        
        $staff_achievement = sachievement::create([
            'staff_id' => $user_id,
            'achievement_name' => $validatedData['achievement_name'],
            'achievement_description' => $validatedData['achievement_description'],
            'year' => $validatedData['year'],
            'created_by' => $user_id
        ]);
        sachievementimage::create([
                'sachievement_id' => $staff_achievement->id,
                'image_path' => $image_relative_path,
                'created_by' => $user_id
            ]);
        DB::commit();

        return $staff_achievement;
    }

    public function delete($id, $user_id) {
        return sachievement::where('created_by', $user_id)
            ->where('id', $id)
            ->delete();
    }

    public function update($validatedData, $id, $user_id) {

        try {
            DB::beginTransaction();
            $staffachievement = sachievement::find($id);
            $staffachievement->achievement_name = $validatedData['achievement_name'];
            $staffachievement->achievement_description = $validatedData['achievement_description'];
            $staffachievement->year = $validatedData['year'];
            $staffachievement->updated_by = $user_id;
            $staffachievement->save();
            DB::commit();

            return true;
        } catch (Exception $exception) {
            return false;
        }
    }

    public function getDatatable($id)
    {
        return sachievement::where('created_by', $id)->orderBy('created_at', 'desc');
    }
}
