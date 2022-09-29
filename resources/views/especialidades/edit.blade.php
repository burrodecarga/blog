@extends('layouts.bpp')
@section('content')
<div class="container">
    <div clas="row">
        <div class="col-sm-12 col-md-12 col-lg-8 mx-auto">
            <form action="{{route('especialidades.update',$especialidad)}}" method="POST" class="bg-white shadow rounded py-3 px-4">
                @method('PUT')
                <input type="hidden" name="id" value="{{$especialidad->id}} ">
                @include('especialidades.partials.form',['btnText'=>'Actualizar'])
            </form>
        </div>
    </div>
</div>
@endsection
