<?php

namespace App\Actions;

class BaseAction
{
    protected array $parameters = [];

    public function setParameters(array $parameters = []): void
    {
        $this->parameters = $parameters;
    }
}
