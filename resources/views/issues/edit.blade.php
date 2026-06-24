@extends('layouts.app')

@section('content')

<h1>Edit Issue</h1>

<form action="{{ route('issues.update', $issue) }}"
      method="POST">

    @csrf
    @method('PUT')

    <div class="mb-3">

        <label class="form-label">
            Project
        </label>

        <select
            name="project_id"
            class="form-select">

            @foreach($projects as $project)

                <option
                    value="{{ $project->id }}"
                    @selected($project->id == $issue->project_id)>

                    {{ $project->name }}

                </option>

            @endforeach

        </select>

    </div>

    <div class="mb-3">

        <label class="form-label">
            Title
        </label>

        <input
            type="text"
            name="title"
            value="{{ old('title', $issue->title) }}"
            class="form-control">

    </div>

    <div class="mb-3">

        <label class="form-label">
            Description
        </label>

        <textarea
            name="description"
            class="form-control"
            rows="5">{{ old('description', $issue->description) }}</textarea>

    </div>

    <div class="mb-3">

        <label class="form-label">
            Status
        </label>

        <select
            name="status"
            class="form-select">

            <option value="open"
                @selected($issue->status === 'open')>
                Open
            </option>

            <option value="in_progress"
                @selected($issue->status === 'in_progress')>
                In Progress
            </option>

            <option value="closed"
                @selected($issue->status === 'closed')>
                Closed
            </option>

        </select>

    </div>

    <div class="mb-3">

        <label class="form-label">
            Priority
        </label>

        <select
            name="priority"
            class="form-select">

            <option value="low"
                @selected($issue->priority === 'low')>
                Low
            </option>

            <option value="medium"
                @selected($issue->priority === 'medium')>
                Medium
            </option>

            <option value="high"
                @selected($issue->priority === 'high')>
                High
            </option>

        </select>

    </div>

    <div class="mb-3">

        <label class="form-label">
            Due Date
        </label>

        <input
            type="date"
            name="due_date"
            value="{{ $issue->due_date }}"
            class="form-control">

    </div>

    <button class="btn btn-primary">
        Update Issue
    </button>

</form>

@endsection