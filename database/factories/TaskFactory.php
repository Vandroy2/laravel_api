<?php

namespace Database\Factories;

use App\Models\Card;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    /**
     * @return array
     */
    public function definition(): array
    {
        $cardId = $this->cardId();

        return [
            'name'=>$this->faker->company,
            'description' => $this->faker->text(150),
            'card_id'=> $cardId
        ];
    }

    /**
     * @return mixed
     */

    public function cardId()
    {
        $cardIds = Card::query()->pluck('id')->toArray();

        return $this->faker->randomElement($cardIds);
    }
}
