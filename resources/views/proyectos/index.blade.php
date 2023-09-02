@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Proyectos</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @can('crear-proyectos')
                            <a class="btn btn-warning" href="{{route('proyectos.create')}}">Nuevo</a>
                            @endcan

                            <table class="table table-striped mt-2">
                                <thead style="background-color: #6777ef;">
                                <th style="display: none;">ID</th>
                                <th style="color:#ffff;">Nombre</th>
                                <th style="color:#ffff;">Descripcón</th>
                                <th style="color:#ffff;">Alias</th>
                                <th style="color:#ffff;">Estado</th>
                                <th style="color:#ffff;">Fecha Inicial</th>
                                <th style="color:#ffff;">Fecha Final</th>
                                <th style="color:#ffff;">Lider</th>
                                <th style="color:#ffff;">Acciones</th>


                                </thead>
                                <tbody>
                                @foreach($projects as $proyecto)
                                <tr>
                                    <td style="display: none;"> {{$proyecto->id}} </td>
                                    <td> {{$proyecto->name}} </td>
                                    <td> {{$proyecto->description}} </td>
                                    <td> {{$proyecto->alias}} </td>
                                    <td> {{$proyecto->status}} </td>
                                    <td> {{$proyecto->initial_date}} </td>
                                    <td> {{$proyecto->final_date}} </td>
                                    <td> {{$proyecto->leader->name}} </td>
                                    <td>
                                         <a class="btn btn-outline-info" href="{{route('proyectos.show', $proyecto->id)}}"> Ver Detalle</a>
                                        @can('editar-proyectos' || 'borrar-proyectos')
                                    <a class="btn btn-info" href="{{route('proyectos.edit', $proyecto->id)}}"> editar</a>
                                    {!! Form::open(['method' => 'DELETE', 'route'=> ['proyectos.destroy', $proyecto->id], 'style'=>'display:inline'])!!}
                                        {!! Form::submit('Borrar', ['class'=> 'btn btn-danger']) !!}
                                    {!! Form::close()!!}
                                    </td>
                                    @endcan
                                </tr>
                                @endforeach
                                </tbody>
                                </table>
                                <div>
                                {!! $projects->links() !!}
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

