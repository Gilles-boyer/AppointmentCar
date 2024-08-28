<?php

namespace App\Http\Controllers;

use App\Http\Requests\TestCenterInstructorRequest;
use App\Models\Instructor;
use App\Models\TestCenter;

class TestCenterInstructorController extends Controller
{
    public function store(TestCenterInstructorRequest $request)
    {
        $testCenter = TestCenter::findOrFail($request->test_center_id);
        $instructor = Instructor::findOrFail($request->instructor_id);

        $testCenter->instructors()->attach($instructor);

        return response()->json(['message' => 'Instructor added to Test Center successfully.'], 201);
    }

    public function destroy(TestCenterInstructorRequest $request)
    {
        $testCenter = TestCenter::findOrFail($request->test_center_id);
        $instructor = Instructor::findOrFail($request->instructor_id);

        $testCenter->instructors()->detach($instructor);

        return response()->json(['message' => 'Instructor removed from Test Center successfully.'], 200);
    }
}
