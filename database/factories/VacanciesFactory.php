<?php

namespace Database\Factories;

use App\Models\Vacancies;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vacancies>
 */
class VacanciesFactory extends Factory
{

    protected $model = Vacancies::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->words(3, true),
            'description' => fake()->text(100),
            'requirements' => fake()->text(100),
            'salary' => fake()->numberBetween(40000, 400000),
        ];
    }
}
