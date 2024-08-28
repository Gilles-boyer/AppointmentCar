<?php

namespace Database\Factories;

use App\Models\Instructor;
use App\Models\TestCenter;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TestCenterInstructor>
 */
class TestCenterInstructorFactory extends Factory
{

    protected $model = \App\Models\TestCenterInstructor::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "test_center_id" => TestCenter::all()->random()->id,
            "instructor_id" => Instructor::all()->random()->id
        ];
    }
}
