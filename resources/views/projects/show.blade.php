@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-3">
    <h1>{{ $project->name }}</h1>

    <a
        href="{{ route('projects.edit', $project) }}"
        class="btn btn-warning"
    >
        Edit
    </a>
</div>

<div class="card mb-3">
    <div class="card-body">

        <p>
            {{ $project->description }}
        </p>

        <p>
            <strong>Start Date:</strong>
            {{ $project->start_date }}
        </p>

        <p>
            <strong>Deadline:</strong>
            {{ $project->deadline }}
        </p>

        <form
            action="{{ route('projects.destroy', $project) }}"
            method="POST"
        >
            @csrf
            @method('DELETE')

            <button
                class="btn btn-danger"
                onclick="return confirm('Delete this project?')"
            >
                Delete Project
            </button>
        </form>

    </div>
</div>

<div class="card">
    <div class="card-header">
        Issues
    </div>

    <div class="card-body">

        @forelse($project->issues as $issue)

            <h5>{{ $issue->title }}</h5>

            <p>Status: {{ $issue->status }}</p>

            <hr>

        @empty

            <p>No issues found.</p>

        @endforelse

    </div>
</div>

@endsection