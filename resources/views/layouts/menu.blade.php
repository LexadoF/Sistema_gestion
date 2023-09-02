<li class="side-menus {{ Request::is('*') ? 'active' : '' }}">
    <a class="nav-link" href="/home">
        <i class=" fas fa-building"></i><span>Inicio</span>
    </a>
    @can('ver-usuarios')
    <a class="nav-link" href="/usuarios">
        <i class="fa fa-users "></i><span>Usuarios</span>
    </a>
    @endcan
    @can('ver-proyectos')
    <a class="nav-link" href="/proyectos">
        <i class=" fa fa-file"></i><span>Proyectos</span>
    </a>
    @endcan
    @can('ver-tareas')
    <a class="nav-link" href="/tareas">
        <i class="fa fa-solid fa-list-ol"></i><span>Tareas</span>
    </a>
    @endcan
</li>
