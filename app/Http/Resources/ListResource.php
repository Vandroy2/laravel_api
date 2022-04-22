<?php

namespace App\Http\Resources;

use App\Models\ListD;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ListResource extends JsonResource
{
    /**
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        /**
         * @var ListD $this
         */
        return [
            'id' => $this->id,
            'name' => $this->name,
            'created_at' => $this->created_at,
            'desk' => DeskResource::make($this->desk),
            'cards' => CardResource::collection($this->cards),
        ];
    }
}
