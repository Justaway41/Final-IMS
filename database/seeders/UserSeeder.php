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
                'email' => 'ims_admin@gmail.com',
                'password' => bcrypt('ims@admin#'),
                'gender' => 'male',
                'birthday' => '2001-11-03',
                'contact' => '9813706413',
                'address' => 'Sifal',
                'department_id' => '1',
                'role_id' => '2',
                'contract_status' => 'active',
                'contract_start_date' => '2022-06-01',
                'contract_end_date' => '2023-11-10',
                'hourly_rate' => '60'
            ]
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
