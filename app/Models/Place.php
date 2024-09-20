<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use MatanYadaev\EloquentSpatial\Objects\Polygon;
use MatanYadaev\EloquentSpatial\Traits\HasSpatial;

/**
 * @property string $name
 * @property string $lat
 * @property string $lng
 * @property Polygon $area
 */
class Place extends Model
{
    use HasSpatial;

    protected $fillable = [
        'name',
        'lat',
        'lng',
        'area',
    ];

    protected $casts = [
        'area' => Polygon::class,
    ];
}
