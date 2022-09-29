@csrf
<div class="form-group">
    <label for="especialidad" class="text-primary">Especialidad:</label>
    <input type="text" name="especialidad" id="especialidad" value="{{old('especialidad',$especialidad->especialidad)}}" placeholder="especialidad de la especialidad"
        class="form-control bg-light shadow-sm @error('especialidad') is-invalid @else border-0  @enderror ">
    @error('especialidad')
    <span class="invalidfeedback" role="alert">
        <strong>{{$message}} </strong>
    </span>
    @enderror
</div>

<div class="form-group">
    <label for="descripcion" class="text-primary">Descripción de Especialidad:</label>
    <input type="text" name="descripcion" id="descripcion" value="{{old('descripcion',$especialidad->descripcion)}}"
        placeholder="descripcion de la especialidad"
        class="form-control bg-light shadow-sm @error('descripcion') is-invalid @else border-0  @enderror ">
    @error('descripcion')
    <span class="invalidfeedback" role="alert">
        <strong>{{$message}} </strong>
    </span>
    @enderror
</div>

<button type="submit" class="btn btn-success">{{$btnText}} </button>
<a class="btn btn-danger" href="{{route('especialidades.index')}} ">Cancelar</a>
