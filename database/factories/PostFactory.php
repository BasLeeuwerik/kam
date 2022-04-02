<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id'       => $this->faker->numberBetween(1, 100),
            'title'         => $this->faker->text(10),
            'category_id'   => $this->faker->numberBetween(1, 20),
            'body'          => $this->faker->text(200),
            'created_at'    => $this->faker->date(),
        ];
    }
}
