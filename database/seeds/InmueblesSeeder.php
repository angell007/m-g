<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InmueblesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for ($i = 0; $i < 150; $i++) {
            DB::table('inmuebles')->insert(array(
                'ciudad' => $faker->city,
                'departamento' => $faker->state,
                'direccion' => $faker->address,
                'propietario_id' => random_int(1, 50),
                'proposito' => $faker->randomElement(['arrendamiento', 'venta']),
                'canon' => $faker->randomFloat(),
                'tipo' => $faker->randomElement(['apartaestudio', 'apartamento', 'casa', 'bodega']),
                'habitaciones' => random_int(0, 4),
            ));
        }
    }
}
