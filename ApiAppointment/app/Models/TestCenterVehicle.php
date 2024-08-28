<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class TestCenterVehicle extends Pivot
{
    use HasFactory;
    protected $table = 'test_center_vehicles';

    protected $fillable = [
        'test_center_id',
        'vehicle_id',
    ];
}
