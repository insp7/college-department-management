<?php


namespace App\Services;

use App\Publication;
use Illuminate\Support\Facades\DB;

class PublicationsService
{

    public function store($validatedData, $user_id) {
        DB::beginTransaction();
            $publication = Publication::create([
                'staff_id' => $user_id,
                'year' => $validatedData['year'],
                'citation' => $validatedData['citation'],
                'additional_columns' => $validatedData['additional_columns'],
                'created_by' => $user_id
            ]);
        DB::commit();

        return $publication;

    }

    /**
     * Returns the list of states for datatables.net
     * @return mixed : List of States.
     */
    public function getDatatable($id)
    {
        return Publication::where('created_by', $id)->orderBy('created_at', 'desc');
    }

    public function delete($id, $user_id) {
        return Publication::where('created_by', $user_id)
            ->where('id', $id)
            ->delete();
    }

    public function update($validatedData, $id, $user_id) {

        try {
            DB::beginTransaction();
                $publication = Publication::find($id);
                $publication->year = $validatedData['year'];
                $publication->citation = $validatedData['citation'];
                $publication->additional_columns = $validatedData['additional_columns'];
                $publication->upated_by = $user_id;
                $publication->save();
            DB::commit();

            return true;
        } catch (Exception $exception) {
            return false;
        }
    }
}