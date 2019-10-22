<?php


namespace App\Services;

use App\ResearchProject;
use Illuminate\Support\Facades\DB;

class ResearchProjectsService
{

    public function store($validatedData, $user_id) {
        DB::beginTransaction();
            $research_project = ResearchProject::create([
                'staff_id' => $user_id,
                'principal_investigator' => $validatedData['principal_investigator'],
                'grant_details' => $validatedData['grant_details'],
                'title' => $validatedData['title'],
                'amount' => $validatedData['amount'],
                'year' => $validatedData['year'],
                'created_by' => $user_id
            ]);
        DB::commit();

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

    public function update($validatedData, $id, $user_id) {

        try {
            DB::beginTransaction();
                $research_project = ResearchProject::find($id);
                $research_project->principal_investigator = $validatedData['principal_investigator'];
                $research_project->grant_details = $validatedData['grant_details'];
                $research_project->title = $validatedData['title'];
                $research_project->year = $validatedData['year'];
                $research_project->amount = $validatedData['amount'];
                $research_project->updated_by = $user_id;
                $research_project->save();
            DB::commit();

            return true;
        } catch (Exception $exception) {
            return false;
        }
    }
}
