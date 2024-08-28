<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
    ];

    public function testCenters()
    {
        return $this->belongsToMany(TestCenter::class, 'test_center_instructors')->using(TestCenterInstructor::class);
    }
}
