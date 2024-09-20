<?php

namespace App\Http\Requests;

use App\Actions\ActionDto;
use App\Enums\PlacesActionsEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class UpdateRegionRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'action' => ['required', 'string', new Enum(PlacesActionsEnum::class)],
            'delaySeconds' => ['nullable', 'integer']
        ];
    }

    public function toDto(): ActionDto
    {
        return new ActionDto($this->get('action'), $this->validated());
    }
}
