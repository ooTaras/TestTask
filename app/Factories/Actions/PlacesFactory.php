<?php

namespace App\Factories\Actions;

use App\Actions\Places\RefreshPlaces;
use App\Actions\Places\SearchPlaces;
use App\Enums\PlacesActionsEnum;

class PlacesFactory extends BaseFactory
{
    protected function actions(string $actionType): string
    {
        return match ($actionType){
            PlacesActionsEnum::REFRESH->value => RefreshPlaces::class,
            PlacesActionsEnum::SEARCH->value => SearchPlaces::class,
            default => throw new \Exception('There is no type of action')
        };
    }
}
