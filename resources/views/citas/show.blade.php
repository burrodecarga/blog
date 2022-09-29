@extends('layouts.bpp')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4 bg-white shadow p-5 rounded">
        </div>
        <div class="col-md-8">
            <div class="bg-white shadow p-5 rounded">
                <h3 class="text-primary">Doctor:{{$cita->medico->name}}</h3>
                  <span class="text-success"> {{$cita->especialidad->especialidad}}, </span>
                <hr>
                <h3 class="text-primary">Paciente:{{$cita->paciente->name}}</h3>
              <hr>

                <h4 class="lead text-primary">Número de Cita: {{$cita->id}} </h4>
                <h4 class="lead text-primary">Fecha de Cita: {{$cita->fecha12}} | Hora : {{$cita->hora12}}
                </h4>
                <h6>
                    <p class="lead text-primary">
                        Motivo de Consulta: {{$cita->descripcion}}
                    </p>
                </h6>
                <p class="text-primary">
                  Cita creada:   {{$cita->created_at->diffForHumans()}}
                </p>

                <p class="text-primary">
                        Condición de Cita:   {{$cita->condicion}}
                      </p>
                @if($cita->cancelacion)
                <div class="alert alert-danger" role="alert">
                    <ul>
                        <li><strong> Motivo de Cancelación: {{$cita->cancelacion->justificacion}} </strong></li>
                        <li><strong> Fecha de Cancelación: {{$cita->cancelacion->created_at}} </strong></li>
                        <li><strong> Cancelado por: {{$cita->cancelacion->cancelado_por->name}} </strong></li>

                    </ul>
                </div>
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 mt-4">
       <a class="btn btn-info" href="{{route('citas.index')}} ">Regresar</a>

        </div>

    </div>

</div>


@endsection
