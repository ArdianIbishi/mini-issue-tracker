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
<form method="GET" action="{{ route('issues.index') }}" class="card mb-4">
    <div class="card-body">
        <div class="row g-3">

            <div class="col-md-3">
                <label class="form-label">Status</label>

                <select name="status" class="form-select">
                    <option value="">All</option>

                    <option value="open" @selected(request('status') === 'open')>
                        Open
                    </option>

                    <option value="in_progress" @selected(request('status') === 'in_progress')>
                        In Progress
                    </option>

                    <option value="closed" @selected(request('status') === 'closed')>
                        Closed
                    </option>
                </select>
            </div>

            <div class="col-md-3">
                <label class="form-label">Priority</label>

                <select name="priority" class="form-select">
                    <option value="">All</option>

                    <option value="low" @selected(request('priority') === 'low')>
                        Low
                    </option>

                    <option value="medium" @selected(request('priority') === 'medium')>
                        Medium
                    </option>

                    <option value="high" @selected(request('priority') === 'high')>
                        High
                    </option>
                </select>
            </div>

            <div class="col-md-3">
                <label class="form-label">Tag</label>

                <select name="tag" class="form-select">
                    <option value="">All</option>

                    @foreach($tags as $tag)
                        <option
                            value="{{ $tag->id }}"
                            @selected((string) request('tag') === (string) $tag->id)
                        >
                            {{ $tag->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-3 d-flex align-items-end gap-2">
                <button class="btn btn-primary">
                    Filter
                </button>

                <a href="{{ route('issues.index') }}" class="btn btn-secondary">
                    Reset
                </a>
            </div>

        </div>
    </div>
</form>
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
            <p>
    Tags:

    @forelse($issue->tags as $tag)
        <span
            class="badge"
            style="background-color: {{ $tag->color ?? '#6c757d' }}"
        >
            {{ $tag->name }}
        </span>
    @empty
        <span class="text-muted">No tags</span>
    @endforelse
</p>

            <hr>

        @empty

            <p>No issues found.</p>

        @endforelse

    </div>
</div>

@endsection