<?php

namespace App\Http\Controllers;

use domain\Facades\StudentFacade;
use Illuminate\Http\Request;
use Inertia\Inertia;

class StudentController extends ParentController
{

    public function index()
    {
        $response['students'] = StudentFacade::all();
        return Inertia::render('Student')->with($response);
    }

    public function store(Request $request)
    {
        StudentFacade::store($request->all());
        // $response['students'] = StudentFacade::all();
        // return response()->json($response);
        return redirect()->back();
    }

    public function delete($student_id)
    {
        StudentFacade::delete($student_id);
        return redirect()->back();
    }

    // todo: update controller must be implemented here
}
