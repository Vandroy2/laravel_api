<?php

namespace Database\Factories;

use App\Models\ListD;
use Illuminate\Database\Eloquent\Factories\Factory;

class CardFactory extends Factory
{
    /**
     * @return array
     */

    public function definition(): array
    {
        $listId = $this->listId();

        return [
            'name'=>$this->faker->colorName,
            'list_id'=>$listId,
        ];
    }

    public function listId()
    {
        $listIds = ListD::query()->pluck('id')->toArray();

        return $this->faker->randomElement($listIds);
    }

}
