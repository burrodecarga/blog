@extends('layouts.bpp')
@section('content')

<div class="container">
    <div clas="row">
        <div class="col-sm-12 col-md-12 col-lg-11 mx-auto">
            <form action="{{route('medicos.store')}}" method="POST" class="bg-white shadow rounded py-3 px-4">
                @method('POST')
                <h5 class="text-primary font-bold">Nuevo medico</h5>
                <hr>
                @include('medicos.partials.form',['btnText'=>'Guardar'])
            </form>
        </div>
    </div>

</div>

@endsection
