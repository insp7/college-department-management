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

class PublishedBooksService
{

    public function store($validatedData, $user_id) {
        DB::beginTransaction();
            $published_book=PublishedBook::create([
                'details' => $validatedData['details'],
                'created_by' => $user_id
            ]);
        DB::commit();

        return $published_book;
    }

    /**
     * Returns the list of states for datatables.net
     * @return mixed : List of States.
     */
    public function getDatatable($id)
    {
        return PublishedBook::where('created_by', $id)->orderBy('created_at', 'desc');
    }

    public function delete($id, $user_id) {
        return PublishedBook::where('created_by', $user_id)
            ->where('id', $id)
            ->delete();
    }
}