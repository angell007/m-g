<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
            <img src="{{asset('images/inmobiliariamyg.png')}}">
        </div>
        {{-- <div class="sidebar-brand-text mx-3">M&G</div> --}}
    </a>
    <hr class="sidebar-divider my-0">
    <li class="nav-item active">
        <a class="nav-link" href="index.html">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">

    </div>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap"
            aria-expanded="true" aria-controls="collapseBootstrap">
            <i class="far fa-fw fa-window-maximize"></i>
            <span>Gestion</span>
        </a>
        <div id="collapseBootstrap" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Gestion</h6>
                <a class="collapse-item" href="{{route('arrendatarios.index')}}">Arrendatarios</a>
                <a class="collapse-item" href="{{route('propietarios.index')}}">Propietarios</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('inmuebles.index')}}">
            <i class="fab fa-fw fa-wpforms"></i>
            <span>Inmuebles</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTable" aria-expanded="true"
            aria-controls="collapseTable">
            <i class="fas fa-fw fa-table"></i>
            <span>Seguimientos</span>
        </a>
        <div id="collapseTable" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header"></h6>
                <a class="collapse-item" href="{{route('contratos.index')}}">Contratos</a>
                <a class="collapse-item" href="{{route('informes.arrendatarios')}}">Informe Arrendatarios</a>
                <a class="collapse-item" href="{{route('informes.propietarios')}}">Informe Propietarios</a>
                {{-- <a class="collapse-item" href="datatables.html">Informe Inmuebles</a> --}}
                {{-- <a class="collapse-item" href="datatables.html">Informe Propietarios</a> --}}
            </div>
        </div>
    </li>

    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Pendientes
    </div>

    <li class="nav-item">
        <a class="nav-link" href="{{route('registro.pendientes')}}">
            <i class="fa fa-pen"></i>
            <span class="text-center">
                Gestión de tareas
            </span>
        </a>
    </li>

    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Cartera
    </div>

    <li class="nav-item">
        <a class="nav-link" href="{{route('registro.realizados')}}">
            <i class="fas fa-info" aria-hidden="true"></i>
            <span class="text-center">
                Registro pagos realizados
            </span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{route('registro.recibidos')}}">
            <i class="fas fa-info" aria-hidden="true"></i>
            <span class="text-center">
                Registro pagos recibidos
            </span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{route('registro.descuentos')}}">
        <i class="fas fa-info" aria-hidden="true"></i>
        <span class="text-center">
            Registro descuentos
        </span>
        </a>
    </li>

    <hr class="sidebar-divider">
    <div class="version" id="version-ruangadmin"></div>
</ul>
<!-- Sidebar -->