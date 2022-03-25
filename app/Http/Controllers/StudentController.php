<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\School;

class StudentController extends Controller
{
    public function selectSchools()
    {
        $schools = School::orderBy('school_name')->get()->toArray();
        return view('add-student', compact('schools'));
    }

    public function saveStudent(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required|max:255',
            'email_address' => 'required|unique:students|max:255',
        ]);

        $studentID = DB::table('students')->insertGetId([
            'name' => $request->name,
            'email_address' => $request->email_address
        ]);

        $schools = $request->input('schools');

        foreach ($schools as $school) {

            DB::table('enrollments')->insert([

                'school_id' => $school,
                'student_id' => $studentID
            ]);
        }
        return back()->with('student_add', 'Student added successfully');
    }
}
