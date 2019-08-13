<?php

use Illuminate\Database\Seeder;

class DesignationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('designation')->insert([
            'designation_code' => 'DES01',
            'designation_name' => 'Interns',
            'designation_description' => 'New intern schemas',
        ]);

        DB::table('designation')->insert([
            'designation_code' => 'DES02',
            'designation_name' => 'JR.Developer',
            'designation_description' => 'Helping in Testing ,Coding',
        ]);
    }
}
