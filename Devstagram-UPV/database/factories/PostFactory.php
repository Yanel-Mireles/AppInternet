<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
             //lenamos la table post
            'titulo'=>$this->faker->sentence(5),
            'descripcion'=>$this->faker->sentence(26),
            'imagen'=>$this->faker->uuid().'jpg',
            //agregamos a los usuarios par alas prubeas
            'user_id'=>$this->faker->randomElement([1,2,3,4])

        ];
    }
}
