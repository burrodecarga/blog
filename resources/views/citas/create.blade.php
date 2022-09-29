@extends('layouts.bpp')
@section('content')
@section('style')
<link rel="stylesheet" href="{{asset('css/bootstrap-datepicker3.min.css')}}">


@endsection
<div class="container">
    <div clas="row">
        @include('citas.partials.errors');

        <div class="col-sm-12 col-md-12 col-lg-12 mx-auto">
            <form id="form" action="{{route('citas.store')}}" method="POST" class="bg-white shadow rounded py-3 px-4">
                @method('POST')
                <h5 class="text-primary font-bold">Reservar Cita Médica</h5>
                <hr>
                @include('citas.partials.form',['btnText'=>'Reservar'])
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
