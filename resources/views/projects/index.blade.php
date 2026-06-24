<!DOCTYPE html>
<html>
<head>
    <title>Projects</title>
</head>
<body>

@if(session('success'))
    <p>
        {{ session('success') }}
    </p>
@endif

    <h1>Projects</h1>

    @forelse($projects as $project)
        <div>
        <h3>
    <a href="{{ route('projects.show', $project) }}">
        {{ $project->name }}
    </a>
</h3>
            <p>{{ $project->description }}</p>
        </div>
        <hr>
    @empty
        <p>No projects found.</p>
    @endforelse

</body>
</html>