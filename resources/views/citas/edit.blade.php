@extends('layouts.bpp')
@section('content')
@section('style')
<link href="{{asset('css/bootstrap4-toggle.min.css')}}" rel="stylesheet">
@endsection
<div class="container">
    <div class="card">
        <div class="card-body">

            @if(session('mensaje'))
             <div class="alert alert-success" role="alert">
                 {{session('mensaje')}}
             </div>
            @endif

            @if(session('errors'))
             <div class="alert alert-danger">
                 @foreach ($errors as $error)
                 <ul>
                     <li>{{$error}} </li>
                 </ul>
                 @endforeach

             </div>
            @endif

            <form action="{{route('citas.store')}} " method="POST">
                @csrf
                <div class="botonera d-flex justify-content-between p-2 align-content-center">
                    <h4 class="card-title m-0">Gestión de Horario</h4>
               <input type="submit" value="Guardar Cambios" class="btn btn-sm btn-success float-right">

                </div>
                <table class="table table-bordered table-hover table-striped text-primary">
                    <thead>
                        <tr>
                            <th>Día</th>
                            <th>Activo</th>
                            <th>Mañana</th>
                            <th>Tarde</th>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach ($workDays as $key=>$workDay)


                        <tr>
                            <td>{{$dias[$key]}} </td>
                            <td>
                                <input type="checkbox" data-toggle="toggle" data-size="sm" name="active[]" value="{{$key}}" @if($workDay->active) checked @endif>
                            </td>
                            <td>
                                <div class="row">
                                    <div class="col">
                                        <select class="form-control" name="morning_start[]">
                                            @for($i=6;$i<=11;$i++) <option value="{{($i<10 ? '0':''). $i}}:00" @if($i.':00 AM'==$workDay->morning_start) selected @endif>{{$i}}:00 AM </option>
                                                                   <option value="{{($i<10 ? '0':''). $i}}:30" @if($i.':30 AM'==$workDay->morning_start) selected @endif>{{$i}}:30 AM </option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div class="col">
                                        <select class="form-control" name="morning_end[]">
                                            @for($i=6;$i<=12;$i++)
                                            @if($i<12)
                                            <option value="{{($i<10 ? '0':''). $i}}:00" @if($i.':00 AM'==$workDay->morning_end) selected @endif>{{$i}}:00 AM </option>
                                            <option value="{{($i<10 ? '0':''). $i}}:30" @if($i.':30 AM'==$workDay->morning_end) selected @endif>{{$i}}:30 AM </option>
                                            @else
                                            <option value="{{$i}}:00" @if($i.':00 PM'==$workDay->morning_end) selected @endif>{{$i}}:00 PM </option>
                                            @endif
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="row">
                                    <div class="col">
                                        <select class="form-control" name="afternoon_start[]">
                                            @for($i=0;$i<=11;$i++)
                                            @if($i<>0)
                                            <option value="{{$i+12}}:00" @if($i.':00 PM'==$workDay->afternoon_start) selected @endif>{{$i}}:00 PM  </option>
                                            <option value="{{$i+12}}:30" @if($i.':30 PM'==$workDay->afternoon_start) selected @endif>{{$i}}:30 PM  </option>
                                            @else
                                            <option value="{{12}}:00" @if('12:00 PM'==$workDay->afternoon_start) selected @endif>{{12}}:00 PM  </option>
                                            <option value="{{12}}:30" @if('12:30 PM'==$workDay->afternoon_start) selected @endif>{{12}}:30 PM  </option>
                                            @endif
                                            @endfor
                                        </select>
                                    </div>
                                    <div class="col">
                                        <select class="form-control" name="afternoon_end[]">
                                            @for($i=0;$i<=11;$i++)
                                            @if($i<>0)
                                            <option value="{{$i+12}}:00" @if($i.':00 PM'==$workDay->afternoon_end) selected @endif>{{$i}}:00 PM  </option>
                                            <option value="{{$i+12}}:30" @if($i.':30 PM'==$workDay->afternoon_end) selected @endif>{{$i}}:30 PM  </option>
                                            @else
                                            <option value="{{12}}:00" @if('12:00 PM'==$workDay->afternoon_end) selected @endif>{{12}}:00 PM  </option>
                                            <option value="{{12}}:30" @if('12:30 PM'==$workDay->afternoon_end) selected @endif>{{12}}:30 PM  </option>
                                            @endif
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                            </td>
                            </tr>
                            @endforeach
                    </tbody>
        </div>
       </table>
     </form>
   </div>
</div>

@endsection
@section('script')
<script src="{{asset('js/bootstrap4-toggle.min.js')}}"></script>
@endsection
