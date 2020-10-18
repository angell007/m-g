<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DescuentoSeeder extends Seeder
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
            DB::table('descuentos')->insert(array(
                'contrato_id' => random_int(1, 50),
                'user_id' => 1,
                'inmueble_id' => random_int(1, 50),
                'fecha' => $faker->date(),
                'concepto' => $faker->text(),
                'valor' => $faker->randomNumber(),
                'estado' => $faker->word(),
                'observaciones' => $faker->text(),
            ));
        }
    }
}
