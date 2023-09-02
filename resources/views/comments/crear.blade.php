
@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Crear Comentario</h3>
        </div>
        <div class="section-body">
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
                    {!! Form::open(['route' => 'comments.store', 'method' => 'POST']) !!}
                    <div class="form-group">
                        {!! Form::label('title', 'Título del Comentario') !!}
                        {!! Form::text('title', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('comment', 'Contenido del Comentario') !!}
                        {!! Form::textarea('comment', null, ['class' => 'form-control', 'rows' => 3]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('tags', 'Etiquetas (separadas por comas)') !!}
                        {!! Form::text('tags', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::hidden('task_id', $task) !!}
                        {{-- {!! Form::hidden('task_id', $task->id) !!} --}}
                        {!! Form::submit('Crear Comentario', ['class' => 'btn btn-primary']) !!}
                        <a href="{{ route('tareas.index', $task) }}" class="btn btn-danger">Cancelar</a>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </section>
@endsection
