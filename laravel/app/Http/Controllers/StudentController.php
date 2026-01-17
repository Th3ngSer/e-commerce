<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        abort_unless(auth()->user()?->can('students.view'), 403);

        return response()->json([
            'message' => 'Students list (authorized)',
        ]);
    }

    public function store(Request $request)
    {
        abort_unless(auth()->user()?->can('students.create'), 403);

        return response()->json([
            'message' => 'Student created (authorized)',
            'data' => $request->all(),
        ], 201);
    }

    public function show($studentId)
    {
        abort_unless(auth()->user()?->can('students.view'), 403);

        return response()->json([
            'message' => "Student detail {$studentId} (authorized)",
        ]);
    }

    public function update(Request $request, $studentId)
    {
        abort_unless(auth()->user()?->can('students.update'), 403);

        return response()->json([
            'message' => "Student updated {$studentId} (authorized)",
            'data' => $request->all(),
        ]);
    }

    public function destroy($studentId)
    {
        abort_unless(auth()->user()?->can('students.delete'), 403);

        return response()->json([
            'message' => "Student deleted {$studentId} (authorized)",
        ]);
    }
}
