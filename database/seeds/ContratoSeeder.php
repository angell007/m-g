<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContratoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker\Factory::create();
        for ($i = 0; $i < 20; $i++) {
            DB::table('contratos')->insert(array(
                'propietario_id' => random_int(1, 50),
                'codigo' => 'myg-' . $i,
                'arrendatario_id' => random_int(1, 50),
                'inmueble_id' => random_int(1, 50),
                'inicio' => $faker->date(),
                'fin' => $faker->date(),
                'prorroga' => $faker->randomElement(['Si', 'No']),
                'prorroga' => $faker->randomElement(['Si', 'No']),
                'observaciones' => $faker->text(),
            ));
        }
    }
}
