<?php


namespace App\Services;

use App\ResearchProject;

class ResearchProjectsService
{

    public function store($validatedData, $user_id){

        $research_project = ResearchProject::create([
            'staff_id' => $user_id,
            'principal_investigator' => $validatedData['principal_investigator'],
            'grant_details' => $validatedData['grant_details'],
            'title' => $validatedData['title'],
            'amount' => $validatedData['amount'],
            'year' => $validatedData['year'],
            'created_by' => $user_id
        ]);

        return $research_project;

    }

    /**
     * Returns the list of states for datatables.net
     * @return mixed : List of States.
     */
    public function getDatatable($id)
    {
        return ResearchProject::where('created_by', $id)->orderBy('created_at', 'desc');
    }

    public function delete($id, $user_id) {
        return ResearchProject::where('created_by', $user_id)
            ->where('id', $id)
            ->delete();
    }
}