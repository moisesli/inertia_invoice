<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cliente>
 */
class ClienteFactory extends Factory
{
   /**
    * Define the model's default state.
    *
    * @return array<string, mixed>
    */
   public function definition()
   {
      return [
         'razon_social' => $this->faker->name(),
         'ruc_dni' => $this->faker->numerify('###########'),
         'direccion' => $this->faker->streetAddress(),
         'ubigeo' => $this->faker->numerify('######'),
         'telefonos' => $this->faker->tollFreePhoneNumber(),
         'correo' => $this->faker->email()
      ];
   }
}
