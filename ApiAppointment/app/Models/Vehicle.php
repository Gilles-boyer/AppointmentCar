<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'registration_number',
        'model',
        'trim',
        'automatic_transmission',
        'dealership_id',
    ];

    public function dealership()
    {
        return $this->belongsTo(Dealership::class);
    }

    public function testCenters()
    {
        return $this->belongsToMany(TestCenter::class, 'test_center_vehicles')->using(TestCenterVehicle::class);
    }
}
