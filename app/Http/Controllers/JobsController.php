<?php

namespace App\Http\Controllers;

use App\Factories\Actions\JobsFactory;
use App\Http\Requests\JobsRequest;

class JobsController extends Controller
{
    public function list(JobsRequest $request, JobsFactory $factory)
    {
        return $factory->make($request->toDto())->execute();
    }
}
