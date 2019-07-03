<?php

namespace App\Imports;

use App\Student;
use App\User;
use Exception;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToCollection;


class StudentsImport implements ToCollection
{
    protected $class_id;
    public function  __construct($class_id){
        $this->class_id = $class_id;
    }
    /**
     * @param Collection $rows
     * @return void
     */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row)
        {
            try{

                $name = explode(' ',$row[2]);

                DB::beginTransaction();

                    $user=User::create([
                        'email' => $row[3],
                        'first_name' => $name[0],
                        'last_name' => $name[1],
                        'middle_name' => $name[2],
                        'password' => '$2y$10$zXhY8SU1BlPKbUGOUEWGGOcy1ylX7A3Gh1RfKnrMyL7Y6O2nmBUr.',
                        'created_by' => Auth::id()
                    ]);

                    $user->assignRole('Student');

                    Student::create([
                        'roll_no' => $row[1],
                        'created_by' => 1,
                        'class_id' => $this->class_id,
                        'user_id' => $user->id
                    ]);

                DB::commit();


            }catch(Exception $exception){
                error_log('Exception Students Import');
            }
        }
    }
}
