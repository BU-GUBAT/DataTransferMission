<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Student::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'student_id' => 'required',
            'course' => 'required',
            'year' => 'required|numeric',
            'block' => 'required|string|uppercase|max:1',
            'barangay' => 'required',
            'municipality' => 'required'
        ]);
        $student = Student::create($request->all());
        return  response()->json($student, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $student = Student::find($id);
        if($student){
            $request->validate([
                'firstname' => 'required|string',
                'lastname' => 'required|string',
                'student_id' => 'required',
                'course' => 'required|string|max:5',
                'year' => 'required|numeric',
                'block' => 'required|string|uppercase|max:1',
                'barangay' => 'required',
                'municipality' => 'required'
            ]);
            $student->update($request->all());
            return response()->json([
                'success' => true,
                'message' => 'Student Data Updated!'
            ]);
        }
        return response()->json([
            'success' => true,
            'message' => 'Student Data Deleted!'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $student = Student::find($id);
        if($student){
            if($student->delete()){
                return response()->json([
                    'success' => true,
                    'message' => 'Student Data Deleted!'
                ]);
            }
            return response()->json([
                'success' => false,
                'message' => 'Student Data Deletion fail!'
            ]);
        }
        return response()->json([
            'success' => false,
            'message' => 'Student Doesn\'t Exist!'
        ]);
    }
}
