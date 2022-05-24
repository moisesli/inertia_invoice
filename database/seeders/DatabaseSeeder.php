<?php

namespace Database\Seeders;

use App\Models\Cliente;
use App\Models\Producto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
       //$this->call(ProductoSeeder::class);
       Producto::factory(50)->create();
       Cliente::factory(50)->create();

       DB::table('users')->insert([
          'name' => Str::random(10),
          'email' => 'elnaufrago2009@gmail.com',
          'password' => Hash::make('moiseslinar3s'),
       ]);
    }
}
