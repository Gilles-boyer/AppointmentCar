<?php

namespace Database\Factories;

use App\Models\Dealership;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TestCenter>
 */
class TestCenterFactory extends Factory
{
    protected $model = \App\Models\TestCenter::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'date' => $this->faker->date(),
            'start_time_am' => $this->faker->time(),
            'end_time_am' => $this->faker->time(),
            'start_time_pm' => $this->faker->optional()->time(),
            'end_time_pm' => $this->faker->optional()->time(),
            'default_duration' => $this->faker->numberBetween(30, 120),
            'banner_image' => $this->faker->optional()->imageUrl(),
            'logo_image' => $this->faker->imageUrl(),
            'dealership_id' => Dealership::all()->random()->id,
        ];
    }
}
