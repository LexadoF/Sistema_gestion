@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Detalle del Proyecto</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Nombre: {{ $project->name }}</h5>
                            <p class="card-text">Descripción: {{ $project->description }}</p>
                            <p class="card-text">Alias: {{ $project->alias }}</p>
                            <p class="card-text">Estado: {{ $project->status }}</p>
                            <p class="card-text">Fecha Inicial: {{ $project->initial_date }}</p>
                            @if ($project->leader)
                                <p class="card-text">Líder: {{ $project->leader->name }}</p>
                            @else
                                <p>Líder: Sin asignar</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
