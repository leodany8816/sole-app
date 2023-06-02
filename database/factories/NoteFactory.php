<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Note>
 */
class NoteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'description' => $this->faker->text(1000),
            'writing_date' => $this->faker->date(),
            'noteable_id' => $this->faker->randomElement([1, 2, 3, 4]),
            'noteable_type' => $this->faker->randomElement(['App\ModelsAuthor', 'App\Models\Book']),
            'user_id' => User::all()->random()->id,
        ];
    }
}
