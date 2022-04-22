<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DeskFactory extends Factory
{
    /**
     * @return string[]
     */

    public function definition(): array
    {
        return [

            'name'=>$this->faker->company()
        ];
    }
}
