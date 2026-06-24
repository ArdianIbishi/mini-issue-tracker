<!DOCTYPE html>
<html>
<head>
    <title>{{ $project->name }}</title>
</head>
<body>

@if(session('success'))
    <p>{{ session('success') }}</p>
@endif

<h1>{{ $project->name }}</h1>

<p>{{ $project->description }}</p>

<a href="{{ route('projects.edit', $project) }}">
        Edit Project
    </a>
    <form
    action="{{ route('projects.destroy', $project) }}"
    method="POST"
>
    @csrf
    @method('DELETE')

    <button
        type="submit"
        onclick="return confirm('Delete this project?')"
    >
        Delete Project
    </button>
</form>
<h2>Issues</h2>
@forelse($project->issues as $issue)

    <div>
        <strong>{{ $issue->title }}</strong>

        <p>{{ $issue->status }}</p>
        <p>
 
</p>
    </div>
   
    <hr>

@empty

    <p>No issues found.</p>

@endforelse

</body>
</html>