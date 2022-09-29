<?php

use Illuminate\Database\Seeder;

class EstadisticasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $estadisticas = factory(App\Estadistica::class, 20)->create();
    }
}
