@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4 col-xl-4">

                                    <div class="card bg-c-blue order-card">
                                            <div class="card-block">
                                            <h5>Usuarios</h5>
                                                @php
                                                 use App\Models\User;
                                                $cant_usuarios = User::count();
                                                @endphp
                                                <h2 class="text-right"><i class="fa fa-users f-left"></i><span>{{$cant_usuarios}}</span></h2>
                                                <p class="m-b-0 text-right"><a href="/usuarios" class="text-white">Ver más</a></p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-xl-4">
                                        <div class="card bg-c-yellow order-card">
                                            <div class="card-block">
                                            <h5>Proyectos</h5>
                                                @php
                                                use App\Models\Project;
                                                 $cant_proj = Project::count();
                                                @endphp
                                                <h2 class="text-right"><i class=" fa fa-file f-left"></i><span>{{$cant_proj}}</span></h2>
                                                <p class="m-b-0 text-right"><a href="/proyectos" class="text-white">Ver más</a></p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-xl-4">
                                        <div class="card bg-c-pink order-card">
                                            <div class="card-block">
                                                <h5>Tareas</h5>
                                                @php
                                                 use App\Models\Task;
                                                $cant_task = Task::count();
                                                @endphp
                                                <h2 class="text-right"><i class="fa fa-solid fa-list-ol f-left"></i><span>{{$cant_task}}</span></h2>
                                                <p class="m-b-0 text-right"><a href="/tareas" class="text-white">Ver más</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
