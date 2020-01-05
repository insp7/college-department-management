<?php


namespace App\Services;

use App\Publication;
use App\publicationimage;
/**
 * Class PublicationsService
 * @package App\Services
 */
class PublicationsService
{
    /**
     * @param $validatedData
     * @param $user_id
     * @return mixed
     */
    public function store($validatedData,$image_relative_path, $user_id) {

        $publication = Publication::create([
            'staff_id' => $user_id,
            'year' => $validatedData['year'],
            'citation' => $validatedData['citation'],
            'created_by' => $user_id,
            'additional_columns' => $validatedData['additional_columns']
        ]);
         publicationimage::create([
                'publication_id' => $publication->id,
                'image_path' => $image_relative_path,
                'created_by' => $user_id
            ]);

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

    /**
     * @param $id
     * @param $user_id
     * @return mixed
     */
    public function delete($id, $user_id) {
        return Publication::where('created_by', $user_id)
            ->where('id', $id)
            ->delete();
    }

    /**
     * @param $validatedData
     * @param $id
     * @param $user_id
     * @return bool
     */
    public function update($validatedData, $id, $user_id) {

        try {
            $publication = Publication::find($id);
            $publication->year = $validatedData['year'];
            $publication->citation = $validatedData['citation'];
            $publication->updated_by = $user_id;
            $publication->save();

            return true;
        } catch (Exception $exception) {
            return false;
        }
    }
}