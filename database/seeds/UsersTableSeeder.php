<?php

use App\Staff;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create(['first_name' => 'Aninket',
            'last_name' => 'Konkar',
            'middle_name' => 'mid-name',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
            'contact_no' => '1234567890',
            'date_of_birth' => '2019-05-23',
            'role' => 1,
            'additional_columns' => 'additional columns',
            'gender' => 'M',
            'created_at' => '2019-05-23 07:35:39',
            'updated_at' => '2019-05-23 07:35:39'
        ]);

        $user->assignRole('Admin');

        // Because admin is a staff(i.e. a staff can be a admin)
        Staff::create([
            'user_id' => $user->id,
            'created_by' => $user->id,
            'updated_by' => $user->id,

        ]);

        $user = User::create(['first_name' => 'Dhananjay',
            'last_name' => 'sanjay',
            'middle_name' => 'Dhananjay Ghumare',
            'email' => 'staff1@gmail.com',
            'password' => '$2y$10$zXhY8SU1BlPKbUGOUEWGGOcy1ylX7A3Gh1RfKnrMyL7Y6O2nmBUr.',
            'contact_no' => '9168977662',
            'date_of_birth' => '2019-05-23',
            'role' => 2,
            'additional_columns' => 'additional coloumns',
            'gender' => 'M',
            'created_at' => '2019-05-23 07:35:39',
            'updated_at' => '2019-05-23 07:35:39'
        ]);

        $user->assignRole('Staff');

        Staff::create([
            'user_id' => $user->id,
            'created_by' => '1',
            'updated_by' => '1'
        ]);

        $user = User::create(['first_name' => 'Dhananjay',
            'last_name' => 'sanjay',
            'middle_name' => 'Dhananjay Ghumare',
            'email' => 'staff2@gmail.com',
            'password' => '$2y$10$zXhY8SU1BlPKbUGOUEWGGOcy1ylX7A3Gh1RfKnrMyL7Y6O2nmBUr.',
            'contact_no' => '9168977662',
            'date_of_birth' => '2019-05-23',
            'role' => 2,
            'additional_columns' => 'additional coloumns',
            'gender' => 'M',
            'created_at' => '2019-05-23 07:35:39',
            'updated_at' => '2019-05-23 07:35:39'
        ]);

        $user->assignRole('Staff');

        Staff::create([
            'user_id' => $user->id,
            'created_by' => '1',
            'updated_by' => '1'
        ]);
    }
}
