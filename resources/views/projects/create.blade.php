@extends('layouts.app')

@section('content')

<h1>Create Project</h1>

<div class="card">
    <div class="card-body">

        <form action="{{ route('projects.store') }}" method="POST">

            @csrf

            <div class="mb-3">
                <label class="form-label">Name</label>

                <input
                    type="text"
                    name="name"
                    class="form-control"
                >
            </div>

            <div class="mb-3">
                <label class="form-label">Description</label>

                <textarea
                    name="description"
                    class="form-control"
                ></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Start Date</label>

                <input
                    type="date"
                    name="start_date"
                    class="form-control"
                >
            </div>

            <div class="mb-3">
                <label class="form-label">Deadline</label>

                <input
                    type="date"
                    name="deadline"
                    class="form-control"
                >
            </div>

            <button class="btn btn-success">
                Save Project
            </button>

        </form>

    </div>
</div>

@endsection