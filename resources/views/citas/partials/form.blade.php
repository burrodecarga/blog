@csrf
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="especialidad">Especialidad</label>
            <select class="form-control" name="especialidad_id" id="especialidad" required>
                <option value="0">Selecciones una Especialidad</option>
                @foreach ($especialidades as $especialidad)
                <option value="{{$especialidad->id}}" @if($especialidad->id==old('especialidad_id')) selected @endif >{{$especialidad->especialidad}} </option>
                @endforeach
            </select>
        </div>

    </div>
    <div class="col-md-5">
        <div class="form-group">
            <label for="doctors">Médico Especialista</label>
            <select class="form-control" name="medico_id" id="doctors">
                    @foreach ($medicos as $medico)
                    <option value="{{$medico->id}}" @if($medico->id==old('medico_id')) selected @endif >{{$medico->name}} </option>
                    @endforeach
            </select>
        </div>
    </div>

    <input type="hidden" id="base" value="{{URL::to('/')}}">

    <div class="col-md-3">
        <div class="form-group">
            <label for="date">Fecha de Reservacion</label>
            <input
            type="text"
            name="fechaDeCita"
            id="date"
            class="form-control datepicker"
            value="{{ old('fechaDeCita', date('Y-m-d')) }}"
            data-date-format="yyyy-mm-dd"
            data-date-start-date="{{date('Y-m-d')}}"
            data-date-end-date="+15d">
            <small id="helpId" class="text-muted">Fecha de Reservación</small>
        </div>
    </div>
</div>
<div class="form-group ">
    <div id="horas">
        @if($intervalos)
        @foreach ($intervalos['morning'] as $key=>$intervalo)
        <div class="custom-control custom-radio">
                <input type="radio" class="custom-control-input" id="morningKey{{$key}} " name="horaDeCita" value="{{intervalo['start']}}">
                <label class="custom-control-label" for="morningKey{{$key}} ">{{$intervalo['start']}}-{{$intervalo['end']}} </label>
              </div>
        @endforeach
        @foreach ($intervalos['afternoon'] as $key=>$intervalo)
        <div class="custom-control custom-radio">
                <input type="radio" class="custom-control-input" id="afternoonKey{{$key}} " name="horaDeCita" value="{{intervalo['start']}}">
                <label class="custom-control-label" for="afternoonKey{{$key}} ">{{$intervalo['start']}}-{{$intervalo['end']}} </label>
              </div>
        @endforeach

        @else
        <div class="alert alert-primary" role="alert">
            Seleccione una especialidad y un médico para obtener el horario disponible de consultas!
        </div>
        @endif
    </div>
</div>

<div class="input-group">
    <div class="input-group-prepend">
        <span class="input-group-text">Motivo de Cita</span>
    </div>
    <textarea name="descripcion" class="form-control" aria-label="With textarea">{{old('descripcion')}}</textarea>
</div>




<div class="form-group mt-5">
    <button type="submit" class="btn btn-success">{{$btnText}} </button>
    <a class="btn btn-danger" href="{{route('especialidades.index')}} ">Cancelar</a>
</div>
</div>
