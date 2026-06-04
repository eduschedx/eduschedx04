<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\IOFactory;


class SubjectController extends Controller
{
    public function index()
    {
        $subjects =
            Subject::orderBy(
                'year_level'
            )->get();

        return view(
            'admin.subjects',
            compact('subjects')
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'subject_code' => 'required|unique:subjects',
            'subject_title' => 'required',
            'lec_hours' => 'required',
            'lab_hours' => 'required',
            'units' => 'required',
            'year_level' => 'required',
            'semester' => 'required'
        ]);

        Subject::create(
            $request->all()
        );

        return redirect()
            ->back()
            ->with(
                'success',
                'Subject added successfully.'
            );
    }

    public function update(
        Request $request,
        $id
    )
    {
        $subject =
            Subject::findOrFail($id);

        $subject->update(
            $request->all()
        );

        return redirect()
            ->back()
            ->with(
                'success',
                'Subject updated successfully.'
            );
    }

    public function destroy($id)
    {
        Subject::findOrFail($id)
            ->delete();

        return redirect()
            ->back()
            ->with(
                'success',
                'Subject deleted successfully.'
            );
    }


public function import(Request $request)
{
    $request->validate([
        'curriculum_file' => 'required|mimes:xlsx,csv'
    ]);

    $file = $request->file('curriculum_file');

    $spreadsheet =
        IOFactory::load(
            $file->getRealPath()
        );

    $worksheet =
        $spreadsheet->getActiveSheet();

    $rows =
        $worksheet->toArray();

    foreach(array_slice($rows,1) as $row)
    {
        if(empty($row[0]))
        {
            continue;
        }

        Subject::create([

            'subject_code'  => $row[0],
            'subject_title' => $row[1],
            'lec_hours'     => $row[2],
            'lab_hours'     => $row[3],
            'units'         => $row[4],
            'year_level'    => $row[5],
            'semester'      => $row[6],
            'prerequisite'  => $row[7] ?? null

        ]);
    }

    return redirect()
        ->route('subjects.index')
        ->with(
            'success',
            'Curriculum imported successfully.'
        );
}
}
