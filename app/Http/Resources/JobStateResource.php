<?php

namespace App\Http\Resources;

use App\Models\JobLog;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property JobLog $resource
 */
class JobStateResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'createdTs' => $this->resource->created_at->timestamp,
            'sheduledForTs' => $this->resource->schedule_at->timestamp,
            'state' => $this->resource->state
        ];
    }
}
