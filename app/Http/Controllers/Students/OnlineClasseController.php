<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Http\Traits\MeetingZoomTrait;
use App\Models\Grade;
use JoisarJignesh\Bigbluebutton\Facades\Bigbluebutton;
use App\Models\online_classe;
use Illuminate\Http\Request;



class OnlineClasseController extends Controller
{
    use MeetingZoomTrait;
    public function index()
    {
        // dd(\Bigbluebutton::isConnect());
        $online_classes = online_classe::with('grade','classroom','section')->where('created_by',auth()->user()->name)->get();
        return view('pages.online_classes.index', compact('online_classes'));
    }


    public function create()
    {
        $Grades = Grade::all();
        return view('pages.online_classes.add', compact('Grades'));
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


    public function store(Request $request)
    {
        try {

           $online_classe= online_classe::create([
                'Grade_id' => $request->Grade_id,
                'Classroom_id' => $request->Classroom_id,
                'section_id' => $request->section_id,
                'created_by' => auth()->user()->name,
                'user_id' => auth()->user()->id,
                'meeting_id' => $request->meeting_id,
                'topic' => $request->topic,
                'start_at' => $request->start_time,
                'duration' => $request->duration,
                'password' => $request->password,
                'student_password' => $request->student_password,
            ]);

            toast()->success(trans('messages.success'));
            return redirect()->route('online_classes.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }


    public function JionLesson(Request $request)
    {
        try {
            $lesson = online_classe::findorfail($request->id);
            return redirect()->to(
                Bigbluebutton::join([

                   'meetingID' => $lesson->id,
                   'userName' => auth()->user()->name,
                   'password' => $lesson->student_password,
                    ])
               );
      } catch (\Exception $e) {
          return redirect()->back()->withErrors(['error' => $e->getMessage()]);
      }

    }



    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy(Request $request)
    {
        // try {

        //     $info = online_classe::find($request->id);

        //     if($info->integration == true){
        //         $meeting = Zoom::meeting()->find($request->meeting_id);
        //         $meeting->delete();
        //        // online_classe::where('meeting_id', $request->id)->delete();
        //         online_classe::destroy($request->id);
        //     }
        //     else{
        //        // online_classe::where('meeting_id', $request->id)->delete();
        //         online_classe::destroy($request->id);
        //     }

        //     toast()->success(trans('messages.Delete'));
        //     return redirect()->route('online_classes.index');
        // } catch (\Exception $e) {
        //     return redirect()->back()->with(['error' => $e->getMessage()]);
        // }

    }
}
