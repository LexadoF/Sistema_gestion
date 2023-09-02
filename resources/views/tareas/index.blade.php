@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Tareas</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @if ($errors->any())
                            <div class="alert alert-dark alert-dismissible fade show" role="alert">
                            <strong>¡Revise los campos!</strong>
                                @foreach ($errors->all() as $error)
                                    <span class="badge badge-danger">{{ $error }}</span>
                                @endforeach
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                        @endif
                            @can('crear-tareas')
                            <a class="btn btn-warning" href="{{route('tareas.create')}}">Nuevo</a>
                            @endcan

                            <table class="table table-striped mt-2">
                                <thead style="background-color: #6777ef;">
                                <th style="display: none;">ID</th>
                                <th style="color:#ffff;">Tarea Padre</th>
                                <th style="color:#ffff;">Nombre</th>
                                <th style="color:#ffff;">Descripcón</th>
                                <th style="color:#ffff;">Alias</th>
                                <th style="color:#ffff;">Estado</th>
                                <th style="color:#ffff;">Fecha Inicial</th>
                                <th style="color:#ffff;">Fecha Final</th>
                                <th style="color:#ffff;">Asignado a</th>
                                <th style="color:#ffff;">Tiempo usado</th>
                                {{-- <th style="color:#ffff;">Progreso</th> --}}
                                <th style="color:#ffff;">Acciones</th>

                                </thead>
                                <tbody>
                                @foreach($tasks as $tareas)
                                <tr>
                                    <td style="display: none;"> {{$tareas->id}} </td>
                                    <td> {{ $tareas->parentTask ? $tareas->parentTask->alias : 'Ninguno' }} </td>
                                    <td> {{$tareas->name}} </td>
                                    <td> {{$tareas->description}} </td>
                                    <td> {{$tareas->alias}} </td>
                                    <td> {{$tareas->status}} </td>
                                    <td> {{$tareas->initial_date}} </td>
                                    <td> {{$tareas->final_date}} </td>
                                    <td> {{ $tareas->assignedUser->name }} </td>
                                    <td> {{$tareas->time_used}} </td>
                                    {{-- <td> {{$tareas->percentage_progress}} </td> --}}

                                    <td>
                                        <a class="btn btn-outline-info" href="{{route('tareas.show', $tareas->id)}}"> Ver Detalle</a>
                                        @can('editar-tareas' || 'borrar-tareas')
                                    <a class="btn btn-info" href="{{route('tareas.edit', $tareas->id)}}"> editar</a>
                                    {!! Form::open(['method' => 'DELETE', 'route'=> ['tareas.destroy', $tareas->id], 'style'=>'display:inline'])!!}
                                        {!! Form::submit('Borrar', ['class'=> 'btn btn-danger']) !!}
                                    {!! Form::close()!!}
                                    </td>
                                    @endcan
                                </tr>
                                @endforeach
                                </tbody>
                                </table>
                                <div>
                                {!! $tasks->links() !!}
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

