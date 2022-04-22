<?php

namespace App\Http\Resources;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TaskResource extends JsonResource
{
    /**
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        /**
         * @var Task $this
         */
        return [
            'id' => $this->id,
            'name' => $this->name,
            'created_at' => $this->created_at,
            'card' => CardResource::make($this->card),
        ];
    }
}
