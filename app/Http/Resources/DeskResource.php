<?php

namespace App\Http\Resources;

use App\Models\Desk;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DeskResource extends JsonResource
{
    /**
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        /**
         * @var Desk $this
         */
        return [
            'id' => $this->id,
            'name' => $this->name,
            'created_at' => $this->created_at,
            'lists' => ListResource::collection($this->lists),
        ];
    }
}
