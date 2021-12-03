<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence(2, true),
            //true akan return sebagai string jika tidak return sebagai array
            'descriptions' => $this->faker->sentence(3, true),
            'price' => $this->faker->randomDigit(),
            'weight' => $this->faker->randomDigit(),
            'stock' => $this->faker->randomDigit(),
            'category' => $this->faker->word(),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];
    }
}
