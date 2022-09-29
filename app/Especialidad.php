<?php

namespace App;
use App\User;
use App\Cita;

use Illuminate\Database\Eloquent\Model;

class Especialidad extends Model
{
    protected $table="especialidades";

    protected $fillable = [
        'especialidad', 'descripcion',
    ];

    public function users(){
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    public function medicos(){
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    public function citas(){
        return $this->belongsTo(Cita::class);
    }

}
