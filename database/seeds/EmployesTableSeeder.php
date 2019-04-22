<?php

use Illuminate\Database\Seeder;

class EmployesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('employes')->insert([
            'firstname' => 'Alfreds',
            'lastname' => 'Futterkiste',
            'company_id' => '2',
             'email' => 'alfreds@futterkiste.com',
             'phone' => '(503) 555-9831',
        ]);
        DB::table('employes')->insert([
            'firstname' => 'Nancy',
            'lastname' => 'Davolio',
            'company_id' => '1',
            'email' => 'nancy@davolio.com',
            'phone' => '(503) 555-9931',
        ]);
        DB::table('employes')->insert([
            'firstname' => 'Andrew',
            'lastname' => 'Fuller',
            'company_id' => '2',
            'email' => 'andrew@fuller.com',
            'phone' => '(503) 555-9931',
        ]);
    }
}
