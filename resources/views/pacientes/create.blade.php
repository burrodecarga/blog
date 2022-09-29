@extends('layouts.bpp')
@section('content')
<div class="container">
    <div clas="row">
        <div class="col-sm-12 col-md-12 col-lg-11 mx-auto">
            <form action="{{route('pacientes.store')}}" method="POST" class="bg-white shadow rounded py-3 px-4">
                @method('POST')
                <h5 class="text-primary font-bold">Nuevo Paciente</h5>
                <hr>
                @include('pacientes.partials.form',['btnText'=>'Guardar'])
            </form>
        </div>
    </div>

</div>
@endsection
