<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $start = fake()->dateTimeBetween('now', '+1 month');
        $end = fake()->dateTimeBetween($start, (clone $start)->modify('+2 days'));

        return [
            'user_id' => 1,
            'title' => fake()->sentence(4),
            'body' => fake()->text(rand(50, 500)),
            'place' => fake()->city(),
            'start_date' => $start,
            'end_date' => $end
        ];
    }
}
