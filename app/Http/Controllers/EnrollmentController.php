<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\School;


class EnrollmentController extends Controller
{


    public function schoolDropdown()
    {
        $schoolsArray = School::orderBy('school_name')->get()->toArray();
        return view('select-school', compact('schoolsArray'));
    }

    public function displayStudents(Request $request)
    {
        // the school selected by the user
        $selectedSchool = $request->schoolSelection;

        //error_log(print_r($selectedSchool));

        // get the student ids in an array, from the enrollment table where the school_id is the same as the selected school
        $enrollmentStudentIDs = Enrollment::select(['student_id'])->where('school_id', $selectedSchool)->get()->toArray();

        // print "<pre>";
        // error_log(print_r($enrollmentStudentIDs));
        // print "<pre>";

        // get the student ids out of the enrollments array and into a new array that holds only the integer student ids

        $enrollmentStudentIDsArray = [];

        foreach ($enrollmentStudentIDs as $enrollmentStudent) {
            // print "<pre>";
            // error_log(print_r($enrollmentStudent['student_id']));
            // print "<pre>";
            array_push($enrollmentStudentIDsArray, $enrollmentStudent['student_id']);
        }

        // print "<pre>";
        // error_log(print_r($enrollmentStudentIDsArray));
        // print "<pre>";

        // use the student ids from the enrollments table to get the data for students in the students table
        $studentData = [];

        foreach ($enrollmentStudentIDsArray as $key => $value) {
            $studentData[$key] = DB::table('students')->where('id', '=', $value)->get();
        }

        // print "<pre>";
        // error_log(print_r($studentData));
        // print "<pre>";


        // foreach ($studentData as $student) {
        //     foreach ($student as $stud) {
        //         error_log(print_r($stud->name));
        //         error_log(print_r($stud->email_address));
        //     }
        // }


        return view('display-students', compact('studentData'));
    }
}
