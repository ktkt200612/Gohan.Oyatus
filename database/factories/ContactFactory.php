<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'gender' => $this->faker->numberBetween(1,2),
            'email' =>$this->faker->safeEmail(),
            'opinion' =>$this->faker->realText(120),
            'review1' => $this->faker->numberBetween(0,5),
            'review2' =>$this->faker->numberBetween(0,5),
            'review3' =>$this->faker->numberBetween(0,5),
        ];
    }
}
