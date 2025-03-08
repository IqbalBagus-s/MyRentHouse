<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\HouseResource as ApiHouseResource;
use App\Models\House;
use Illuminate\Http\Request;

class HouseController extends Controller
{
    public function index() {
        $house = House::withCount('houses')->get();
        return ApiHouseResource::collection($house); // Menggunakan collection karena akan menampilkan semua data namun dibatasi 6
    }

    public function show(House $house) { // Menggunakan model bending dari laravel
        $house->load(['city', 'photos', 'features']);
        return new ApiHouseResource($house); // Menggunakan new karena hanya satu data yang akan ditampilkan
    }
}
