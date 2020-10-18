<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PendienteSeeder extends Seeder
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
            DB::table('pendientes')->insert(array(
                'user_id' => 1,
                'contrato_id' => random_int(1, 50),
                'fecha' => $faker->date(),
                'estado' => $faker->word(),
                'body' => $faker->text(),
            ));
        }
    }
}
