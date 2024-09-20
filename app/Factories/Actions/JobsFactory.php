<?php

namespace App\Factories\Actions;

use App\Actions\Jobs\ListJobs;
use App\Enums\JobActionsEnum;

class JobsFactory extends BaseFactory
{
    protected function actions(string $actionType): string
    {
        return match ($actionType) {
            JobActionsEnum::LIST->value => ListJobs::class,
            default                     => throw new \Exception('There is no type of action')
        };
    }
}
