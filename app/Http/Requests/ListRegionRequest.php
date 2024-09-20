<?php

namespace App\Http\Requests;

use App\Actions\ActionDto;
use App\Enums\PlacesActionsEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class ListRegionRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'action' => ['required', 'string', new Enum(PlacesActionsEnum::class)],
            'lat' => ['string', 'between:-90,90'],
            'lon' => ['string', 'between:-180,180']
        ];
    }

    public function toDto(): ActionDto
    {
        return new ActionDto($this->get('action'), $this->validated());
    }
}
