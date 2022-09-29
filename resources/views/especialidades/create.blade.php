@extends('layouts.bpp')
@section('content')
<div class="container">
    <div clas="row">
        <div class="col-sm-12 col-md-12 col-lg-8 mx-auto">
            <form action="{{route('especialidades.store')}}" method="POST" class="bg-white shadow rounded py-3 px-4">
                @method('POST')
                <h5 class="text-primary font-bold">Nueva Especialidad</h5>
                <hr>
                @include('especialidades.partials.form',['btnText'=>'Guardar'])
            </form>
        </div>
    </div>

</div>
@endsection
