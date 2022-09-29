@extends('layouts.bpp')

@section('content')
@section('css')
<link rel="stylesheet" href="{{asset('css/bootstrap.css')}} ">
<link rel="stylesheet" href="{{asset('css/dataTables.bootstrap4.min.css')}}">
@endsection
<div class="container">
    <div class="card">
        <div class="card-header d-flex flex-row  justify-content-between ">
            <h5 class="m-0 text-primary">Listado de Citas {{auth()->user()->role}} : {{auth()->user()->name}} </h5>
            @if(auth()->user()->role<>'admin')
            <a href="{{route('citas.create')}} " class="btn btn-primary btn-sm">Nueva cita</a>
            @endif
        </div>

        <div class="card-body">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab"
                        aria-controls="pills-home" aria-selected="true" title=" Medico Tratante Debe confirmar cita">Próximas Citas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab"
                        aria-controls="pills-profile" aria-selected="false" title=" Medico Tratante confirrmó cita">Citas Confirmadas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab"
                        aria-controls="pills-contact" aria-selected="false" title=" Historial de citas atendidas y canceladas">Historial de Citas</a>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    @include('citas.partials.citasReservadas')
                    @include('citas.partials.seccionReservada')
                    @include('citas.partials.seccionConfirmada')


                </div>
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                    @include('citas.partials.citasConfirmadas')

                </div>
                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                    @include('citas.partials.citasHistorial')
                    @include('citas.partials.seccionHistorial')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
