<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class RemindersFactory extends Factory
{

    /**
     * @return array|mixed[]
     */
    public function definition()
    {
        return [
            'text' => fake()->text(30),
            'date' => fake()->dateTimeThisYear(),
        ];
    }
}
