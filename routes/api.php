<?php

use App\Http\Controllers\TarefaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/tarefas', [TarefaController::class, 'index']);
Route::post('/tarefas/store', [TarefaController::class, 'store']);
Route::get('/tarefa/{id}', [TarefaController::class, 'show']);
Route::post('/tarefa/status/update', [TarefaController::class, 'marcarStatusTarefaConcluido']);