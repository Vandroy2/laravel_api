<?php

namespace Database\Factories;

use App\Models\Desk;
use Illuminate\Database\Eloquent\Factories\Factory;

class ListDFactory extends Factory
{
    /**
     * @return array
     */
    public function definition(): array
    {
        /**
         * @var Desk $desk
         */
        $deskId = $this->deskId();

        return [
            'name'=> $this->faker->dayOfWeek,
            'desk_id'=>$deskId,
        ];
    }

    public function deskId()
    {
        $deskIds = Desk::query()->pluck('id')->toArray();

        return $this->faker->randomElement($deskIds);
    }
}
