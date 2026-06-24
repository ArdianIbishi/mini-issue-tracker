@extends('layouts.app')

@section('content')

<h1>Tags</h1>

<div class="card mb-4">
    <div class="card-body">

        <form action="{{ route('tags.store') }}" method="POST">
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
                <label class="form-label">Color</label>

                <input
                    type="text"
                    name="color"
                    class="form-control"
                    placeholder="#0d6efd"
                >
            </div>

            <button class="btn btn-success">
                Save Tag
            </button>
        </form>

    </div>
</div>

<div class="card">
    <div class="card-body">

        @forelse($tags as $tag)

            <p>
                <strong>{{ $tag->name }}</strong>
                <span>{{ $tag->color }}</span>
            </p>

            <hr>

        @empty

            <p>No tags found.</p>

        @endforelse

    </div>
</div>

@endsection