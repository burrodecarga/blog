@extends('layouts.bpp')
@section('content')
<div class="container">
    <div clas="row">
        <div class="col-sm-12 col-md-12 col-lg-8 mx-auto">
            <form action="{{route('pacientes.update',$paciente)}}" method="POST" class="bg-white shadow rounded py-3 px-4">
                @method('PUT')
                @include('pacientes.partials.form',['btnText'=>'Actualizar'])
            </form>
        </div>
    </div>
</div>
@endsection
