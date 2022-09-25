<?php


namespace App\Http\Controllers\Grades;
use App\Http\Controllers\Controller;
use App\Models\Classroom;
use CodeZero\UniqueTranslation\UniqueTranslationRule;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\StoreGrades;
use App\Models\Grade;
use Illuminate\Http\Request;

class GradeController extends Controller
{

/**
   * Display a listing of the resource.
   *
   * @return Response
   */
public function index()
{
    $Grades = Grade::all();
    return view('pages.Grades.Grades',compact('Grades'));
}



//   /**
//    * Store a newly created resource in storage.
//    *
//    * @return Response
//    */
public function store(StoreGrades $request)
    {
    try {
        $validated = $request->validated();
        $Grade = new Grade();
        $Grade->Name = ['en' => $request->Name_en, 'ar' => $request->Name];
        $Grade->Notes = $request->Notes;
        $Grade->save();
        Alert::success(trans('messages.Done'),trans('messages.success'));
        return redirect()->route('Grades.index');
    }
    catch (\Exception $e){
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }


}

//   /**
//    * Update the specified resource in storage.
//    *
//    * @param  int  $id
//    * @return Response
//    */
public function update(StoreGrades $request)
{
    try {

        $validated = $request->validated();
        $Grades = Grade::findOrFail($request->id);
        $Grades->update([
        $Grades->Name = ['ar' => $request->Name, 'en' => $request->Name_en],
        $Grades->Notes = $request->Notes,
        ]);
        Alert::success(trans('messages.Done'),trans('messages.Update'));
        return redirect()->route('Grades.index');
        }
    catch (\Exception $e) {
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
}

//   /**
//    * Remove the specified resource from storage.
//    *
//    * @param  int  $id
//    * @return Response
//    */
public function destroy(Request $request)
{
    $MyClass_id = Classroom::where('Grade_id',$request->id)->pluck('Grade_id');
    if($MyClass_id->count() == 0){
        $Grades = Grade::findOrFail($request->id)->delete();
        toast()->error(trans('messages.Delete'));
        return redirect()->route('Grades.index');
    }
    else{

        Alert::error(trans('messages.Not possible'),trans('Grades_trans.delete_Grade_Error'));
        return redirect()->route('Grades.index');
    }
}

}
