<?php

use Illuminate\Database\Seeder;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
           DB::table('companies')->insert([
            'name' => 'microsoft',
            'email' => 'microsoft@windows.com',
            'image' => 'microsoft.png',
            'website' => 'microsoft.com',
        ]);
        DB::table('companies')->insert([
            'name' => 'samsung',
            'email' => 'samsung@korean.com',
            'image' => 'samsung.jpg',
            'website' => 'samsung.com',
        ]);
    }
}
