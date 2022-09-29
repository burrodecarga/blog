@extends('layouts.bpp')
@section('content')
@section('style')
<link rel="stylesheet" href="{{asset('css/bootstrap-datepicker3.min.css')}}">


@endsection
<div class="container">
    <div clas="row">
        @include('citas.partials.errors');

        <div class="col-sm-12 col-md-12 col-lg-12 mx-auto">
            <form id="form" action="{{route('citas.cancelar',$cita->id)}}" method="POST" class="bg-white shadow rounded py-3 px-4">
                @method('POST')
                @csrf
                <h5 class="text-primary font-bold">Motivo de Cancelación de Cita Médica</h5>
                <hr>
                <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Motivo de Cancelación</span>
                        </div>
                        <textarea name="justificacion" class="form-control" aria-label="With textarea" required >{{old('descripcion')}}</textarea>
                    </div>



                    <div class="form-group mt-5">
                        <button type="submit" class="btn btn-success">Cancelar Cita </button>
                        <a class="btn btn-danger" href="{{route('citas.index')}} ">Volver sin Cancelar</a>
                    </div

            </form>
        </div>
    </div>

</div>
@endsection
@section('script')
<script src="{{asset('js/bootstrap-datepicker.min.js')}} "></script>
<script src="{{asset('js/bootstrap-datepicker.es.min.js')}}" charset="UTF-8"></script>
<script src="{{asset('js/citas/create.js')}}"></script>
<script>
    $('.datepicker').datepicker({
        language: 'es',
    });
</script>
@endsection
