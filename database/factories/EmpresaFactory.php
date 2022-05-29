<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class EmpresaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
           'ruc' => $this->faker->numerify('###########'),
           'razon_social' => $this->faker->name(),
           'razon_comercial' => $this->faker->name(),
           'direccion' => $this->faker->streetAddress(),
           'responsable' => $this->faker->name(),
           'telefono' => $this->faker->tollFreePhoneNumber(),
           'celular' => $this->faker->tollFreePhoneNumber(),
           'ubigeo' => $this->faker->numerify('######')
        ];
    }
}
