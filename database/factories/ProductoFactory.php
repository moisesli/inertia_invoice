<?php

namespace Database\Factories;

use App\Models\Producto;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Producto>
 */
class ProductoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Producto::class;

    public function definition()
    {
        return [
           'nombre' => $this->faker->name(),
           'codigo' => $this->faker->swiftBicNumber(),
           'precio_sin_igv' => $this->faker->randomFloat(2,10,500),
           'igv' => $this->faker->randomFloat(2,10,500),
           'precio_con_igv' => $this->faker->randomFloat(2,10,500)
        ];
    }
}
