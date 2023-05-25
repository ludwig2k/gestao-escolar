<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Teacher;
use App\Models\Student;
use App\Models\Team;


class ClassController extends Controller
{
public function index(){

        $teachers = Teacher::all();
        $students = Student::all();

        return Inertia::render('Forms/Class', [
            'teachers' => $teachers,
            'students' => $students,
        ]);
      }


public function store(Request $request)
{
    $team = new Team;
    $teacher = Teacher::find($request->input('teacherId'));
    $team->Teacher()->associate($teacher);
    $team->materia = $request->input('materia');
    $team->save();
    $students = $request->input('studentId');

    if ($team->students()->count() >= 9) {
      return redirect()->back()->with('error', 'Team already has the maximum number of students.');
    }
    $team->students()->attach($students);

    return redirect()->route('home');
}

public function showTeams()
{
    $students = Student::all(); // Retrieve all students from the database

    $teams = Team::with('students')->get(); 

    return Inertia::render('Tables/TeamsTable', [
        'teams' => $teams,
        'students' => $students // Pass the students data to the view
    ]);
}


public function viewTeam($teamId)
{
    $team = Team::with('teacher', 'students')->findOrFail($teamId);
   
    return Inertia::render('Tables/Team', compact('team'));
}

public function addStudent($teamId)
{
    // Validate the request data
    $data = request()->validate([
        'studentId' => 'required|exists:students,id',
    ]);

    $team = Team::findOrFail($teamId);
    $student = Student::findOrFail($data['studentId']);

    // Add the student to the team
    $team->students()->attach($student);

    // Optionally, you can redirect or return a response
    return redirect()->back()->with('success', 'Student added successfully.');
}

}
