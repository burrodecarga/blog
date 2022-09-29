<ul class="list-unstyled components">
    <p class="text-white text-center">Administración</p>

    <li class="active">
        <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Administración de Datos</a>
        <ul class="collapse list-unstyled" id="homeSubmenu">
            @if(auth()->user()->role=='admin')
            @include('layouts.partials.admin')
            @endif

            @if(auth()->user()->role=='medico')
            @include('layouts.partials.medico')
            @endif


            @if(auth()->user()->role=='paciente')
            @include('layouts.partials.paciente')
            @endif

            <li>
                <a href="{{route('charts.citasMes')}}">Chart Mes</a>
            </li>
            <li>
                <a href="{{route('charts.citasMedicos')}}">Chart Medicos</a>
            </li>


        </ul>
    </li>

    <li>
    <li class="active">
        <a href="#homeSubmenu1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Importación de Datos</a>
        <ul class="collapse list-unstyled" id="homeSubmenu1">
            <li>
                <a href="{{route('especialidades.formImportExcel')}}">Importar Especialidades</a>
            </li>
            <li>
                <a href="#">Importar Médicos</a>
            </li>
            <li>
                <a href="#">Importar Pacientes</a>
            </li>
        </ul>
    </li>

    <li>
        <a href="#">About</a>
    </li>
    <li>
        <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Page</a>
        <ul class="collapse list-unstyled" id="pageSubmenu">
            <li>
                <a href="#">page1</a>
            </li>
            <li>
                <a href="#">page2</a>
            </li>
            <li>
                <a href="#">page3</a>
            </li>
        </ul>
    </li>
    <li>
        <a href="#">Services</a>
    </li>
    <li>
        <a href="#">Contact Us</a>
 </li>
 <li>
     <a  href="{{ route('logout') }}"
     onclick="event.preventDefault();
                   document.getElementById('logout-form').submit();">
      {{ __('Cerrar Sesión') }}
  </a>

  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
      @csrf
  </form>
 </li>


</ul>
