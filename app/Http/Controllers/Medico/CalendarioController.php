<?php

namespace App\Http\Controllers\Medico;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\WorkDay;
use Illuminate\Support\Carbon;

class CalendarioController extends Controller
{
    public function edit()
    {

        $workDays = WorkDay::where('user_id', auth()->id())->get();

        if (count($workDays) > 0) {
            $workDays->map(function ($workDay) {
                $workDay->morning_start = (new Carbon($workDay->morning_start))->format('g:i A');
                $workDay->morning_end = (new Carbon($workDay->morning_end))->format('g:i A');
                $workDay->afternoon_start = (new Carbon($workDay->afternoon_start))->format('g:i A');
                $workDay->afternoon_end = (new Carbon($workDay->afternoon_end))->format('g:i A');
                return $workDay;
            });
        } else {
            $workDays = collect();
            for ($i=0; $i<7; ++$i)
                $workDays->push(new WorkDay());
        }
        $dias = DIA;
        return view('calendario.edit', compact('dias', 'workDays'));
    }

    public function store(Request $request)
    {
        $active = $request->input('active') ?: [];
        $morning_start = $request->input('morning_start');
        $morning_end = $request->input('morning_end');
        $afternoon_start = $request->input('afternoon_start');
        $afternoon_end = $request->input('afternoon_end');


        dd($morning_end);
        $errors = [];
        for ($i = 0; $i < 7; $i++) {
            if ($morning_start[$i] > $morning_end[$i]) {
                // dd($morning_start[$i].' '.$morning_end[$i]);
                $errors[] = "Horas del turno mañana inconsistentes para el día " . DIA[$i];
            }
            if ($afternoon_start[$i] > $afternoon_end[$i]) {
                $errors[] = "Horas del turno tarde inconsistentes para el día " . DIA[$i];
            }
            WorkDay::updateOrCreate(
                [
                    'day' => $i,
                    'user_id' => auth()->id(),
                ],
                [

                    'active' => in_array($i, $active),
                    'morning_start' => $morning_start[$i],
                    'morning_end' => $morning_end[$i],
                    'afternoon_start' => $afternoon_start[$i],
                    'afternoon_end' => $afternoon_end[$i],

                ]
            );
        }
        //dd($errors);
        if (count($errors) > 0) {
            return back()->with(compact('errors'));
        } else {
            $mensaje = "Los Cambios se guardaron correctamente";
            return back()->with(compact('mensaje'));
        }
    }

    
}
