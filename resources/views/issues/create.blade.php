@extends('layouts.app')

@section('content')

<h1>Create Issue</h1>

<div class="card">
    <div class="card-body">

        <form
            action="{{ route('issues.store') }}"
            method="POST"
        >

            @csrf

            <div class="mb-3">
                <label class="form-label">
                    Project
                </label>

                <select
                    name="project_id"
                    class="form-select"
                >
                    @foreach($projects as $project)

                        <option value="{{ $project->id }}">
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
                    class="form-control"
                >
            </div>

            <div class="mb-3">
                <label class="form-label">
                    Description
                </label>

                <textarea
                    name="description"
                    class="form-control"
                ></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">
                    Status
                </label>

                <select
                    name="status"
                    class="form-select"
                >
                    <option value="open">
                        Open
                    </option>

                    <option value="in_progress">
                        In Progress
                    </option>

                    <option value="closed">
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
                    class="form-select"
                >
                    <option value="low">
                        Low
                    </option>

                    <option value="medium">
                        Medium
                    </option>

                    <option value="high">
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
                    class="form-control"
                >
            </div>

            <button class="btn btn-success">
                Save Issue
            </button>

        </form>

    </div>
</div>

@endsection