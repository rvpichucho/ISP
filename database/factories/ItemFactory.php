<?php

namespace Database\Factories;

use App\Models\Item;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ItemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Item::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id'=> User::factory(),
            'cedula'=> $this->faker->word,
            'nombre'=> $this->faker->word,
            'apellido'=> $this->faker->word,
            'direccion'=> $this->faker->word,
            'celular'=> $this->faker->word,
            'plan'=> $this->faker->word,
            'ip'=> $this->faker->word,
            'estado'=> $this->faker->boolean()

        ];
    }
}
