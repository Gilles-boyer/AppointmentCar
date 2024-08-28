<?php

namespace Database\Seeders;

use App\Models\Custumer;
use App\Models\Dealership;
use App\Models\Instructor;
use App\Models\Reservation;
use App\Models\TestCenter;
use App\Models\TestCenterInstructor;
use App\Models\TestCenterVehicle;
use App\Models\User;
use App\Models\Vehicle;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();
        Custumer::factory(20)->create();
        Dealership::factory(10)->create();
        Vehicle::factory(20)->create();
        Instructor::factory(10)->create();
        TestCenter::factory(10)->create();
        TestCenterVehicle::factory(20)->create();
        TestCenterInstructor::factory((20))->create();
        Reservation::factory(20)->create();
    }
}
