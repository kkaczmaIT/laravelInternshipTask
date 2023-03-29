<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $fullName = fake()->name;
        $fullName = explode(' ',$fullName);
        return [
            //
            'fName' => $fullName[0],
            'lName' => $fullName[1],
            'email' => fake()->unique()->safeEmail(),
            'address' => 'Address',
            'id_user' => rand(1,4)
        ];
    }
}
