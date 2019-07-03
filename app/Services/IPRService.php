<?php


namespace App\Services;

use App\IPR;
use Illuminate\Support\Facades\DB;

class IPRService
{

    public function store($validatedData, $user_id) {
        DB::beginTransaction();
            $ipr = IPR::create([
                'staff_id' => $user_id,
                'year' => $validatedData['year'],
                'patents_published_count' => $validatedData['patents_published_count'],
                'patents_granted_count' => $validatedData['patents_granted_count'],
                'additional_columns' => $validatedData['additional_columns'],
                'created_by' => $user_id
            ]);
        DB::commit();

        return $ipr;

    }

    /**
     * Returns the list of states for datatables.net
     * @return mixed : List of States.
     */
    public function getDatatable($id)
    {
        return IPR::where('created_by', $id)->orderBy('created_at', 'desc');
    }

    public function delete($id, $user_id) {
        return IPR::where('created_by', $user_id)
            ->where('id', $id)
            ->delete();
    }

    public function update($validatedData, $id, $user_id) {
        try {
            DB::beginTransaction();
                $ipr = IPR::find($id);
                $ipr->year = $validatedData['year'];
                $ipr->patents_published_count = $validatedData['patents_published_count'];
                $ipr->patents_granted_count = $validatedData['patents_granted_count'];
                $ipr->additional_columns = $validatedData['additional_columns'];
                $ipr->updated_by = $user_id;
                $ipr->save();
            DB::commit();

            return true;
        } catch (Exception $exception) {
            return false;
        }
    }
}