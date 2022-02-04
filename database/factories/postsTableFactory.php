<?php

namespace Database\Factories;
use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;
class postsTableFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
  
            'title' => $this->faker->sentence(5),
            'description'=> $this->faker->sentence(15),
            'user_id'=> \App\Models\User::all()->random()->id,
        ];
    }
}
