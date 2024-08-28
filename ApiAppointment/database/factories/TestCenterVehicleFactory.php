<?php

namespace Database\Factories;

use App\Models\TestCenter;
use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TestCenterVehicle>
 */
class TestCenterVehicleFactory extends Factory
{
    protected $model = \App\Models\TestCenterVehicle::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "test_center_id" => TestCenter::all()->random()->id,
            "vehicle_id" => Vehicle::all()->random()->id
        ];
    }
}
