@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Editar Proyecto</h3>
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
                            {!! Form::model($project, ['route' => ['proyectos.update', $project->id], 'method' => 'PUT']) !!}
                            <div class="form-group">
                                {!! Form::label('name', 'Nombre del Proyecto') !!}
                                {!! Form::text('name', null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('description', 'Descripción del Proyecto') !!}
                                {!! Form::textarea('description', null, ['class' => 'form-control', 'rows' => 3]) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('alias', 'Alias del Proyecto') !!}
                                {!! Form::text('alias', null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('status', 'Estado del Proyecto') !!}
                                {!! Form::select('status', \App\Models\Project::getStatusOptions(), null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('initial_date', 'Fecha Inicial') !!}
                                {!! Form::date('initial_date', null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('final_date', 'Fecha Final') !!}
                                {!! Form::date('final_date', null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('leader_user', 'Líder del Proyecto') !!}
                                {!! Form::select('leader_user', $users, null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::submit('Actualizar Proyecto', ['class' => 'btn btn-primary']) !!}
                                <a href="{{ route('proyectos.index') }}" class="btn btn-danger">Cancelar</a>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
