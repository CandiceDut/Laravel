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
    public function definition(): array
    {
        return [
            'nom' => $this->faker->name(),
            'prenom' => $this->faker->firstname(),
            'age' => $this->faker->numberBetween(18,70),
            'adresse' => $this->faker->address(),
            'email' => $this->faker->unique()->safeEmail(),
            'carteBancaire' => $this->faker->creditCardNumber()
        ];
    }
}
