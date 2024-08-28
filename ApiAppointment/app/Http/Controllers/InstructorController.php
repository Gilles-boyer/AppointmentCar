<?php

namespace App\Http\Controllers;

use App\Http\Requests\InstructorRequest;
use App\Http\Resources\InstructorResource;
use App\Models\Instructor;


class InstructorController extends Controller
{
    public function index()
    {
        return InstructorResource::collection(Instructor::all());
    }

    public function store(InstructorRequest $request)
    {
        $instructor = Instructor::create($request->validated());
        return new InstructorResource($instructor);
    }

    public function show(Instructor $instructor)
    {
        return new InstructorResource($instructor);
    }

    public function update(InstructorRequest $request, Instructor $instructor)
    {
        $instructor->update($request->validated());
        return new InstructorResource($instructor);
    }

    public function destroy(Instructor $instructor)
    {
        $instructor->delete();
        return response()->noContent();
    }
}
