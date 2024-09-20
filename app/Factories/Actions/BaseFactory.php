<?php

namespace App\Factories\Actions;

use App\Actions\Action;
use App\Actions\ActionDto;

abstract class BaseFactory
{
    public function make(ActionDto $actionDto): Action
    {
        /** @var Action $action */
        $action = resolve($this->actions($actionDto->getAction()));

        $action->setParameters($actionDto->getParameters());

        return $action;
    }

    protected abstract function actions(string $actionType): string;
}
