<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TbmRunnerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'external_id'=>2,
            'name'=>'abc',
            'race_id'=> 2
        ];
    }
}
