<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use App\Models\Subject;
use App\Models\FacultyLoad;
use Illuminate\Http\Request;

class FacultyLoadController extends Controller
{
    public function index()
    {
        $loads =
            FacultyLoad::with(
                'faculty',
                'subject'
            )->get();

        $faculties =
            Faculty::where(
                'status',
                'approved'
            )->get();

        $subjects =
            Subject::all();

        return view(
            'admin.faculty-loads',
            compact(
                'loads',
                'faculties',
                'subjects'
            )
        );
    }

    public function store(Request $request)
    {
        FacultyLoad::create([
            'faculty_id' =>
                $request->faculty_id,

            'subject_id' =>
                $request->subject_id
        ]);

        return back()
            ->with(
                'success',
                'Subject assigned successfully.'
            );
    }

    public function destroy($id)
    {
        FacultyLoad::findOrFail($id)
            ->delete();

        return back()
            ->with(
                'success',
                'Faculty load removed.'
            );
    }
}
