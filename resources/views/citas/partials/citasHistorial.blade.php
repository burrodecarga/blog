<table id="historial" class="table table-striped table-bordered" style="width:100%">
    <thead class="text-center text-primary">
        <tr>
            <th>Fecha de Cita</th>
            <th>Hora de Cita</th>
            <th>Médico</th>
            <th>Especialidad</th>
            <th>Condicion</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody class="text-center">
        @foreach ($citasHistorial as $cita)
        <tr>
            <td scope="row">{{$cita->fecha12}} </td>
            <td scope="row">{{$cita->hora12}} </td>
            <td scope="row">{{$cita->medico->name}} </td>
            <td scope="row">{{$cita->especialidad->especialidad}} </td>
            <td scope="row">{{$cita->condicion}} </td>

            <td  class="text-center">
                <a href="{{route('citas.show',$cita->id)}} " class='btn btn-sm btn-outline-primary ' style='background-color:primary;'>
                    <div style='text-align:center;'><i class="fa fa-search"></i></div>
                    Ver
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
