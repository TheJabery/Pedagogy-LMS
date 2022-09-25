<?php

namespace App\Http\Controllers\Teachers;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use App\Models\Student;

class TeacherDashboardController extends Controller
{

    public function __invoke()
    {
        $ids = Teacher::with('genders','specializations')->findorFail(auth()->user()->id)->Sections()->pluck('section_id');
        $data['count_sections']= $ids->count();
        $data['count_students']= Student::with('gender','grade','classroom','section')->whereIn('section_id',$ids)->count();

        return view('pages.Teachers.dashboard.dashboard',$data);
    }
}
