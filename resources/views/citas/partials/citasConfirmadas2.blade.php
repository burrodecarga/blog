<table id="confirmada" class="table table-striped table-bordered" style="width:100%">
    <thead class="text-center text-primary">
        <tr>
            <th>Fecha de Cita</th>
            <th>Hora de Cita</th>
            <th>Médico</th>
            <th>Especialidad</th>

            <th>Acciones</th>
        </tr>
    </thead>
    <tbody class="text-center">
        @foreach ($citasConfirmadas as $cita)
        <tr>
            <td scope="row">{{$cita->fecha12}} </td>
            <td scope="row">{{$cita->hora12}} </td>
            <td scope="row">{{$cita->medico->name}} </td>
            <td scope="row">{{$cita->especialidad->especialidad}} </td>

            <td  class="text-center">
                <a href="{{route('citas.formCancelar',$cita->id)}} " class='btn btn-sm btn-outline-primary ' style='background-color:primary;'>
                    <div style='text-align:center;'><i class="fa fa-trash"></i></div>
                    Cancelar
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
