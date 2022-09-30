<?php

namespace App\Http\Controllers\Teachers\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Traits\MeetingZoomTrait;
use App\Models\Grade;
use App\Models\online_classe;
use Illuminate\Http\Request;
use MacsiDigital\Zoom\Facades\Zoom;

class OnlineZoomClassesController extends Controller
{
    public function index()
    {

        $online_classes = online_classe::where('teacher_id',auth()->user()->id)->get();
        return view('pages.Teachers.dashboard.online_classes.index', compact('online_classes'));
    }


    public function create()
    {
        $Grades = Grade::all();
        return view('pages.Teachers.dashboard.online_classes.add', compact('Grades'));
    }

    public function indirectCreate()
    {
        $Grades = Grade::all();
        return view('pages.Teachers.dashboard.online_classes.indirect', compact('Grades'));
    }



    public function store(Request $request)
    {
      // return auth()->user()->id;
        try {

            $online_classe= online_classe::create([
                 'Grade_id' => $request->Grade_id,
                 'Classroom_id' => $request->Classroom_id,
                 'section_id' => $request->section_id,
                 'created_by' => auth()->user()->Name,
                 'teacher_id' => auth()->user()->id,
                 'meeting_id' => $request->meeting_id,
                 'topic' => $request->topic,
                 'start_at' => $request->start_time,
                 'duration' => $request->duration,
                 'password' => $request->password,
                 'student_password' => $request->student_password,
             ]);

             toast()->success(trans('messages.success'));
             return redirect()->route('online_zoom_classes.index');
         } catch (\Exception $e) {
             return redirect()->back()->withErrors(['error' => $e->getMessage()]);
         }
    }



    public function startLesson(Request $request)
    {
try {
      $lesson = online_classe::findorfail($request->id);
     \Bigbluebutton::create([
        'meetingID' => $lesson->id,
        'meetingName' => $lesson->topic,
        'attendeePW' => $lesson->student_password,
        'moderatorPW' => $lesson->password,
    ]);
} catch (\Exception $e) {
    return redirect()->back()->withErrors(['error' => $e->getMessage()]);
}
    }


    public function destroy(Request $request,$id)
    {
        try {
            online_classe::findOrFail($request->id)->delete();
            toast()->success(trans('messages.Delete'));
            return redirect()->route('online_zoom_classes.index');
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
}
