<?php

namespace App\Http\Resources;

use App\Models\Card;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CardResource extends JsonResource
{

    /**
     * @param Request $request
     * @return array
     */

    public function toArray($request): array
    {
        /**
         * @var Card $this
         */
        return [
            'id' => $this->id,
            'name' => $this->name,
            'created_at' => $this->created_at,
            'list' => ListResource::make($this->list),
            'tasks' => TaskResource::collection($this->tasks)
        ];
    }
}
