<?php

namespace Database\Factories;

use App\Models\Tarea;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Tarea>
 */
class TareaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'project_id' => $this->faker->numberBetween(1,100),
            'name' => $this->faker->word(),
            'description' => $this->faker->paragraph(),
            'status' => $this->faker->word(),
            'priority' => $this->faker->word(),
            'due_date' => $this->faker->date()
        ];
    }
}
