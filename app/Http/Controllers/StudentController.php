<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Inertia\Inertia;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $students = Student::paginate(8);
        return Inertia::render('Students/Show',['students'=>$students]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return Inertia::render('Students/Add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Student $student)
    {
        $request->validate([
            'firstname'=>'required|string|max:255',
            'middlename'=>'required|string|max:255',
            'lastname'=>'required|string|max:255',
            // 'extension'=>'required|string|max:255',
            'purok'=>'required|string|max:255',
            'brgy'=>'required|string|max:255',
            'municipality'=>'required|string|max:255',
            'province'=>'required|string|max:255',
        ]);
        $student->create([
            'firstname'=>$request->firstname,
            'middlename'=>$request->middlename,
            'lastname'=>$request->lastname,
            'extension'=>$request->extension,
            'purok'=>$request->purok,
            'brgy'=>$request->brgy,
            'municipality'=>$request->municipality,
            'province'=>$request->province,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //
        return Inertia::render('Students/Edit',['student'=>$student]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        //
        $request->validate([
            'firstname'=>'required|string|max:255',
            'middlename'=>'required|string|max:255',
            'lastname'=>'required|string|max:255',
            // 'extension'=>'required|string|max:255',
            'purok'=>'required|string|max:255',
            'brgy'=>'required|string|max:255',
            'municipality'=>'required|string|max:255',
            'province'=>'required|string|max:255',
        ]);
        $student->update([
            'firstname'=>$request->firstname,
            'middlename'=>$request->middlename,
            'lastname'=>$request->lastname,
            'extension'=>$request->extension,
            'purok'=>$request->purok,
            'brgy'=>$request->brgy,
            'municipality'=>$request->municipality,
            'province'=>$request->province,
        ]);

        return redirect('/students');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
        $student->delete();
    }
}
