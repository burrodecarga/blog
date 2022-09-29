@extends('layouts.bpp')

@section('content')
@section('css')
<link rel="stylesheet" href="{{asset('css/bootstrap.css')}} ">
<link rel="stylesheet" href="{{asset('css/dataTables.bootstrap4.min.css')}}">
@endsection
<div class="container">
    <div class="card">
  <div class="card-header d-flex flex-row  justify-content-between ">
   <h5 class="m-0 text-primary">Listado de Especialidades</h5>
     <a href="{{route('especialidades.create')}} " class="btn btn-primary btn-sm">Nueva Especialidad</a>

  </div>

        <div class="card-body">

            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead class="text-center text-primary">
                    <tr>
                        <th>Especialidad</th>
                        <th>Descripción</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($especialidades as $especialidad)
                    <tr>
                        <td scope="row">{{$especialidad->especialidad}} </td>
                        <td scope="row">{{$especialidad->descripcion}} </td>
                        <td  class="text-center">
                            <a href="{{route('especialidades.show',$especialidad->id)}} " class='btn btn-sm btn-outline-primary ' style='background-color:primary;'>
                                <div style='text-align:center;'><i class="fa fa-search"></i></div>
                                Ver
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>
@section('script')
<script src="{{asset('js/jquery-3.3.1.js')}} "></script>
<script src="{{asset('js/jquery.dataTables.min.js')}} "></script>
<script src="{{asset('js/dataTables.bootstrap4.min.js')}} "></script>
<script>
    $(document).ready(function() {
           $('#example').DataTable({
            "columnDefs": [{ "targets": [2], "orderable": false }],
            "pagingType":"full_numbers",
  "destroy":true,
            "language":{
                "info": "Mostrando pag  _PAGE_ de _PAGES_  páginas,  Total de Registros: _TOTAL_ ",
                "search":"Buscar",
                "paginate":{
                    "next":"Siguiente",
                    "previous":"Anterior",
                    "last":"Último",
                    "first":"Primero",
                },

                "lengthMenu":"Mostrar  <select class='custom-select custom-select-sm'>"+
                              "<option value='5'>5</option>"+
                              "<option value='10'>10</option>"+
                              "<option value='15'>15</option>"+
                              "<option value='20'>20</option>"+
                              "<option value='25'>25</option>"+
                              "<option value='50'>50</option>"+
                              "<option value='100'>100</option>"+
                              "<option value='-1'>Todos</option>"+
                              "</select> Registros",
                "loadingRecord":"Cargando....",
                "processing":"Procesando...",
                "emptyTable":"No hay Registros",
                "zeroRecords":"No hay coincidencias",
                "infoEmpty":"",
                "infoFiltered":""
            }
           });
        } );

</script>

@endsection
@endsection

