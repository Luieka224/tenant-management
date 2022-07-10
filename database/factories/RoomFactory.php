<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Room>
 */
class RoomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'number' => $this->faker->buildingNumber(),
            'no_of_bed' => $this->faker->numberBetween(1, 4),
            'price' => $this->faker->randomFloat(2, 10000, 99999),
            'is_available' => $this->faker->numberBetween(0,1),
            'room_type_id' => $this->faker->numberBetween(1,5),
        ];
    }
}
