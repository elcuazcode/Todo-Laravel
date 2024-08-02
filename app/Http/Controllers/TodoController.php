<?php
# Indica en que carpeta encontramos al controlador namespace
namespace App\Http\Controllers;

# Importa la clase Request de laravel, que se usa para manejar las solicitudes
# HTTP
use Illuminate\Http\Request;

# Define la clase y ademas extiende/herreda del la clase 
# Controller de laravel.
class TodoController extends Controller
{

    #Primer metodo
    public function index()
    {
        $todos = session()->get('todos', []);
        # Una manera de corta de crear un array asociativo
        # compact('todos') es igual a ['todos => $todos]
        return view('index', ['todos'=> $todos]);
    }

    # Recibe un objeto request que contiene los datos enviados
    # por el formulario
    
    public function add(Request $request)
    {
        $todos = session()->get('todos', []);
        # agrega un elemento al final del array
        $todos[] = $request->todo;
        session()->put('todos', $todos);
        # Redirige al usuario a la pagina principal
        return redirect('/');

    }

    public function delete($index)
    {
        # Recibe el indice del elemento a eliminar.
        $todos = session()->get('todos', []);
        # Elinina el indice especificado usando unset
        unset($todos[$index]);
        # Se usa para reindexar el array 
        session()->put('todos', array_values($todos));
        # Nos devuelve a al pagina principal.
        return redirect('/');
    }


}
