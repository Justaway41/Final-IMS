<?php

namespace Database\Seeders;


use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $user = [
            [
                'full_name' => 'Admin',
                'email' => 'admin123@gmail.com',
                'password' => bcrypt('admin1234'),
                'gender' => 'male',
                'birthday' => '2022-11-03',
                'contact' => '9813706413',
                'address' => 'admin gau',
                'department_id' => '1',
                'role_id' => '2',
                'contract_status' => 'active',
                'contract_start_date' => '2022-11-03',
                'contract_end_date' => '2022-11-10',
                'hourly_rate' => '60'
            ]
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
