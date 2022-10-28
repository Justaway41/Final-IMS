<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            [
                "full_name" => "Admin",
                "email" => "admin@gmail.com",
                "password" => "admin",
                "gender" => "male",
                "birthday" => "10/21/2022",
                "contact" => "98134502056",
                "address" => "admin gau",
                "department_id" => "1",
                "role_id" => "2",
                "contract_status" => "active",
                "contract_start_date" => "10/21/2022",
                "contract_end_date" => "10/21/2022",
                "hourly_rate" => "60",
                'remember_token' => Str::random(10),
            ]
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
