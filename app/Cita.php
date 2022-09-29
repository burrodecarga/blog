<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Especialidad;
use Carbon\Carbon;

class Cita extends Model
{
   protected $fillable=[
     'paciente_id',
     'medico_id',
     'especialidad_id',
     'fechaDeCita',
     'horaDeCita',
     'descripcion',
   ];

   //accessor
   public function getHora12Attribute(){
       return (new Carbon($this->horaDeCita))->format('g:i A');
   }

   public function getfecha12Attribute(){
    return (new Carbon($this->fechaDeCita))->format('d-m-Y');
}


   ///cita->especialidad
   public function especialidad(){
       return $this->belongsTo(Especialidad::class);
   }


   ///cita->doctor laravel busca medico_id en users
   public function medico(){
    return $this->belongsTo(User::class);
   }
   //Cita->paciente laravel busca paciente_id en users
   public function paciente(){
    return $this->belongsTo(User::class);
   }
   //cita->cancelacion->>by,justificacion
   public function cancelacion()
   {
       return $this->hasOne(CitaCancelada::class);
   }
}
