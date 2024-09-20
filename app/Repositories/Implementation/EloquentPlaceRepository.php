<?php

namespace App\Repositories\Implementation;

use App\Models\Place;
use App\Repositories\PlaceRepository;
use App\ValueObjects\Point;
use Modules\Repository\Eloquent\BaseRepository;

/**
 * @property Place $model
 */
class EloquentPlaceRepository extends BaseRepository implements PlaceRepository
{
    public function model()
    {
        return Place::class;
    }

    public function search(string $longitude, string $latitude): ?Place
    {
        $point = new Point($longitude, $latitude);

        $query = $this->model->newQuery();

        $this->model->scopeWhereContains($query, 'area', $point);

        return $query->first();
    }
}
