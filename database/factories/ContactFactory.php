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
            'fullname' => $this->faker->name,
            'gender' => $this->faker->numberBetween(1, 2),
            'email' => $this->faker->safeEmail(),
            'postcode' => $this->faker->regexify('[1-9]{3}-[0-9]{4}'),
            'address' => $this->faker->prefecture() . $this->faker->streetAddress(),
            'building_name' => $this->faker->text(20),
            'opinion' => $this->faker->text(100),
        ];
    }
}
