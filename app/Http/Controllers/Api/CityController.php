<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\CityResource as ApiCityResource;
use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index() {
        $cities = City::withCount('houses')->get();
        return ApiCityResource::collection($cities); // Menggunakan collection karena akan menampilkan semua data
    }

    public function show(City $city) { // Menggunakan model bending dari laravel
        $city->load(['houses.city', 'houses.photos']);
        $city->load('houses');
        return new ApiCityResource($city); // Menggunakan new karena hanya satu data yang akan ditampilkan
    }
}
