<?php

namespace App\Http\Controllers;

use App\Models\Absence;
use App\Models\Administration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdministrationController extends Controller
{
    public function log(){
        if(session()->has('LoggedUserAdm')){
            return redirect('/admin/dashboard');
        }
        return view('auth.loginAdmin');
    }
    public function dashboard(){
        if(session()->has('LoggedUserAdm')){
            $data=['loggedUserInfo'=>Administration::where('id', '=', session('LoggedUserAdm'))->first(),
                    'absences'=>Absence::join('students', 'idEtu', '=', 'students.id')
                                        ->select(DB::raw('(count(absences.id)*2) as nbrhr, students.nomc, students.fill, students.cne, students.niveau'))
                                        ->where('justi','!=',1)
                                        ->groupBy('students.cne','students.nomc','students.fill', 'students.niveau')
                                        ->having('nbrhr','>=',12)
                                        ->get()
            ];
            return view('admin.dasshboard',$data);
        }else{
            return redirect('/error-404');
        }
        
    }
    public function save(Request $request){
        $request->validate([
            'nomc'=>'required',
            'cin'=>'required',
            'image'=>'required|image|mimes:jpg,jpeg,png',
            'user'=>'required|unique:administrations',
            'password'=>'required|min:8',
            'confirmed'=>'required|same:password'
        ]);
        $admin=new Administration();
        $admin->nomc=$request->nomc;
        $admin->cin=$request->cin;
        $admin->user=$request->user;
        $admin->password=Hash::make($request->password);
        $image=$request->file('image');
        $destiPath='images/';
        $profileimage=date('YmdHis').".".$image->getClientOriginalExtension();
        $image->move($destiPath,$profileimage);
        $admin->image=$profileimage;
        $save=$admin->save();
        if(!$save){
            return back()->with('fail','quelque chose est mal passée!');
        }else{
            return back()->with('success','Un nouveau admin a été ajouté !');
        }
    }
    public function check(Request $request){
        $request->validate([
            'user'=>'required',
            'password'=>'required|min:8'
        ]);
        $userinfo=Administration::where('user', '=',$request->user)->first();
        if(!$userinfo){
            return back()->with('fail','User Incorrect');
        }else{
            if(Hash::check($request->password, $userinfo->password)){
                $request->session()->put('LoggedUserAdm',$userinfo->id);
                $request->session()->put('LoggedUAdm',$userinfo->user);
                if(session()->has('LoggedUserStud')){
                    session()->pull('LoggedUserStud');
                    session()->pull('LoggedUStud');
                }
                if(session()->has('LoggedUserTea')){
                    session()->pull('LoggedUserTea');
                    session()->pull('LoggedUTea');
                }

                return redirect('/admin/dashhboard');
            }
            return back()->with('fail','Mot de Pass Incorrect');
        }
    }
    public function logout(){
        if(session()->has('LoggedUserAdm')){
            session()->pull('LoggedUserAdm');
            session()->pull('LoggedUAdm');
            return redirect('/');
        }
    }
    public function profil(){
        if(session()->has('LoggedUserAdm')){
            $data=['detail'=>Administration::where('id','=', session('LoggedUserAdm'))->first()];
            return view('admin.profile',$data);
        }else{
            return redirect('/error-404');
        }
    }
    public function regis(){
        if(session()->has('LoggedUserAdm')){
            return view('auth.registeraadmin');
        }else{
            return redirect('/error-404');
        }
    }
    public function notif(){
        if(session()->has('LoggedUserAdm')){
            $data=['absences'=>Absence::join('students', 'idEtu', '=', 'students.id')
                                        ->select(DB::raw('(count(absences.id)*2) as nbrhr, students.nomc, students.fill, students.cne, students.niveau, absences.idEtu'))
                                        ->where('justi','!=',1)
                                        ->groupBy('students.cne','students.nomc','students.fill', 'students.niveau', 'absences.idEtu' )
                                        ->having('nbrhr','>=',12)
                                        ->get()
            ];
            return view('admin.notiification',$data);
        }else{
            return redirect('/error-404');
        }
    }
}
