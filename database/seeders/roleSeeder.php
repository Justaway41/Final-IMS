<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class roleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'title' => 'Intern'
            ],
            [
                'title' => 'Admin'
            ],
            [
                'title' => 'Manager'
            ],
        ];
        foreach ($roles as $key => $value) {
            Role::create($value);
        }
    }
}
