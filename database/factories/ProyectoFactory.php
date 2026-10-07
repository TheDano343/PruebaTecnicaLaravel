<?php

namespace Database\Factories;

use App\Models\Proyecto;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Proyecto>
 */
class ProyectoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'client_id' => $this->faker->numberBetween(1,100),
            'name' => $this->faker->word(),
            'description' => $this->faker->word(),
            'status' => $this->faker->word(),
            'start_date' => $this->faker->date(),
            'end_date' => $this->faker->date()
        ];
    }
}
