<?php


#Esto ya estaba, pendiente a a ser eliminado
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\DatabaseTodoController;

#Esto ya estaba, pendiente a ser eliminado
Route::get('/', function () {
    return view('welcome');
});


# Cuando se accede a una ruta, se ejecuta el metodo
# correspondiente al controlador
Route::get('/', [TodoController::class, 'index']);
Route::post('/add', [TodoController::class, 'add']);
Route::post('/delete/{index}', [TodoController::class, 'delete']);

Route::get('/database', [DatabaseTodoController::class, 'index']);
Route::post('/database/add', [DatabaseTodoController::class, 'add']);
Route::post('/database/delete/{id}', [DatabaseTodoController::class, 'delete']);
Route::post('/database/toggle/{id}', [DatabaseTodoController::class, 'toggle']);
