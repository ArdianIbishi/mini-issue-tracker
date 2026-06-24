@extends('layouts.app')

@section('content')

<h1>Edit Project</h1>

<div class="card">
    <div class="card-body">

        <form
            action="{{ route('projects.update', $project) }}"
            method="POST"
        >
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">
                    Name
                </label>

                <input
                    type="text"
                    name="name"
                    value="{{ $project->name }}"
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
                >{{ $project->description }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">
                    Start Date
                </label>

                <input
                    type="date"
                    name="start_date"
                    value="{{ $project->start_date }}"
                    class="form-control"
                >
            </div>

            <div class="mb-3">
                <label class="form-label">
                    Deadline
                </label>

                <input
                    type="date"
                    name="deadline"
                    value="{{ $project->deadline }}"
                    class="form-control"
                >
            </div>

            <button class="btn btn-success">
                Update Project
            </button>

        </form>

    </div>
</div>

@endsection