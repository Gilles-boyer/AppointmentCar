<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestCenter extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'start_time_am',
        'end_time_am',
        'start_time_pm',
        'end_time_pm',
        'default_duration',
        'banner_image',
        'logo_image',
        'dealership_id',
    ];

    public function dealership()
    {
        return $this->belongsTo(Dealership::class);
    }
    public function vehicles()
    {
        return $this->belongsToMany(Vehicle::class, 'test_center_vehicles')->using(TestCenterVehicle::class);
    }
    public function instructors()
    {
        return $this->belongsToMany(Instructor::class, 'test_center_instructors')->using(TestCenterInstructor::class);
    }
}
