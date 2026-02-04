<?php

namespace App\Http\Controllers;

use App\Http\Resources\CityResource;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\City;
use App\Http\Requests\CityRequest;
use Illuminate\Http\JsonResponse;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResource
    {
        return CityResource::collection(City::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CityRequest $request): JsonResponse
    {
        $city = City::create($request->validated());

        return response()->json([
            'success' => true,
            'data' => new CityResource($city)
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
        $city = City::find($id);

        return response()->json($city, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CityRequest $request, string $id): JsonResponse
    {
        $city = City::find($id);

        $city->name = $request->name;
        $city->population = $request->population;
        $city->postalcode = $request->postalcode;
        $city->save();

        return response()->json([
            'success' => true,
            'data' => new CityResource($city),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        $city = City::find($id);

        if ($city) {
            $city->delete();
        }

        return response()->json([
            'success' => true
        ], 200);
    }
}
