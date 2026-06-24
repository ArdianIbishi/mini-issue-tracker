<!DOCTYPE html>
<html>
<head>
    <title>Projects</title>
</head>
<body>

    <h1>Projects</h1>

    @forelse($projects as $project)
        <div>
            <h3>{{ $project->name }}</h3>
            <p>{{ $project->description }}</p>
        </div>
        <hr>
    @empty
        <p>No projects found.</p>
    @endforelse

</body>
</html>