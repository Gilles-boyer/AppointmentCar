<?php

namespace App\Http\Controllers;

use App\Http\Requests\TestCenterRequest;
use App\Http\Resources\TestCenterResource;
use App\Models\TestCenter;


class TestCenterController extends Controller
{
    public function index()
    {
        return TestCenterResource::collection(TestCenter::all());
    }

    public function store(TestCenterRequest $request)
    {
        $testCenter = TestCenter::create($request->validated());
        return new TestCenterResource($testCenter);
    }

    public function show(TestCenter $testCenter)
    {
        return new TestCenterResource($testCenter);
    }

    public function update(TestCenterRequest $request, TestCenter $testCenter)
    {
        $testCenter->update($request->validated());
        return new TestCenterResource($testCenter);
    }

    public function destroy(TestCenter $testCenter)
    {
        $testCenter->delete();
        return response()->noContent();
    }
}
