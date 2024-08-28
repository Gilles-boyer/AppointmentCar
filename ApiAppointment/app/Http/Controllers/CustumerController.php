<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustumerRequest;
use App\Models\Custumer;
use App\Http\Resources\CustumerResource;

class CustumerController extends Controller
{
    public function index()
    {
        return CustumerResource::collection(Custumer::all());
    }

    public function store(CustumerRequest $request)
    {
        $custumer = Custumer::create($request->validated());
        return new CustumerResource($custumer);
    }

    public function show(Custumer $custumer)
    {
        return new CustumerResource($custumer);
    }

    public function update(CustumerRequest $request, Custumer $custumer)
    {
        $custumer->update($request->validated());
        return new CustumerResource($custumer);
    }

    public function destroy(Custumer $custumer)
    {
        $custumer->delete();
        return response()->noContent();
    }
}
