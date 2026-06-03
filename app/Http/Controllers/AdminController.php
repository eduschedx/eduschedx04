<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {

        return view('admin.dashboard', [

            'pendingCount' => Faculty::where(
                'status',
                'pending'
            )->count(),

            'approvedCount' => Faculty::where(
                'status',
                'approved'
            )->count(),

            'rejectedCount' => Faculty::where(
                'status',
                'rejected'
            )->count(),

            'faculties' => Faculty::whereIn(
                'status',
                ['pending', 'approved']
            )->orderBy(
                'created_at',
                'desc'
            )->get()

        ]);
    }

    public function approve($id)
    {
        $faculty = Faculty::findOrFail($id);

        $faculty->status = 'approved';

        $faculty->save();

        return redirect()
            ->back()
            ->with(
                'success',
                'Faculty approved successfully.'
            );
    }

    public function reject($id)
    {
        $faculty = Faculty::findOrFail($id);

        $faculty->status = 'rejected';

        $faculty->save();

        return redirect()
            ->back()
            ->with(
                'success',
                'Faculty application rejected.'
            );
    }


        public function updateFaculty(
    Request $request,
    $id
)
{
    $faculty =
        Faculty::findOrFail($id);

    $faculty->update([

        'first_name' =>
            $request->first_name,

        'middle_name' =>
            $request->middle_name,

        'last_name' =>
            $request->last_name,

        'department' =>
            $request->department,

        'specialization' =>
            $request->specialization

    ]);

    return redirect()
        ->back()
        ->with(
            'success',
            'Faculty information updated successfully.'
        );
}

}
