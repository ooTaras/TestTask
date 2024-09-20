<?php

namespace App\Http\Requests;

use App\Actions\ActionDto;
use App\Enums\JobActionsEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class JobsRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'action' => ['required', 'string', new Enum(JobActionsEnum::class)],
            'limit' => ['nullable', 'integer']
        ];
    }

    public function toDto(): ActionDto
    {
        return new ActionDto($this->get('action'), $this->validated());
    }
}
