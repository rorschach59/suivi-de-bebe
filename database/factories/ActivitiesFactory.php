<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ActivitiesFactory extends Factory
{

    /**
     * @return array|mixed[]
     */
    public function definition()
    {
        return [
            'name' => fake()->text(10),
            'notes' => fake()->text(30),
            'status' => rand(0, 1),
            'date' => fake()->dateTimeThisYear(),
        ];
    }
}
