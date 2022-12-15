<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class departmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $departments = [
            [
                'department_name' => 'DDL',
                'department_email' => 'ddl@gmail.com'
            ],

            [
                'department_name' => 'Library',
                'department_email' => 'library@gmail.com'
            ],
            [
                'department_name' => 'Biology',
                'department_email' => 'biology@gmail.com'
            ],
            [
                'department_name' => 'IT',
                'department_email' => 'it@gmail.com'
            ],
        ];
        foreach ($departments as $key => $value) {
            Department::create($value);
        }
    }
}
