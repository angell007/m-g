<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PagoRealizadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for ($i = 0; $i < 30; $i++) {
            DB::table('pago_realizados')->insert(array(
                'propietario_id' => random_int(1, 50),
                'contrato_id' => random_int(1, 50),
                'user_id' => 1,
                'fecha' => $faker->date(),
                'concepto' => $faker->randomNumber(),
                'valor' => $faker->randomNumber(),
                'comision' => $faker->randomNumber(),
                'iva' => $faker->randomNumber(),
                'canon' => $faker->randomNumber(),
                'estado' => $faker->word(),
                'observaciones' => $faker->text(),
            ));
        }
    }
}
