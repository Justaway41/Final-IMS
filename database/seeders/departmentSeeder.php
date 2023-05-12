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
                'department_name' => 'Deerwalk Digital Lab',
                'department_email' => '_ddl@sifal.deerwalk.edu.np'
            ],
            [
                'department_name' => 'IT',
                'department_email' => '_it@sifal.deerwalk.edu.np'
            ],
        ];
        foreach ($departments as $key => $value) {
            Department::create($value);
        }
    }
}
