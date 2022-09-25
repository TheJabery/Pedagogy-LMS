<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function loginForm($type){

        return view('auth.login', compact('type'));

    }

    public function login(Request $request){
        if (Auth::guard($this->getUserType($request))->attempt(['email' => $request->email, 'password' => $request->password])) {
            return $this->redirect($request);
        }else{
            return redirect()->back()->with('message', 'يوجد خطا في كلمة المرور او اسم المستخدم');
            }


    }


    public function logout(Request $request,$type)
    {
        Auth::guard($type)->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function getUserType(Request $request){
        if($request->type =='student'){
            $guardName='student';
        }
        elseif($request->type=='parent'){
            $guardName='parent';
        }elseif($request->type=='teacher'){
            $guardName='teacher';
        }else{
            $guardName='web';
        }
        return $guardName;
    }

    public function redirect($request){

        if($request->type == 'student'){
            return redirect()->intended(RouteServiceProvider::STUDENT);
        }
        elseif ($request->type == 'parent'){
            return redirect()->intended(RouteServiceProvider::PARENT);
        }
        elseif ($request->type == 'teacher'){
            return redirect()->intended(RouteServiceProvider::TEACHER);
        }
        else{
            return redirect()->intended(RouteServiceProvider::HOME);
        }
    }

}
