<?php
/**
 * Created by PhpStorm.
 * User: Dhananjay
 * Date: 6/25/2019
 * Time: 12:48 AM
 */

namespace App\Services;

use App\PublishedBook;
use Illuminate\Support\Facades\DB;

class PublishedBooksService {

    public function store($validatedData, $user_id) {
        $published_book = PublishedBook::create([
            'details' => $validatedData['details'],
            'created_by' => $user_id
        ]);

        return $published_book;
    }

    /**
     * Returns the list of states for datatables.net
     * @return mixed : List of States.
     */
    public function getDatatable($id) {
        return PublishedBook::where('created_by', $id)->orderBy('created_at', 'desc');
    }

    /**
     * Soft Deletes the published book specified by the $id
     *
     * @param int $id
     * @param int $user_id
     * @return mixed
     */
    public function delete($id, $user_id) {
        return PublishedBook::where('created_by', $user_id)
            ->where('id', $id)
            ->delete();
    }

    public function updatePublishedBook($validatedData, $id, $user_id) {
        try {
            $published_book = PublishedBook::findOrFail($id);
            $published_book->details = $validatedData['details'];
            $published_book->updated_by = $user_id;
            $published_book->save();

            return true;
        } catch (Exception $exception) {
            return false;
        }
    }
}