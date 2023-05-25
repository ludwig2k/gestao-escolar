<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Student;

class StudentController extends Controller
{
  public function index(){
     return Inertia::render('Forms/Student');
  }

  public function store(Request $request){

        Student::create(
        [
            'nome' => $request->input('nome'),
            'email' => $request->input('email'),
            'senha' => $request->input('senha'),
            'data_nascimento' => $request->input('data_nascimento'),
            'idade' => $request->input('idade'),
            'cep' => $request->input('cep'),
            'cidade' => $request->input('cidade'),
            'estado' => $request->input('estado'),
            'endereco' => $request->input('endereco'),
            'sexo' => $request->input('sexo'),
            'cpf' => $request->input('cpf'),
            'pcd' => $request->input('pcd'),
            'responsavel' => $request->input('responsavel'),
            'contato_responsavel' => $request->input('contato_responsavel'),
            'nota' => $request->input('nota'),
            'frequencia' => $request->input('frequencia'),
            
        ]
    );

      return redirect()->back();
    
  }

  public function showStudents()
  {
    $students = Student::all(); // Retrieve the student data from the database

    return Inertia::render('Tables/StudentsTable', [
        'students' => $students,
    ]);
  }


}
