<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PagoRecibidoSeeder extends Seeder
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
            DB::table('pago_recibidos')->insert(array(
                'arrendatario_id' => random_int(1, 50),
                'user_id' => 1,
                'contrato_id' => random_int(1, 50),
                'fecha' => $faker->date(),
                'concepto' => $faker->text(),
                'valor' => $faker->randomNumber(),
                'estado' => $faker->word(),
                'observaciones' => $faker->text(),
            ));
        }
    }
}
