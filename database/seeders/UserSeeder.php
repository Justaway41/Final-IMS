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
                'birthday' => '2001-11-03',
                'contact' => '9813706413',
                'address' => 'Sifal',
                'department_id' => '1',
                'role_id' => '2',
                'contract_status' => 'active',
                'contract_start_date' => '2022-06-01',
                'contract_end_date' => '2023-11-10',
                'hourly_rate' => '60'
            ],
            [
                'full_name' => 'Tej Agrawal',
                'email' => 'tej.agrawal@deerwalk.edu.np',
                'password' => bcrypt('nicenice'),
                'gender' => 'male',
                'birthday' => '2003-01-26',
                'contact' => '9816011358',
                'address' => 'Ratopul',
                'department_id' => '1',
                'role_id' => '1',
                'contract_status' => 'active',
                'contract_start_date' => '2022-09-01',
                'contract_end_date' => '2023-08-30',
                'hourly_rate' => '60',
                'pan_number' => Crypt::encryptString('27-01-76-07524'),
                'bank_name' => 'NIBL',
                'bank_account' => Crypt::encryptString('00105080463010')
            ],
            [
                'full_name' => 'Kritartha Sapkota',
                'email' => 'kritartha@deerwalk.edu.np',
                'password' => bcrypt('nicenice'),
                'gender' => 'male',
                'birthday' => '2002-01-26',
                'contact' => '9815611358',
                'address' => 'Green Hill',
                'department_id' => '2',
                'role_id' => '1',
                'contract_status' => 'active',
                'contract_start_date' => '2022-09-01',
                'contract_end_date' => '2023-08-30',
                'hourly_rate' => '60',
                'pan_number' => Crypt::encryptString('27-01-76-07524'),
                'bank_name' => 'NIBL',
                'bank_account' => Crypt::encryptString('00105080463010')
            ],
            [
                'full_name' => 'Abiral Khatiwada',
                'email' => 'abiral@deerwalk.edu.np',
                'password' => bcrypt('nicenice'),
                'gender' => 'male',
                'birthday' => '2003-08-15',
                'contact' => '9816011786',
                'address' => 'Kalopul',
                'department_id' => '3',
                'role_id' => '1',
                'contract_status' => 'active',
                'contract_start_date' => '2022-09-01',
                'contract_end_date' => '2023-08-30',
                'hourly_rate' => '60',
                'pan_number' => Crypt::encryptString('27-01-76-07524'),
                'bank_name' => 'NIBL',
                'bank_account' => Crypt::encryptString('00105080463010')
            ],
            [
                'full_name' => 'Aayush Ghimire',
                'email' => 'aayush@deerwalk.edu.np',
                'password' => bcrypt('nicenice'),
                'gender' => 'male',
                'birthday' => '2001-08-09',
                'contact' => '9816011359',
                'address' => 'Ratopul',
                'department_id' => '4',
                'role_id' => '1',
                'contract_status' => 'active',
                'contract_start_date' => '2022-09-01',
                'contract_end_date' => '2023-08-30',
                'hourly_rate' => '60',
                'pan_number' => Crypt::encryptString('27-01-76-07524'),
                'bank_name' => 'NIBL',
                'bank_account' => Crypt::encryptString('00105080463010')
            ],
            [
                'full_name' => 'Aahishma Khanal',
                'email' => 'aahishma@deerwalk.edu.np',
                'password' => bcrypt('nicenice'),
                'gender' => 'female',
                'birthday' => '1995-01-19',
                'contact' => '9816011985',
                'address' => 'Gaushala',
                'department_id' => '1',
                'role_id' => '3',
                'contract_status' => 'active',
                'contract_start_date' => '2022-09-01',
                'contract_end_date' => '2023-08-30',
                'hourly_rate' => '60',
                'pan_number' => Crypt::encryptString('27-01-76-07524'),
                'bank_name' => 'NIBL',
                'bank_account' => Crypt::encryptString('00105080463010')
            ],
            [
                'full_name' => 'Kumar Kumar',
                'email' => 'kumar@deerwalk.edu.np',
                'password' => bcrypt('nicenice'),
                'gender' => 'male',
                'birthday' => '2003-01-24',
                'contact' => '9816261358',
                'address' => 'Mitra park',
                'department_id' => '2',
                'role_id' => '3',
                'contract_status' => 'active',
                'contract_start_date' => '2022-09-01',
                'contract_end_date' => '2023-08-30',
                'hourly_rate' => '60',
                'pan_number' => Crypt::encryptString('27-01-76-07524'),
                'bank_name' => 'NIBL',
                'bank_account' => Crypt::encryptString('00105080463010')
            ],
            [
                'full_name' => 'Ram Ram',
                'email' => 'ram@deerwalk.edu.np',
                'password' => bcrypt('nicenice'),
                'gender' => 'male',
                'birthday' => '2003-01-26',
                'contact' => '9816011358',
                'address' => 'Ratopul',
                'department_id' => '3',
                'role_id' => '3',
                'contract_status' => 'active',
                'contract_start_date' => '2022-09-01',
                'contract_end_date' => '2023-08-30',
                'hourly_rate' => '60',
                'pan_number' => Crypt::encryptString('27-01-76-07524'),
                'bank_name' => 'NIBL',
                'bank_account' => Crypt::encryptString('00105080463010')
            ],
            [
                'full_name' => 'Shyam Shyam',
                'email' => 'shyam@deerwalk.edu.np',
                'password' => bcrypt('nicenice'),
                'gender' => 'male',
                'birthday' => '2003-01-26',
                'contact' => '9816011358',
                'address' => 'Ratopul',
                'department_id' => '4',
                'role_id' => '3',
                'contract_status' => 'active',
                'contract_start_date' => '2022-09-01',
                'contract_end_date' => '2023-08-30',
                'hourly_rate' => '60',
                'pan_number' => Crypt::encryptString('27-01-76-07524'),
                'bank_name' => 'NIBL',
                'bank_account' => Crypt::encryptString('00105080463010')
            ]
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
