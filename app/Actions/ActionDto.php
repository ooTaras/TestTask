<?php

namespace App\Actions;

class ActionDto
{
    public function __construct(
        protected string $action,
        protected array $parameters,
    ) {
    }

    public function getAction(): string
    {
        return $this->action;
    }

    public function getParameters(): array
    {
        return $this->parameters;
    }
}
