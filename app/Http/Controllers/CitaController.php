<?php

namespace App\Http\Controllers;
use App\Especialidad;
use App\Cita;
use App\CitaCancelada;
use App\Estadistica;
use App\Http\Requests\CitaStoreRequest;
use Illuminate\Http\Request;
use App\Interfaces\CallendarioServiceInterface;
use Illuminate\Support\Carbon;

class CitaController extends Controller
{

    public function index()
    {
        $rol=auth()->user()->role;
        if($rol=='paciente'){$usuario='paciente_id';}else{$usuario='medico_id';}
        if($rol<>'admin')
        {
        $citas=Cita::all();
        $citasReservadas=Cita::orderBy('fechaDeCita')->where('condicion','Reservado')->where($usuario,auth()->id())->get();
        $citasConfirmadas=Cita::orderBy('fechaDeCita')->where('condicion','Confirmada')->where($usuario,auth()->id())->get();
        $citasHistorial=Cita::orderBy('fechaDeCita')->whereIn('condicion',['Atendida','Cancelada'])->where($usuario,auth()->id())->get();
        }else{
            $citasReservadas=Cita::orderBy('fechaDeCita')->where('condicion','Reservado')->get();
            $citasConfirmadas=Cita::orderBy('fechaDeCita')->where('condicion','Confirmada')->get();
            $citasHistorial=Cita::orderBy('fechaDeCita')->whereIn('condicion',['Atendida','Cancelada'])->get();

        }
        return view('citas.index',compact('citasReservadas','citasConfirmadas','citasHistorial','rol'));
    }


    public function create(CallendarioServiceInterface $calendarioService)
    {
        $especialidades=Especialidad::orderBy('especialidad')->get();
        $especialidadId=old('especialidad_id');
        if($especialidadId){
            $especialidad=Especialidad::find($especialidadId);
            $medicos=$especialidad->medicos;
        }else{ $medicos=collect();}

        $fechaDeCita=old('fechaDeCita');
        $doctorId=old('medico_id');
        if($fechaDeCita && $doctorId){
            $intervalos=$calendarioService->getHorasDisponibles($fechaDeCita,$doctorId);
        }else{ $intervalos=null;}

        return view('citas.create',compact('especialidades','medicos','intervalos'));
    }

    public function store(CitaStoreRequest $request, CallendarioServiceInterface $calendarioService)
    {
       $fecha=$request->input('fechaDeCita');
       $doctorId=$request->input('medico_id');
       $start=$request->input('horaDeCita');
       $start= new Carbon($start);
       $disponible=$calendarioService->horaDisponible($fecha,$doctorId,$start);
       if(!$disponible){
           $errors=[
           'fechaDeCita'=>'La hora no está disponible',
           ];
        return back()->withErrors($errors);
       };
       $medico=$request->input('medico_id');
       $especialidad=$request->input('especialidad_id');


       $data=[
            'medico_id' =>$request->input('medico_id'),
            'especialidad_id' =>$request->input('especialidad_id'),
            'fechaDeCita' =>$request->input('fechaDeCita'),
            'descripcion' =>$request->input('descripcion'),
        ];
        $data['paciente_id']= auth()->id();
        $horaCarbon= new Carbon($request->input('horaDeCita'));
        $data['horaDeCita']=$horaCarbon->format('H:i:s');

        $cita = Cita::create($data);
        $anteriores=Estadistica::where('user_id',$medico)
                                 ->where('especialidad_id',$especialidad)
                                 ->first();

        if($anteriores->isEmpty()){
        $estadisticas = Estadistica::create([
            'user_id' =>$request->input('medico_id'),
            'especialidad_id' =>$request->input('especialidad_id'),
            'atendidas'=>0,
            'confirmadas'=>0,
            'canceladas'=>0,
            'reservadas'=>1.
            ]);

        }
        else{
            $reservadas=$anteriores->reservadas+1;
            $anteriores->update('reservadas',$reservadas);

        }
        return back();
    }

    public function cancelar(Cita $cita, Request $request)
    {
        if($request->input('justificacion')){
            $cancelacion = new CitaCancelada();
            $cancelacion->justificacion= $request->input('justificacion');
            $cancelacion->cancelado_por_id= auth()->id();
            $cita->cancelacion()->save($cancelacion);
        }
        $cita->condicion='Cancelada';
        $cita->save();
        $medico=$cita->medico_id;
        $especialidad=$cita->especialidad_id;

        $anteriores=Estadistica::where('user_id',$medico)
                                 ->where('especialidad_id',$especialidad)
                                 ->first();

        if(!$anteriores->isEmpty())
        {
            $canceladas=$anteriores->canceladas+1;
            $anteriores->update('canceladas',$canceladas);

        }

        return redirect(route('citas.index'));
    }

    public function confirmar(Cita $cita)
    {
        $cita->condicion='Confirmada';
        $cita->save();
        $medico=$cita->medico_id;
        $especialidad=$cita->especialidad_id;

        $anteriores=Estadistica::where('user_id',$medico)
                                 ->where('especialidad_id',$especialidad)
                                 ->first();

        if(!$anteriores->isEmpty())
        {
            $confirmadas=$anteriores->confirmadas+1;
            $anteriores->update('confirmadas',$confirmadas);
        }

        return redirect(route('citas.index'));
    }



    public function formCancelar(Cita $cita)
    {
        return view('citas.formCancelar',compact('cita'));
    }

    public function show(Cita $cita)
    {
        return view('citas.show',compact('cita'));
    }
}
