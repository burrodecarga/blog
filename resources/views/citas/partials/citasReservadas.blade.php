<table id="reservada" class="table table-striped table-bordered" style="width:100%">
    <thead class="text-center text-primary">
        <tr>
            <th>Fecha de Cita</th>
            <th>Hora de Cita</th>
            @if($rol=='paciente')
            <th>Médico</th>
            @elseif ($rol=='medico')
            <th>Paciente</th>
            @else
            <th>Paciente</th>
            <th>Médico</th>
            @endif

            <th>Especialidad</th>
            @if($rol=='medico' || $rol=='admin')
            <th></th>
            @endif
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody class="text-center">
        @foreach ($citasReservadas as $cita)
        <tr>
            <td scope="row">{{$cita->fecha12}} </td>
            <td scope="row">{{$cita->hora12}} </td>
            @if($rol=='paciente')
            <td scope="row">{{$cita->medico->name}} </td>
            <td scope="row">{{$cita->especialidad->especialidad}}</td>
            @elseif ($rol=='medico')
            <td scope="row">{{$cita->paciente->name}} </td>
            <td scope="row">{{$cita->especialidad->especialidad}}</td>
            @else
            <td scope="row">{{$cita->paciente->name}} </td>
            <td scope="row">{{$cita->medico->name}} </td>
            <td scope="row">{{$cita->especialidad->especialidad}}</td>
            @endif

            @if($rol=='medico' || $rol=='admin')
            <td  class="text-center">
                    <form action="{{route('citas.confirmar',$cita->id)}}" method="POST">
                        @csrf
                        @method('POST')
                        <button type="submit" class="btn btn-success btn-sm">Confirmar</button>
                    </form>
            </td>
            @endif

            <td  class="text-center">
                <form action="{{route('citas.cancelar',$cita->id)}}" method="POST">
                    @csrf
                    @method('POST')
                    <button type="submit" class="btn btn-danger btn-sm">Cancelar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
