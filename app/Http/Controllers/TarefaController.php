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

        return [$tarefa];

    }

    public function marcarStatusTarefaConcluido(Request $request)
    {
        
        $id = $request->id;

        try{
            $tarefa = Tarefa::find($id);
            $tarefa->status = $request->status;
            $tarefa->save();

            return "alterado com sucesso.";
        } catch (Exception $ex) {
            return $ex->getMessage();
        }
    }


}
