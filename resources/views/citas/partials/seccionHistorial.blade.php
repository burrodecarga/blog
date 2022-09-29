@section('script')
<script src="{{asset('js/jquery-3.3.1.js')}} "></script>
<script src="{{asset('js/jquery.dataTables.min.js')}} "></script>
<script src="{{asset('js/dataTables.bootstrap4.min.js')}} "></script>
<script>
    $(document).ready(function() {
           $('#historial').DataTable({
            "columnDefs": [{ "targets": [], "orderable": false }],
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
