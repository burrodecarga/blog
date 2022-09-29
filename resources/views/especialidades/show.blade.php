@extends('layouts.bpp')
@section('content')
<div class="container">
    <div class="bg-white shadow p-5 rounded">
        <h3 class="text-primary">{{$especialidad->especialidad}}</h3>
        <h6>
            <p class="lead text-secondary">
                {{$especialidad->descripcion}}
            </p>
        </h6>
        <p class="text-secondary black-50">
                {{$especialidad->created_at->diffForHumans()}}
            </p>

        <form action="{{route('especialidades.destroy',$especialidad)}}" method="POST">
            @csrf
            @method('DELETE')
            <a class="btn btn-success" href="{{route('especialidades.edit',$especialidad)}} ">Editar</a>
            <button class="btn btn-danger" type="submit">Eliminar</button>
            <a class="btn btn-info" href="{{route('especialidades.index')}} ">Cancelar</a>

        </form>
    </div>

</div>


@endsection
