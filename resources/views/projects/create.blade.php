<!DOCTYPE html>
<html>
<head>
    <title>Create Project</title>
</head>
<body>

<h1>Create Project</h1>

<form action="{{ route('projects.store') }}" method="POST">
    @csrf

    <div>
        <label>Name</label>
        <input type="text" name="name">
    </div>

    <br>

    <div>
        <label>Description</label>
        <textarea name="description"></textarea>
    </div>

    <br>

    <div>
        <label>Start Date</label>
        <input type="date" name="start_date">
    </div>

    <br>

    <div>
        <label>Deadline</label>
        <input type="date" name="deadline">
    </div>

    <br>

    <button type="submit">
        Save Project
    </button>
</form>

</body>
</html>