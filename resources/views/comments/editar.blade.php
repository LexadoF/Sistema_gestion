@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Editar Comentario</h3>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    {!! Form::model($comment, ['route' => ['comments.update', $comment->id], 'method' => 'PUT']) !!}
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
                        {!! Form::text('tags', implode(', ', $comment->tags), ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::submit('Actualizar Comentario', ['class' => 'btn btn-primary']) !!}
                        <a href="{{ route('tareas.mostrar', $comment->task) }}" class="btn btn-secondary">Cancelar</a>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </section>
@endsection
