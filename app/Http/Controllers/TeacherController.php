<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Teacher;

class TeacherController extends Controller
{
    public function index(){
        return Inertia::render('Forms/Teacher');
    }

    public function store(Request $request){

        $senha = $request->input('senha');
        $hashedSenha = password_hash($senha, PASSWORD_DEFAULT);
        $curriculo = $request->file('curriculo')->store('teachers', 'public');
        $selectedMaterias = $request->input('materias');
        $materiasAsString = implode(',', $selectedMaterias);
        Teacher::create(
        [
            'nome' => $request->input('nome'),
            'email' => $request->input('email'),
            'senha' => $hashedSenha,
            'materias' => $materiasAsString,
            'curriculo' => $curriculo            
        ]
    );

      return redirect()->route('home');
    
   }
}
