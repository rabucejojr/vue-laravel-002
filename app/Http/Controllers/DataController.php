<?php

namespace App\Http\Controllers;
use App\Models\Student;
use Inertia\Inertia;
use Illuminate\Http\Request;

class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, Student $students)
    {
        // Get the search query from the request
        $search = $request->input('search');

        // Fetch data from the database based on the search query
        $locations = Student::where('brgy', 'like', '%' . $search . '%')
            ->orWhere('municipality', 'like', '%' . $search . '%')
            ->orWhere('province', 'like', '%' . $search . '%')
            ->get();

        // Pass the data to the Inertia view
        return Inertia::render('SearchResults', [
            'students' => $students,
            'search' => $search,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
