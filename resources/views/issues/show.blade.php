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
<div class="card mt-4">
    <div class="card-header">
        Comments
    </div>

    <div class="card-body">

        <form
            action="{{ route('issues.comments.store', $issue) }}"
            method="POST"
            class="mb-4"
        >
            @csrf

            <div class="mb-3">
                <label class="form-label">
                    Author Name
                </label>

                <input
                    type="text"
                    name="author_name"
                    class="form-control"
                >
            </div>

            <div class="mb-3">
                <label class="form-label">
                    Comment
                </label>

                <textarea
                    name="body"
                    class="form-control"
                    rows="3"
                ></textarea>
            </div>

            <button class="btn btn-success">
                Add Comment
            </button>
        </form>

        @forelse($issue->comments as $comment)

            <div class="border rounded p-3 mb-3">
                <strong>{{ $comment->author_name }}</strong>

                <p class="mb-2">
                    {{ $comment->body }}
                </p>

                <form
                    action="{{ route('comments.destroy', $comment) }}"
                    method="POST"
                >
                    @csrf
                    @method('DELETE')

                    <button
                        class="btn btn-sm btn-danger"
                        onclick="return confirm('Delete this comment?')"
                    >
                        Delete
                    </button>
                </form>
            </div>

        @empty

            <p>No comments found.</p>

        @endforelse

    </div>
</div>

@endsection