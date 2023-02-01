<?php

namespace Database\Factories;

use App\Models\Debug;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Debug>
 */
class DebugFactory extends Factory

{

    protected $model = Debug::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'nameString' => $this->faker->name(),
            'nameChar' => $this->faker->word(),
            'integer' => $this->faker->randomDigit(),
            'boolean' => $this->faker->boolean(),
            'float' => $this->faker->randomFloat(2, 2, 10),
            'double' => $this->faker->randomFloat(2, 2, 10),
            'decimal' => $this->faker->randomFloat(2, 2, 10),
            'dateTime' => $this->faker->dateTime(),
            'date' => $this->faker->date(),
            'uuidColumn' => $this->faker->uuid(),
            'year' => $this->faker->year(),
            'foreignId' => $this->faker->randomDigit(),
            'enum' => $this->faker->randomElement(['item1', 'item2', 'item3']),
            'uploadedFile' => $this->faker->imageUrl(360, 360, 'debug', true, 'item', true, 'jpg'),

        ];
    }
}
