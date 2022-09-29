<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use App\User;

class CitaCancelada extends Model
{
   protected $table='citas_canceladas';


   public function cancelado_por()
   {
    return $this->belongsTo(User::class);
   }


}
