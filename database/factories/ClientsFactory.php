<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Clients>
 */
class ClientsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'fullName'=> $this->faker->name(),
            'address' => $this->faker->address(),
            'mobileNumber' => $this->faker->phoneNumber(),
            'email' => $this->faker->email(),
            'nic' => $this->faker->regexify('[0-9]{9}[V]'),
            
        ];
    }
}
