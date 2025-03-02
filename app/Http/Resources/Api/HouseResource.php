<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Api\CityResource;
use App\Http\Resources\Api\HousePhotoResource;
use App\Http\Resources\Api\HouseFeatureResource;

class HouseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'duration' => $this->duration,
            'price' => $this->price,
            'thumbnail' => $this->thumbnail,
            'about' => $this->about,
            'city' => new CityResource($this->whenLoaded('city')),
            'photos' => HousePhotoResource::collection($this->whenLoaded('photos')),
            'features' => HouseFeatureResource::collection($this->whenLoaded(('features'))),            
        ];
    }
}
