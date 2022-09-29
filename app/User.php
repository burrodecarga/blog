<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = ['name', 'email', 'password', 'address', 'phone', 'card_id', 'role', 'avatar'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','pivot',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function scopePacientes($query)
    {
        return $query->where('role','paciente');
    }

    public function scopeMedicos($query)
    {
        return $query->where('role','medico');
    }

    public function especialidades()
    {
        return $this->belongsToMany(Especialidad::class)->withTimestamps();
    }
}
