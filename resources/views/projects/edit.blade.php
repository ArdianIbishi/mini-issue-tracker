<!DOCTYPE html>
<html>
<head>
    <title>Edit Project</title>
</head>
<body>

<h1>Edit Project</h1>

<form action="{{ route('projects.update', $project) }}" method="POST">
    @csrf
    @method('PUT')

    <div>
        <label>Name</label>
        <input
            type="text"
            name="name"
            value="{{ $project->name }}"
        >
    </div>

    <br>

    <div>
        <label>Description</label>
        <textarea name="description">{{ $project->description }}</textarea>
    </div>

    <br>

    <div>
        <label>Start Date</label>
        <input
            type="date"
            name="start_date"
            value="{{ $project->start_date }}"
        >
    </div>

    <br>

    <div>
        <label>Deadline</label>
        <input
            type="date"
            name="deadline"
            value="{{ $project->deadline }}"
        >
    </div>

    <br>

    <button type="submit">
        Update Project
    </button>

</form>

</body>
</html>