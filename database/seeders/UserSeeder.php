<?php

namespace Database\Seeders;


use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Crypt;

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
                'email' => 'admin@gmail.com',
                'password' => bcrypt('admin123'),
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
            ],
            [
                'full_name' => 'Ronaldo',
                'email' => 'ronaldo@gmail.com',
                'password' => bcrypt('kritartha123'),
                'gender' => 'male',
                'birthday' => '2022-11-03',
                'contact' => '9813706413',
                'address' => 'Ronaldo gau',
                'department_id' => '1',
                'role_id' => '1',
                'contract_status' => 'active',
                'contract_start_date' => '2022-11-03',
                'contract_end_date' => '2022-11-10',
                'hourly_rate' => '60',
                'pan_number' => Crypt::encryptString('27-01-76-07524'),
                'bank_account' => Crypt::encryptString('00105080463010')
            ]
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
