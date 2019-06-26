<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user=User::create(['first_name' => 'Dhananjay',
            'last_name' => 'sanjay',
            'middle_name' => 'Dhananjay Ghumare',
            'email' => 'admin@gmail.com',
            'password' => '$2y$10$zXhY8SU1BlPKbUGOUEWGGOcy1ylX7A3Gh1RfKnrMyL7Y6O2nmBUr.',
            'contact_no' => '9168977662',
            'date_of_birth' => '2019-05-23',
            'role' => 1,
            'additional_columns' => 'additional coloumns',
            'gender' => 'M',
            'created_at' => '2019-05-23 07:35:39',
            'updated_at' => '2019-05-23 07:35:39'
        ]);

        $user->assignRole('Admin');

        $user=User::create(['first_name' => 'Dhananjay',
            'last_name' => 'sanjay',
            'middle_name' => 'Dhananjay Ghumare',
            'email' => 'satff1@gmail.com',
            'password' => '$2y$10$zXhY8SU1BlPKbUGOUEWGGOcy1ylX7A3Gh1RfKnrMyL7Y6O2nmBUr.',
            'contact_no' => '9168977662',
            'date_of_birth' => '2019-05-23',
            'role' => 1,
            'additional_columns' => 'additional coloumns',
            'gender' => 'M',
            'created_at' => '2019-05-23 07:35:39',
            'updated_at' => '2019-05-23 07:35:39'
        ]);

        $user->assignRole('Staff');

        $user=User::create(['first_name' => 'Dhananjay',
            'last_name' => 'sanjay',
            'middle_name' => 'Dhananjay Ghumare',
            'email' => 'staff2@gmail.com',
            'password' => '$2y$10$zXhY8SU1BlPKbUGOUEWGGOcy1ylX7A3Gh1RfKnrMyL7Y6O2nmBUr.',
            'contact_no' => '9168977662',
            'date_of_birth' => '2019-05-23',
            'role' => 1,
            'additional_columns' => 'additional coloumns',
            'gender' => 'M',
            'created_at' => '2019-05-23 07:35:39',
            'updated_at' => '2019-05-23 07:35:39'
        ]);

        $user->assignRole('Staff');

    }
}
