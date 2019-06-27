<?php


namespace App\Services;

use App\IPR;

class IPRService
{

    public function store($validatedData, $user_id){

        $ipr = IPR::create([
            'staff_id' => $user_id,
            'year' => $validatedData['year'],
            'patents_published_count' => $validatedData['patents_published_count'],
            'patents_granted_count' => $validatedData['patents_granted_count'],
            'additional_columns' => $validatedData['additional_columns'],
            'created_by' => $user_id
        ]);

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
}