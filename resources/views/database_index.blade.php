<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDo List (Database)</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">ToDo List (Database Version)</h1>
        <form action="/database/add" method="POST" class="mb-4">
            @csrf
            <div class="input-group">
                <input type="text" name="todo" class="form-control" placeholder="Add a new task" required>
                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </div>
        </form>
        <ul class="list-group">
            @foreach ($todos as $todo)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <span @if($todo->completed) class="text-muted" @endif>
                    {{ $todo->task }}
                </span>
                <div>
                    <form action="/database/toggle/{{ $todo->id }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-sm {{ $todo->completed ? 'btn-success' : 'btn-secondary' }}">
                            {{ $todo->completed ? 'Completed' : 'Mark Complete' }}
                        </button>
                    </form>
                    <form action="/database/delete/{{ $todo->id }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
</body>
</html>