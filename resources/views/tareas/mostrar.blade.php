@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Detalles de Tarea</h3>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><strong>Nombre: </strong>{{ $task->name }}</h5>
                    <p class="card-text"><strong>Descripción:</strong> {{ $task->description }}</p>
                    <p class="card-text"><strong>Alias:</strong> {{ $task->alias }}</p>
                    <p class="card-text"><strong>Estado:</strong> {{ $task->status }}</p>
                    <p class="card-text"><strong>Fecha Inicial:</strong> {{ $task->initial_date }}</p>
                    <p class="card-text"><strong>Fecha Final:</strong> {{ $task->final_date }}</p>
                    <p class="card-text"><strong>Asignado a:</strong> {{ $task->assignedUser->name }}</p>

                    <a href="{{ route('comments.create', ['task' => $task->id]) }}" class="btn btn-primary">Agregar Comentario</a>

                </div>
            </div>
        </div>
    </section>
@endsection

