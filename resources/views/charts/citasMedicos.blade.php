@extends('layouts.bpp')
@section('content')

<div class="card-body">
 <div class="row">
 <div class="col-md-4">
        <div class="form-group">
                <label for="date">Fecha Inicial</label>
                <input
                type="text"
                name="fechaDeInicio"
                id="fechaInicio"
                class="form-control datepicker"
                value="{{ old('start', date('Y-m-d')) }}"
                data-date-format="yyyy-mm-dd"
                data-date-start-date="{{date('Y-m-d')}}"
                data-date-end-date="+15d">
                <small id="helpId" class="text-muted">Fecha de inicio de filtrado</small>
            </div>
 </div>
 <div class="col-md-4">
        <div class="form-group">
                <label for="date">Fecha Final</label>
                <input
                type="text"
                name="fechaDeFin"
                id="FechaFin"
                class="form-control datepicker"
                value="{{ old('end', date('Y-m-d')) }}"
                data-date-format="yyyy-mm-dd"
                data-date-start-date="{{date('Y-m-d')}}"
                data-date-end-date="+15d">
                <small id="helpId" class="text-muted">Fecha de fin de filtrado</small>
            </div>
     </div>
</div>
<div id="grafico"></div>

@endsection
@section('script')
<script src="{{asset('js/highcharts.js')}}"></script>
<script src="{{asset('js/series-label.js')}}"></script>
<script src="{{asset('js/exporting.js')}}"></script>
<script src="{{asset('js/export-data.js')}}"></script>
<script src="{{asset('js/charts/barrasMedicos.js')}} "></script>
<script src="{{asset('js/bootstrap-datepicker.min.js')}} "></script>
<script src="{{asset('js/bootstrap-datepicker.es.min.js')}}" charset="UTF-8"></script>
<script>
    $('.datepicker').datepicker({
        language: 'es',
    });
</script>
@endsection
</div>
