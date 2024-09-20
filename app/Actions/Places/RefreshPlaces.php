<?php

namespace App\Actions\Places;

use App\Actions\Action;
use App\Actions\BaseAction;
use App\Http\Resources\SuccessResource;
use App\Jobs\RefreshPlacesJob;
use App\Services\PlaceService;

class RefreshPlaces extends BaseAction implements Action
{
    public function __construct(
        protected PlaceService $service
    ) {
    }

    public function execute(array $parameters = [])
    {
        $this->service->truncate();

        dispatch(new RefreshPlacesJob())->delay((int)($this->parameters['delaySeconds'] ?? 0));

        return SuccessResource::make(true);
    }
}
