<?php

namespace App\DTO;

class PlaceDTO
{
    public function __construct(
        protected string $name,
        protected string $lat,
        protected string $lng,
        protected array $area,
    ) {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getLat(): string
    {
        return $this->lat;
    }

    public function getLng(): string
    {
        return $this->lng;
    }

    public function getArea(): array
    {
        return $this->area;
    }
}
