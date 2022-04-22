<?php

namespace App\Http\Resources;

use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CountryResource extends JsonResource
{
    /**
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        /**
         * @var Country $this
         */
        return [
            'name'=>$this->name,
            'census_year' => $this->census_year,
            'people_quantity' => $this->people_quantity,
        ];
    }
}
