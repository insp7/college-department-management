<?php

use Illuminate\Database\Seeder;

class PublishedBooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0;$i<10;$i++){
            \App\PublishedBook::create([
                'details' => "hello$i",
                'additional_columns' => 'string',
                'created_by' => \App\User::find(3)->id
            ]);
        }
    }
}
