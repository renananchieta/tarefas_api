<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tarefa extends Model
{
    use HasFactory;

    protected $table = 'tarefas_teste.tarefas';

    public $timestamps = false;

    protected $fillable = [
        'titulo',
        'descricao',
        'data',
        'data_conclusao',
        'status'
    ];
}
