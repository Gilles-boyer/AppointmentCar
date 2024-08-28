<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class TestCenterInstructor extends Pivot
{
    use HasFactory;
    protected $table = 'test_center_instructors';

    protected $fillable = [
        'test_center_id',
        'instructor_id',
    ];
}
