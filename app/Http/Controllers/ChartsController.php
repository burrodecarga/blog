<?php

namespace App\Http\Controllers;
use Illuminate\Support\Carbon;
use DB;
use Illuminate\Support\Arr;
use App\Estadistica;

use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Integer;

class ChartsController extends Controller
{
    public function citasMedicos()
    {
        $now = Carbon::now();
    	$end = $now->format('Y-m-d');
    	$start = $now->subYear()->format('Y-m-d');
        return view('charts.citasMedicos',compact('start','end','citas','categorias'));
    }

    public function citasMes()
    {
        $now = Carbon::now();
    	$end = $now->format('Y-m-d');
    	$start = $now->subYear()->format('Y-m-d');
        return view('charts.citasMes',compact('start','end','citas','categorias'));
    }

    public function citasJsonMedicos()
    {
        $citas = Estadistica::select('medico',\DB::raw('sum(atendidas) as atendidas'),
        \DB::raw('sum(confirmadas) as confirmadas'),
        \DB::raw('sum(canceladas) as canceladas'),
        \DB::raw('sum(reservadas) as reservadas'))
       ->groupBy('medico')
       ->orderBy('atendidas','desc')
       ->take(10)
       ->get();
       //dd($citas);
       $data=[];
       $series=[];
       $categorias=[];
       $serie1=[];
       $serie2=[];
       $serie3=[];
       $serie4=[];
       $serie1['name']="Atendidas";
       $serie2['name']="Confirmadas";
       $serie3['name']="Resevadas";
       $serie4['name']="Canceladas";
       foreach ($citas as $cita) {
          $categorias[]=$cita->medico;
          $serie11[] =(int) $cita->atendidas;
          $serie21[] =(int) $cita->confirmadas;
          $serie31[] =(int) $cita->reservadas;
          $serie41[] =(int) $cita->canceladas;
       }
       $serie1['data']=$serie11;
       $serie2['data']=$serie21;
       $serie3['data']=$serie31;
       $serie4['data']=$serie41;
       $data['categories']=$categorias;
       $series[]=$serie1;
       $series[]=$serie2;
       $series[]=$serie3;
       $series[]=$serie4;
       $data['series']=$series;
       //dd($data);
       return $data;
    }


    public function citasJsonMes()
    {
        $citas = Estadistica::select('mes',\DB::raw('sum(atendidas) as atendidas'),
        \DB::raw('sum(confirmadas) as confirmadas'),
        \DB::raw('sum(canceladas) as canceladas'),
        \DB::raw('sum(reservadas) as reservadas'))
       ->groupBy('mes')
       ->orderBy('mes','desc')
       ->take(10)
       ->get();
       //dd($citas);
       $data=[];
       $series=[];
       $categorias=[];
       $serie1=[];
       $serie2=[];
       $serie3=[];
       $serie4=[];
       $serie1['name']="Atendidas";
       $serie2['name']="Confirmadas";
       $serie3['name']="Resevadas";
       $serie4['name']="Canceladas";
       foreach ($citas as $cita) {
          $categorias[]=$cita->mes;
          $serie11[] =(int) $cita->atendidas;
          $serie21[] =(int) $cita->confirmadas;
          $serie31[] =(int) $cita->reservadas;
          $serie41[] =(int) $cita->canceladas;
       }
       $serie1['data']=$serie11;
       $serie2['data']=$serie21;
       $serie3['data']=$serie31;
       $serie4['data']=$serie41;
       $data['categories']=$categorias;
       $series[]=$serie1;
       $series[]=$serie2;
       $series[]=$serie3;
       $series[]=$serie4;
       $data['series']=$series;
       //dd($data);
       return $data;
    }

}

