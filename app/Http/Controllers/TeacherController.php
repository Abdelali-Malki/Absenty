<?php

namespace App\Http\Controllers;

use App\Models\Absence;
use App\Models\ContactProf;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{
    public function log(){
        if(session()->has('LoggedUserTea')){
            return redirect('teacher/dashboard');
        }
        return view('auth.loginteach');
    }
    
    public function dashboard(){
        if(session()->has('LoggedUserTea')){
            $data=['loggedUserInfo'=>Teacher::where('id', '=', session('LoggedUserTea'))->first(),
                'messages'=>ContactProf::all()->where('idProf',session('LoggedUserTea'))
                ->where('vu', '=', 0)
            ];
            return view('teacher.dashboard', $data);
        }else{
            return redirect('/error-404');
        }
    }
    public function check(Request $request){
        $request->validate([
            'user'=>'required',
            'password'=>'required|min:8'
        ]);
        $userinfo=Teacher::where('user', '=',$request->user)->first();
        if(!$userinfo){
            return back()->with('fail','User Incorrect');
        }else{
            if(Hash::check($request->password, $userinfo->password)){
                $request->session()->put('LoggedUserTea',$userinfo->id);
                $request->session()->put('LoggedUTea',$userinfo->user);
                if(session()->has('LoggedUserStud')){
                    session()->pull('LoggedUserStud');
                    session()->pull('LoggedUStud');
                }
                if(session()->has('LoggedUserAdm')){
                    session()->pull('LoggedUserAdm');
                    session()->pull('LoggedUAdm');
                }
                return redirect('teacher/dashboard');
            }
            return back()->with('fail','Mot de Passe Incorrect');
        }
    }
    public function save(Request $request){
        $request->validate([
            'nomc'=>'required',
            'cin'=>'required',
            'fill'=>'required',
            'image'=>'required|image|mimes:jpg,jpeg,png',
            'user'=>'required|unique:teachers',
            'password'=>'required|min:8',
            'confirmed'=>'required|same:password',
        ]);
        $teacher=new Teacher();
        $teacher->nomc=$request->nomc;
        $teacher->cin=$request->cin;
        $teacher->fill=$request->fill;
        $teacher->user=$request->user;
        $teacher->password=Hash::make($request->password);
        $image=$request->file('image');
        $destiPath='images/';
        $profileimage=date('YmdHis').".".$image->getClientOriginalExtension();
        $image->move($destiPath,$profileimage);
        $teacher->image=$profileimage;
        $save=$teacher->save();
        if(!$save){
            return back()->with('fail','quelque chose est mal passé!');
        }else{
            return back()->with('success','un nouveau prefesseur a été ajouté!');
        }
    }
    public function remove($id){
        if(session()->has('LoggedUserAdm')){
            $delete=Teacher::destroy($id);
            return redirect('teacher-mana');
        }else{
            return redirect('/error-404');
        }
    }

    public function detail($id){
        if(session()->has('LoggedUserAdm')){
            $data=['teach' => Teacher::where('id', '=', $id)->first()];
            return view('teacher.teacherinfo',$data);
        }else{
            return redirect('/error-404');
        }
    }

    public function logout(){
        if(session()->has('LoggedUserTea')){
            session()->pull('LoggedUserTea');
            session()->pull('LoggedUTea');
            return redirect('/');
        }
    }
    public function info(){
        if(session()->has('LoggedUserAdm')){
            $data=['details'=>Teacher::all()];
            return view('teacher.teaDetails',$data);
        }else{
            return redirect('/error-404');
        }
    }
    public function regis(){
        if(session()->has('LoggedUserAdm')){
            return view('auth.registerteach');
        }else{
            return redirect('/error-404');
        }
    }
    public function profil(){
        if(session()->has('LoggedUserTea')){
            $data=['detail'=>Teacher::where('id','=', session('LoggedUserTea'))->first()];
            return view('teacher.profile',$data);
        }else{
            return redirect('/error-404');
        }
    }
    public function inbox(){
        if(session()->has('LoggedUserTea')){
            $data=['Nmessages'=>ContactProf::join('administrations', 'idAdm', '=', 'administrations.id')
                                        ->where('idProf',session('LoggedUserTea'))
                                        ->where('vu', '=', 0)
                                        ->orderBy('contact_profs.id','DESC')
                                        ->get(['contact_profs.message','administrations.nomc']),
                    'Omessages'=>ContactProf::join('administrations', 'idAdm', '=', 'administrations.id')
                                        ->where('idProf',session('LoggedUserTea'))
                                        ->where('vu', '=', 1)
                                        ->orderBy('contact_profs.id','DESC')
                                        ->get(['contact_profs.message','administrations.nomc'])
            ];
            $update=ContactProf::where('idProf',session('LoggedUserTea'))->update(['vu'=>1]);
            return  view('teacher.inboox',$data);
        }else{
            return redirect('/error-404');
        }
    }
}
