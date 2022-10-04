<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\ContactProf;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){
        return view('index');
    }
    public function showCon(){
        if(session()->has('LoggedUserAdm')){
            return view('admin.contact');
        }else{
            return redirect('/error-404');
        }
    }
    public function showConProf(){
        if(session()->has('LoggedUserAdm')){
            $data=['profs'=>Teacher::all()->sortBy('nomc')];
            return view('admin.contactProf', $data);
        }else{
            return redirect('/error-404');
        }
    }
    public function sendMes(Request $request){
        if(session()->has('LoggedUserAdm')){
            if($request->diff==1){
                $request->validate([
                    'message'=>'required'
                ]);
                if($request->fill == 0){
                    if($request->niveau == 0){
                        $ids=Student::get('id');
                        foreach($ids as $id){
                            $contact=new Contact();
                            $contact->idAdm=session('LoggedUserAdm');
                            $contact->idEtu=$id->id;
                            $contact->message=$request->message;
                            $save=$contact->save();
                            if(!$save){
                                return back()->with('fail','quelque chose est mal passé!');
                            }
                        }
                        return back()->with('success','Votre message a été envoyé a tous les étudiants');
                    }else{
                        $ids=Student::where('niveau',$request->niveau)->get('id');
                        foreach($ids as $id){
                            $contact=new Contact();
                            $contact->idAdm=session('LoggedUserAdm');
                            $contact->idEtu=$id->id;
                            $contact->message=$request->message;
                            $save=$contact->save();
                            if(!$save){
                                return back()->with('fail','quelque chose est mal passé!');
                            }
                        }
                        if($request->niveau==1){
                            $nv='Première Année';
                        }else{
                            $nv='Deuxième Année';
                        }
                        return back()->with('success','Votre message a été envoyé a tous les étudiants du '.$nv.' !');
                    }
                }else{
                    if($request->niveau == 0){
                        $ids=Student::where('fill',$request->fill)->get('id');
                        foreach($ids as $id){
                            $contact=new Contact();
                            $contact->idAdm=session('LoggedUserAdm');
                            $contact->idEtu=$id->id;
                            $contact->message=$request->message;
                            $save=$contact->save();
                            if(!$save){
                                return back()->with('fail','quelque chose est mal passé!');
                            }
                        }
                        return back()->with('success','Votre message a été envoyé a tous les étudiants du filliere '.$request->fill.' !');
                    }else{
                        $ids=Student::where('fill',$request->fill)->where('niveau',$request->niveau)->get('id');
                        foreach($ids as $id){
                            $contact=new Contact();
                            $contact->idAdm=session('LoggedUserAdm');
                            $contact->idEtu=$id->id;
                            $contact->message=$request->message;
                            $save=$contact->save();
                            if(!$save){
                                return back()->with('fail','quelque chose est mal passé!');
                            }
                        }
                        if($request->niveau==1){
                            $nv='Première Année';
                        }else{
                            $nv='Deuxième Année';
                        }
                        return back()->with('success','Votre message a été envoyé a tous les étudiants du '.$nv.' '.$request->fill.' !');
                    }
                }
            }else{
                $request->validate([
                    'cne'=>'required',
                    'message'=>'required'
                ]);
                $dt=Student::where('cne',$request->cne)->get(['id'])->first();
                $name=Student::where('cne',$request->cne)->get(['nomc'])->first();
                if(!$dt){
                    return back()->with('fail','On peut pas trouver ce CNE!');
                }
                $idEtu=$dt->id;
                $contact=new Contact();
                $contact->idAdm=session('LoggedUserAdm');
                $contact->idEtu=$idEtu;
                $contact->message=$request->message;
                $save=$contact->save();
                if(!$save){
                    return back()->with('fail','quelque chose est mal passé!');
                }else{
                    return back()->with('success','Votre message a été envoyé a '.$name->nomc .'!');
                }
            }
        }else{
            return redirect('/error-404');
        }
    }
    public function sendMesProf(Request $request){
        if(session()->has('LoggedUserAdm')){
            if($request->diff==1){
                $request->validate([
                    'message'=>'required'
                ]);
                $ids=Teacher::get('id');
                foreach($ids as $id){
                    $contact=new ContactProf();
                    $contact->idAdm=session('LoggedUserAdm');
                    $contact->idProf=$id->id;
                    $contact->message=$request->message;
                    $save=$contact->save();
                    if(!$save){
                        return back()->with('fail','quelque chose est mal passé!');
                    }
                }
                return back()->with('success','Votre message a été envoyé a toute les Professeurs!');
            }else{
                $request->validate([
                    'id'=>'required',
                    'message'=>'required'
                ]);
                
                $idProf=$request->id;
                $name=Teacher::where('id',$idProf)->get(['nomc'])->first();
                $contact=new ContactProf();
                $contact->idAdm=session('LoggedUserAdm');
                $contact->idProf=$idProf;
                $contact->message=$request->message;
                $save=$contact->save();
                if(!$save){
                    return back()->with('fail','quelque chose est mal passé!');
                }else{
                    return back()->with('success','Votre message a été envoyé a '.$name->nomc.'!');
                }
            }
        }else{
            return redirect('/error-404');
        }
    }
    public function showOne($id){
        if(session()->has('LoggedUserAdm')){
            $data=[
                'etudiant'=>Student::all()->where('id',$id)->first()
            ];
            return view('admin.contOne',$data);
        }else{
            return redirect('/error-404');
        }
    }
}
