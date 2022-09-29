@extends('layouts.bpp')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4 bg-white shadow p-5 rounded">
          <img src="{{$paciente->avatar}} " alt="">
        </div>
        <div class="col-md-8">
            <div class="bg-white shadow p-5 rounded">
                <h3 class="text-primary">Paciente:{{$paciente->name}}</h3>
                <h4 class="lead text-primary">Identificador: {{$paciente->card_id}} </h4>
                <h4 class="lead text-primary">Correo Electrónico: {{$paciente->email}} | Teléfono : {{$paciente->phone}}
                </h4>
                <h6>
                    <p class="lead text-primary">
                        Dirección: {{$paciente->address}}
                    </p>
                </h6>
                <p class="text-primary">
                    {{$paciente->created_at->diffForHumans()}}
                </p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 mt-4">
            <form action="{{route('pacientes.destroy',$paciente->id)}}" method="POST">
        @csrf
        @method('DELETE')
        <a class="btn btn-success" href="{{route('pacientes.edit',$paciente->id)}} ">Editar</a>
        <button class="btn btn-danger" type="submit">Eliminar</button>
        <a class="btn btn-info" href="{{route('pacientes.index')}} ">Cancelar</a>
    </form>
        </div>

    </div>

</div>


@endsection
