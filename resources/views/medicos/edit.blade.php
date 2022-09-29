@extends('layouts.bpp')
@section('content')
<div class="container">
    <div clas="row">
        <div class="col-sm-12 col-md-12 col-lg-8 mx-auto">
            <form action="{{route('medicos.update',$medico)}}" method="POST" class="bg-white shadow rounded py-3 px-4">
                @method('PUT')
                @include('medicos.partials.form',['btnText'=>'Actualizar'])
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $(document).ready(()=>{
        $('#especialidad').selectpicker('val',@json($especialidades_id));
    });
</script>

@endsection
