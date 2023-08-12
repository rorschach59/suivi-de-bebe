<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserFactory extends Factory
{

    /**
     * @return array|mixed[]
     */
    public function definition()
    {
        return [
            'name' => 'rorschach',
            'email' => 'john@doe.fr',
            'password' => Hash::make('toto'),
        ];
    }
}
