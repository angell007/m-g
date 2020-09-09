<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PropietarioSeeder extends Seeder
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
            DB::table('propietarios')->insert(array(
                'nombre' => $faker->name,
                'apellido' => $faker->name,
                'email' => $faker->email,
                'identificacion' => $faker->randomNumber(5),
                'tipo_identificacion' => 'CC',
                'ciudad' => $faker->city,
                'departamento' => $faker->state,
                'direccion' => $faker->address,
                'barrio' => $faker->city,
                'telefono' => $faker->phoneNumber,
                'opcional_telefono' => $faker->phoneNumber,
                'accept' => 'Activo',
            ));
        }
    }
}
