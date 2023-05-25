<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome', 'email', 'senha', 'cpf', 'pcd', 'data_nascimento', 'idade', 'responsavel', 'contato_responsavel', 'endereco', 'cep', 'cidade'
        , 'estado', 'nota', 'frequencia'
    ];

    public function teams()
{
    return $this->belongsToMany(Team::class, 'team_student', 'student_id', 'team_id');
}

}
