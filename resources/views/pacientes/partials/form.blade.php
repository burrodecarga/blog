@csrf
<input type="hidden" name="id" value="{{$paciente->id}} ">
<div class="row">
    <div class="col-md-8">
        <div class="form-group">
            <label for="name" class="text-primary">Nombre y Apellido:</label>
            <input type="text" name="name" id="name" value="{{old('name',$paciente->name)}}"
                placeholder="Ingrese Nombre y Apellido"
                class="form-control bg-light shadow-sm @error('name') is-invalid @else border-0  @enderror ">
            @error('name')
            <span class="invalidfeedback" role="alert">
                <strong>{{$message}} </strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="card_id" class="text-primary">Documento de Identidad:</label>
            <input type="text" name="card_id" id="card_id" value="{{old('card_id',$paciente->card_id)}}"
                placeholder="Ingrese Documento de Identidad"
                class="form-control bg-light shadow-sm @error('card_id') is-invalid @else border-0  @enderror ">
            @error('card_id')
            <span class="invalidfeedback" role="alert">
                <strong>{{$message}} </strong>
            </span>
            @enderror
        </div>

    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="email" class="text-primary">Correo Electrónico:</label>
            <input type="text" name="email" id="email" value="{{old('email',$paciente->email)}}"
                placeholder="Ingrese Correo Electrónico"
                class="form-control bg-light shadow-sm @error('email') is-invalid @else border-0  @enderror ">
            @error('email')
            <span class="invalidfeedback" role="alert">
                <strong>{{$message}} </strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="phone" class="text-primary">Teléfono:</label>
            <input type="text" name="phone" id="phone" value="{{old('phone',$paciente->phone)}}"
                placeholder="Ingrese Teléfono"
                class="form-control bg-light shadow-sm @error('phone') is-invalid @else border-0  @enderror ">
            @error('phone')
            <span class="invalidfeedback" role="alert">
                <strong>{{$message}} </strong>
            </span>
            @enderror
        </div>
    </div>
</div>

<div class="form-group">
    <label for="address" class="text-primary">Dirección:</label>
    <input type="text" name="address" id="address" value="{{old('address',$paciente->address)}}"
        placeholder="Ingrese Dirección"
        class="form-control bg-light shadow-sm @error('address') is-invalid @else border-0  @enderror ">
    @error('address')
    <span class="invalidfeedback" role="alert">
        <strong>{{$message}} </strong>
    </span>
    @enderror
</div>





<button type="submit" class="btn btn-success">{{$btnText}} </button>
<a class="btn btn-danger" href="{{route('pacientes.index')}} ">Cancelar</a>
