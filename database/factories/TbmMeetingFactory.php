<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TbmMeetingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => "John Khan",
            'external_id' => 2,
        ];
    }
}
