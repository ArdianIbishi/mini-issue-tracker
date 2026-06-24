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
        <hr>

<h5>Tags</h5>

<div class="mb-3">
    @forelse($issue->tags as $tag)

        <span
            class="badge me-2"
            style="background-color: {{ $tag->color ?? '#6c757d' }}"
        >
            {{ $tag->name }}
        </span>

        <form
            action="{{ route('issues.tags.destroy', [$issue, $tag]) }}"
            method="POST"
            class="d-inline"
        >
            @csrf
            @method('DELETE')

            <button
                class="btn btn-sm btn-outline-danger me-2"
                onclick="return confirm('Remove this tag?')"
            >
                Remove
            </button>
        </form>

    @empty

        <p>No tags attached.</p>

    @endforelse
</div>

<form
    action="{{ route('issues.tags.store', $issue) }}"
    method="POST"
    class="row g-2"
>
    @csrf

    <div class="col-md-8">
        <select
            name="tag_id"
            class="form-select"
        >
            @foreach($availableTags as $tag)

                <option value="{{ $tag->id }}">
                    {{ $tag->name }}
                </option>

            @endforeach
        </select>
    </div>

    <div class="col-md-4">
        <button class="btn btn-primary w-100">
            Attach Tag
        </button>
    </div>
</form>

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