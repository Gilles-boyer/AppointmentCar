<?php

namespace Database\Factories;

use App\Models\Custumer;
use App\Models\Instructor;
use App\Models\TestCenter;
use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reservation>
 */
class ReservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'custumer_id' => Custumer::all()->random()->id,
            'test_center_id' => TestCenter::all()->random()->id,
            'instructor_id' => Instructor::all()->random()->id,
            'vehicle_id' => Vehicle::all()->random()->id,
            'reservation_time' => $this->faker->time(),
            'start_time' => $this->faker->optional()->time(),
            'end_time' => $this->faker->optional()->time(),
            'client_arrived' => $this->faker->boolean,
        ];
    }
}
