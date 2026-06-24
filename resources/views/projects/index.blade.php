@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Projects</h1>

    <a href="{{ route('projects.create') }}"
       class="btn btn-primary">
        New Project
    </a>
</div>

<div class="card">
    <div class="card-body">

        @forelse($projects as $project)

            <h5>
                <a href="{{ route('projects.show', $project) }}">
                    {{ $project->name }}
                </a>
            </h5>

            <p>{{ $project->description }}</p>

            <hr>

        @empty

            <p>No projects found.</p>

        @endforelse

    </div>
</div>

@endsection