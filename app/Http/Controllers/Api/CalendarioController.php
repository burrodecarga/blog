<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Interfaces\CallendarioServiceInterface;
use Illuminate\Http\Request;

class CalendarioController extends Controller
{
   public function horas(Request $request, CallendarioServiceInterface $calendarioService)
   {
       //dd($request->all());
       $user_id=$request->input('doctorId');
       $fecha=$request->input('date');
       return $calendarioService->getHorasDisponibles($fecha,$user_id);
   }



}

