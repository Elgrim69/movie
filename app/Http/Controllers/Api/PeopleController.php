<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PeopleRequest;
use App\Http\Resources\PeopleResource;
use App\Models\People;
use Illuminate\Http\Request;

class PeopleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return PeopleResource::collection(People::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PeopleRequest $request)
    {
        $people = People::create($request->validated());
        return new PeopleResource($people);
    }

    /**
     * Display the specified resource.
     */
    public function show(People $people)
    {
        return new PeopleResource($people);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PeopleRequest $request, People $people)
    {
        $people->update($request->validated());
        return new PeopleResource($people);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(People $people)
    {
        $people->delete();

        return response()->noContent();
    }
}
