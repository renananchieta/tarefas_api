<?php

namespace App\Http\Controllers;

use App\Models\Tarefa;
use Exception;
use Illuminate\Http\Request;

class TarefaController extends Controller
{

    public function index()
    {
        $tarefas = Tarefa::orderBy('id')
                        ->get();
        
        return $tarefas;
    }

    public function store(Request $request)
    {
        $tarefa = new Tarefa();
        $tarefa->titulo = $request->titulo;
        $tarefa->descricao = 'Descrição da tarefa';
        $tarefa->data = date('Y-m-d');
        $tarefa->data_conclusao = date('Y-m-d');
        $tarefa->status = false;
        $tarefa->save();

        return "Tarefa salva com sucesso";
    }

    public function show($id)
    {
        $tarefa = Tarefa::find($id);

        return $tarefa;
    }

    public function updateDoTituloDaTarefa(Request $request)
    {
        $id = $request->id;
        $tarefa = Tarefa::find($id);
        $tarefa->titulo = $request->titulo;
        $tarefa->save();

        return "Tarefa alterada com sucesso.";
    }

     public function marcarStatusTarefaConcluido(Request $request)
     {
       $id = $request->id;
       try{
           $tarefa = Tarefa::find($id);
           $tarefa->status = !$request->status ? true : false;
           $tarefa->save();
           return "alterado com sucesso.";
       } catch (Exception $ex) {
           return $ex->getMessage();
       }
     }

    public function delete(Request $request)
    {

        $tarefa = Tarefa::find($request->id);
        $tarefa->delete();

        return "Tarefa Removida com sucesso";
    }


}
