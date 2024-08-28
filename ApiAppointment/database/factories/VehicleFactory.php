<?php

namespace Database\Factories;

use App\Models\Dealership;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vehicle>
 */
class VehicleFactory extends Factory
{
    protected $model = \App\Models\Vehicle::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'registration_number' => $this->faker->unique()->bothify('??-####-??'),
            'model' => $this->faker->word,
            'trim' => $this->faker->word,
            'automatic_transmission' => $this->faker->boolean,
            'dealership_id' => Dealership::all()->random()->id
        ];
    }
}
