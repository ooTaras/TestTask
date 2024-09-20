<?php

namespace App\Actions;

interface Action
{
    public function execute();

    public function setParameters(array $parameters = []): void;
}
