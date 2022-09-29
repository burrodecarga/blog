@extends('layouts.bpp')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4 bg-white shadow p-5 rounded">
          <img src="{{$medico->avatar}} " alt="">
        </div>
        <div class="col-md-8">
            <div class="bg-white shadow p-5 rounded">
                <h3 class="text-primary">Dr.:{{$medico->name}}</h3>
                 @foreach ($especialidades as $especialidad)
                  <span class="text-success"> {{$especialidad}}, </span>
                 @endforeach
                <hr>

                <h4 class="lead text-primary">Identificador: {{$medico->card_id}} </h4>
                <h4 class="lead text-primary">Correo Electrónico: {{$medico->email}} | Teléfono : {{$medico->phone}}
                </h4>
                <h6>
                    <p class="lead text-primary">
                        Dirección: {{$medico->address}}
                    </p>
                </h6>
                <p class="text-primary">
                    {{$medico->created_at->diffForHumans()}}
                </p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 mt-4">
            <form action="{{route('medicos.destroy',$medico->id)}}" method="POST">
        @csrf
        @method('DELETE')
        <a class="btn btn-success" href="{{route('medicos.edit',$medico->id)}} ">Editar</a>
        <button class="btn btn-danger" type="submit">Eliminar</button>
        <a class="btn btn-info" href="{{route('medicos.index')}} ">Cancelar</a>
    </form>
        </div>

    </div>

</div>


@endsection
