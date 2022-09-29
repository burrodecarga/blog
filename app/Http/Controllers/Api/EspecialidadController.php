<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Especialidad;

class EspecialidadController extends Controller
{
  public function medicos(Especialidad $especialidad){
      return $especialidad->medicos()->get(['users.id','users.name']);
  }
}
