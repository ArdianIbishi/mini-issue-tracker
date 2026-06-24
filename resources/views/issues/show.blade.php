@extends('layouts.app')

@section('content')

<div class="card">

    <div class="card-body">

        <h1>{{ $issue->title }}</h1>

        <p>
            <strong>Project:</strong>
            {{ $issue->project->name }}
        </p>

        <p>
            <strong>Status:</strong>
            {{ $issue->status }}
        </p>

        <p>
            <strong>Priority:</strong>
            {{ $issue->priority }}
        </p>

        <p>
            <strong>Due Date:</strong>
            {{ $issue->due_date }}
        </p>

        <a href="{{ route('issues.edit', $issue) }}"
   class="btn btn-warning">
    Edit Issue
</a>
<form
    action="{{ route('issues.destroy', $issue) }}"
    method="POST"
    class="d-inline">

    @csrf
    @method('DELETE')

    <button
        class="btn btn-danger"
        onclick="return confirm('Delete this issue?')">

        Delete Issue

    </button>

</form>

        <p>
            {{ $issue->description }}
        </p>

    </div>

</div>

@endsection