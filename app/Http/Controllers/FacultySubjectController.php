<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use App\Models\Subject;
use App\Models\FacultySubject;
use Illuminate\Http\Request;

class FacultySubjectController extends Controller
{
    public function index()
    {
        $faculties = Faculty::where(
            'status',
            'approved'
        )->get();

        $subjects = Subject::all();

        return view(
            'admin.faculty-subjects',
            compact(
                'faculties',
                'subjects'
            )
        );
    }

    public function store(Request $request)
{
    foreach($request->subjects as $subjectId)
    {
        FacultySubject::firstOrCreate(

            [
                'faculty_id' => $request->faculty_id,
                'subject_id' => $subjectId
            ]

        );
    }

    return redirect()
        ->back()
        ->with(
            'success',
            'Subjects assigned successfully.'
        );
}
}
