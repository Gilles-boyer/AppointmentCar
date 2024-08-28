<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'custumer_id',
        'test_center_id',
        'instructor_id',
        'vehicle_id',
        'reservation_time',
        'start_time',
        'end_time',
        'client_arrived'
    ];

    public function custumer()
    {
        return $this->belongsTo(Custumer::class, 'custumer_id');
    }

    public function testCenter()
    {
        return $this->belongsTo(TestCenter::class);
    }

    public function instructor()
    {
        return $this->belongsTo(Instructor::class);
    }

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
}
