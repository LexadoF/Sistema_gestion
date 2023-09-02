@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Detalles del Comentario</h3>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $comment->title }}</h5>
                    <p class="card-text">{{ $comment->comment }}</p>
                    <p>Por: {{ $comment->user->name }}</p>
                    <p>Tags: {{ implode(', ', $comment->tags) }}</p>

                    <!-- Agrega aquí el enlace para editar el comentario -->
                    <a href="{{ route('comments.edit', $comment->id) }}" class="btn btn-primary">Editar Comentario</a>
                </div>
            </div>
        </div>
    </section>
@endsection
