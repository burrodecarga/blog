<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Estadistica;
use App\Especialidad;
use App\User;
use App\Model;
use Faker\Generator as Faker;

$factory->define(Estadistica::class, function (Faker $faker) {
    $especialidades=Especialidad::all()->pluck('id');
    $especialidadesN=Especialidad::all()->pluck('especialidad')->take(20);
    $medicos=User::medicos()->pluck('id');
    $medicosN=User::medicos()->pluck('name')->take(20);

    return [
        'user_id'=>$faker->unique()->randomElement($medicos),
        'especialidad_id'=>$faker->unique()->randomElement($especialidades),
        'medico'=>$faker->randomElement($medicosN),
        'especialidad'=>$faker->randomElement($especialidadesN),
        'reservadas'=>$faker->numberBetween(10, $max = 90),
        'confirmadas'=>$faker->numberBetween(10, $max = 90),
        'atendidas'=>$faker->numberBetween(10, $max = 90),
        'canceladas'=>$faker->numberBetween(10, $max = 90),
        'mes'=>$faker->numberBetween(1, $max = 12),
        'created_at'=>$faker->dateTimeBetween($startDate = '-180 days', $endDate = 'now'),
    ];
});
