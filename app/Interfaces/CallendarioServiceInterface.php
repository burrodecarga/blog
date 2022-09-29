<?php namespace App\Interfaces;

use Illuminate\Support\Carbon;

interface CallendarioServiceInterface
{
   public function getHorasDisponibles($fecha,$medicoId);
   public function  horaDisponible($fecha, $medicoId, Carbon $start);
}

