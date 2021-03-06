<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(ArrendatarioSeeder::class);
        // $this->call(PropietarioSeeder::class);
        // $this->call(InmueblesSeeder::class);
        // $this->call(ContratoSeeder::class);
        // $this->call(DescuentoSeeder::class);
        // $this->call(PagoRealizadoSeeder::class);
        // $this->call(PagoRecibidoSeeder::class);
        // $this->call(PendienteSeeder::class);

        User::create([
            'name' => 'Angell',
            'email' => 'mgrisalez1@udi.edu.co',
            'password'=>Hash::make('Angell00-7')
        ]);
    }
}
