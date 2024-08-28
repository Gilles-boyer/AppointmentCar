<?php

namespace App\Http\Controllers;

use App\Http\Requests\DealershipRequest;
use App\Http\Resources\DealershipResource;
use App\Models\Dealership;


class DealershipController extends Controller
{
    public function index()
    {
        return DealershipResource::collection(Dealership::all());
    }

    public function store(DealershipRequest $request)
    {
        $dealership = Dealership::create($request->validated());
        return new DealershipResource($dealership);
    }

    public function show(Dealership $dealership)
    {
        return new DealershipResource($dealership);
    }

    public function update(DealershipRequest $request, Dealership $dealership)
    {
        $dealership->update($request->validated());
        return new DealershipResource($dealership);
    }

    public function destroy(Dealership $dealership)
    {
        $dealership->delete();
        return response()->noContent();
    }
}
