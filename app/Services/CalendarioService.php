<?php

namespace App\Services;

use App\Interfaces\CallendarioServiceInterface;
use App\WorkDay;
use App\Cita;
use Illuminate\Support\Carbon;

class CalendarioService implements CallendarioServiceInterface
{
    private function getDayFromDate($fecha)
     {
        $diaCarbon= new Carbon($fecha);
        $i=$diaCarbon->dayOfWeek;
        $day=(($i==0)? 6:$i-1);
        return $day;
     }


    public function horaDisponible($fecha, $medicoId, Carbon $start)
    {
        $existe=Cita::where('fechaDeCita',$fecha)
        ->where('medico_id',$medicoId)
        ->where('horaDeCita', $start->format('H:i:s'))
        ->exists();
        return !$existe;

    }
    public function getHorasDisponibles($fecha, $medicoId)
    {

        $workday = WorkDay::where('active', true)
            ->where('day', $this->getDayFromDate($fecha))
            ->where('user_id', $medicoId)
            ->first([
                'morning_start', 'morning_end',
                'afternoon_start', 'afternoon_end'
            ]);

        $morning_interval = $this->getIntervalo($workday['morning_start'], $workday['morning_end'], $fecha, $medicoId);
        $afternoon_interval = $this->getIntervalo($workday['afternoon_start'], $workday['afternoon_end'], $fecha, $medicoId);
        $data = [];
        $data['morning'] = $morning_interval;
        $data['afternoon'] = $afternoon_interval;
        return $data;
    }

    private function getIntervalo($start,$end,$fecha, $medicoId){
        $start=new Carbon($start);
        $end =new Carbon($end);
        $intervalos=[];
        while($start<$end){
             $intervalo=[];

             $existe=$this->horaDisponible($fecha,$medicoId,$start);
             $intervalo['start'] = $start->format('g:i A');
             $start=$start->addMinute(30);
             $intervalo['end'] = $start->format('g:i A');

             if($existe)
             {
                 $intervalos[]=$intervalo;
             }

        }
       return $intervalos;
    }
}
