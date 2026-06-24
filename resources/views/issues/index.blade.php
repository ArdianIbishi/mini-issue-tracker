@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-3">

    <h1>Issues</h1>

    <a
        href="{{ route('issues.create') }}"
        class="btn btn-primary"
    >
        New Issue
    </a>

</div>

<div class="card">
    <div class="card-body">

        @forelse($issues as $issue)

        <h5>
    <a href="{{ route('issues.show', $issue) }}">
        {{ $issue->title }}
    </a>
</h5>

            <p>
                Project:
                {{ $issue->project->name }}
            </p>

            <p>
                Status:
                {{ $issue->status }}
            </p>

            <p>
                Priority:
                {{ $issue->priority }}
            </p>

            <hr>

        @empty

            <p>No issues found.</p>

        @endforelse

    </div>
</div>

@endsection