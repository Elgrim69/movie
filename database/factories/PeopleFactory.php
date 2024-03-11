<?php

namespace Database\Factories;

use App\Models\People;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\People>
 */
class PeopleFactory extends Factory
{
   /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = People::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
                'surname' => $this->faker->lastName,
                'name' => $this->faker->firstName,
                'description' => $this->faker->paragraph,
                'image' => $this->faker->imageUrl(),
            ];
    }
}
