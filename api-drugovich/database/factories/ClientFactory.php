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
        return [
            'name' => $this->faker->name,
            'cnpj' => $this->faker->cnpj,
            'group_id' => $this->faker->numberBetween(1, 2),
            'foundation_date' => $this->faker->date,
            'deleted_at' => null,
        ];
    }
}
