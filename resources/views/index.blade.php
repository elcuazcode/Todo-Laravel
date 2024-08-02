<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,
    initial-scale=1.0">
    <title>ToDo List</title>
    <link rel="stylesheet" href="https://stackpath.boots
    trapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

  </head>

  <body>
    
  <div class="container mt-5">
    <h1 class="mb-4">ToDo List</h1>


<!-- Justo aqui sucede la magia, los datos del formulario
 son enviados, la ruta determina esto en web.php-->
    <form action="/add" method="POST" class="mb-4">
<!-- csrf es una directiva de blade que agrega un token para 
 proteger contra ataques de fasificacion -->
      @csrf 
      <div class="input-group">
        <input type="text" name="todo" class="form-control"
        placeholder="Add a new task" required>
        <div class="input-group-append">
          <button type="submit" class="btn btn-primary">
            Add</button>
        </div>
      </div>
    </form>



    <ul class="list-group">
      <!-- Utilizamos el metodo index, del TodoController -->
      @foreach ($todos as $index => $todo )
      <li class="list-group-item d-flex justify-content-between align-items-center">
        {{ $todo}}
        <form action="/delete/{{ $index}}" method="POST" >
          @csrf
          <button type="submit" class="btn btn-danger btn-sm">
            Delete
          </button>

        </form>

      </li>

      
      @endforeach

    </ul>

  </div>
  </body>

</html>

