<?php

use Illuminate\Database\Seeder;

class DepartmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('department')->insert([
            'department_code' => 'DEP01',
            'department_name' => 'IT',
            'department_description' => 'Software Development,Web Development,SEO',
        ]);

        DB::table('department')->insert([
            'department_code' => 'DEP02',
            'department_name' => 'Marketing',
            'department_description' => 'Social Media Marketing,Emailing',
        ]);
    }
}
