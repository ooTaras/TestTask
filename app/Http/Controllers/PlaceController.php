<?php

namespace App\Http\Controllers;

use App\Factories\Actions\PlacesFactory;
use App\Http\Requests\ListRegionRequest;
use App\Http\Requests\UpdateRegionRequest;
use App\Http\Resources\GeoCacheableResource;
use App\Http\Resources\SuccessResource;
use App\Services\PlaceService;

class PlaceController extends Controller
{
    public function __construct(
        protected PlaceService $placeService
    ) {
    }

    public function list(ListRegionRequest $request, PlacesFactory $factory): GeoCacheableResource
    {
        return $factory->make($request->toDto())->execute();
    }

    public function update(UpdateRegionRequest $request, PlacesFactory $factory): SuccessResource
    {
        return $factory->make($request->toDto())->execute();
    }

    public function delete(): SuccessResource
    {
        $this->placeService->truncate();

        return SuccessResource::make(true);
    }
}
