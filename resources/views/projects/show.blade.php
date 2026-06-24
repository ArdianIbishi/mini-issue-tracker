<!DOCTYPE html>
<html>
<head>
    <title>{{ $project->name }}</title>
</head>
<body>

<h1>{{ $project->name }}</h1>

<p>{{ $project->description }}</p>

<h2>Issues</h2>

@forelse($project->issues as $issue)

    <div>
        <strong>{{ $issue->title }}</strong>

        <p>{{ $issue->status }}</p>
    </div>

    <hr>

@empty

    <p>No issues found.</p>

@endforelse

</body>
</html>