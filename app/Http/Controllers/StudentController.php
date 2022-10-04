<?php

namespace App\Http\Controllers;

use App\Models\Absence;
use App\Models\Contact;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function log(){
        if(session()->has('LoggedUserStud')){
            return redirect('/student/dashboard');
        }
        return view('auth.loginstud');
    }
    public function dashboard(){
        if(session()->has('LoggedUserStud')){
            $data=['loggedUserInfo'=>Student::where('id', '=', session('LoggedUserStud'))->first(),
                    'messages'=>Contact::all()->where('idEtu',session('LoggedUserStud'))
                                                ->where('vu', '=', 0)
            ];
            return view('student.dashhboard', $data);
        }else{
            return redirect('/error-404');
        }
    }
    public function inbox(){
        if(session()->has('LoggedUserStud')){
            $data=['Nmessages'=>Contact::join('administrations', 'idAdm', '=', 'administrations.id')
                                        ->where('idEtu',session('LoggedUserStud'))
                                        ->orderBy('contacts.id','DESC')
                                        ->where('vu', '=', 0)
                                        ->get(['contacts.message','administrations.nomc']),
                    'Omessages'=>Contact::join('administrations', 'idAdm', '=', 'administrations.id')
                                        ->where('idEtu',session('LoggedUserStud'))
                                        ->where('vu', '=', 1)
                                        ->orderBy('contacts.id','DESC')
                                        ->get(['contacts.message','administrations.nomc'])
            ];
            $update=Contact::where('idEtu',session('LoggedUserStud'))->update(['vu'=>1]);
            return  view('student.innbox',$data);
        }else{
            return redirect('/error-404');
        }
    }
    public function regis(){
        if(session()->has('LoggedUserAdm')){
        return view('auth.registerStud');
        }else{
            return redirect('/error-404');
        }
    }
    public function save(Request $request){
        $request->validate([
            'nomc'=>'required',
            'cne'=>'required|unique:students',
            'fill'=>'required',
            'niveau'=>'required',
            'image'=>'required|image|mimes:jpg,jpeg,png',
            'password'=>'required|min:8',
            'confirmed'=>'required|same:password',
        ]);
        $student=new Student();
        $student->nomc=$request->nomc;
        $student->cne=$request->cne;
        $student->fill=$request->fill;
        $student->niveau=$request->niveau;
        $student->password=Hash::make($request->password);
        $image=$request->file('image');
        $destiPath='images/';
        $profileimage="student".date('YmdHis').".".$image->getClientOriginalExtension();
        $image->move($destiPath,$profileimage);
        $student->image=$profileimage;
        $save=$student->save();
        if(!$save){
            return back()->with('fail','quelque chose est mal passé!');
        }else{
            return back()->with('success','un nouveau étudiant a été ajouté!');
        }
    }

    public function check(Request $request){
        $request->validate([
            'cne'=>'required',
            'password'=>'required'
        ]);
        $userinfo=Student::where('cne', '=',$request->cne)->first();
        if(!$userinfo){
            return back()->with('fail','CNE Incorrect');
        }else{
            if(Hash::check($request->password, $userinfo->password)){
                $request->session()->put('LoggedUserStud',$userinfo->id);
                $request->session()->put('LoggedUStud',$userinfo->nomc);
                if(session()->has('LoggedUserTea')){
                    session()->pull('LoggedUserTea');
                    session()->pull('LoggedUTea');
                }
                if(session()->has('LoggedUserAdm')){
                    session()->pull('LoggedUserAdm');
                    session()->pull('LoggedUAdm');
                }
                return redirect('student/dashboard');
            }
            return back()->with('fail','Mot de Passe Incorrect');
        }
    }
    public function logout(){
        if(session()->has('LoggedUserStud')){
            session()->pull('LoggedUserStud');
            session()->pull('LoggedUStud');
            return redirect('/');
        }
    }
    public function last(){
        if(session()->has('LoggedUserTea')){
            $data=['detail'=>  Absence::join('teachers', 'idProf', '=', 'teachers.id')
                                    ->join('students', 'idEtu', '=', 'students.id')
                                    ->where('idProf', '=', session('LoggedUserTea'))
                                    ->limit(10)
                                    ->get(['students.nomc', 'students.cne', 'absences.seance', 'absences.justi', 'absences.created_at', 'absences.justification'])
                                    
            ];
            return view('student.lastAbs', $data);
        }else{
            return redirect('/error-404');
        }
    }
    public function mesAbs(){
        if(session()->has('LoggedUserStud')){
            $data=['detail'=>Absence::all()->where('idEtu', '=', session('LoggedUserStud')),
                    'nbrhr'=>Absence::all()->where('idEtu', '=', session('LoggedUserStud'))
                                        ->where('justi', '!=',1)
            ];
            return view('student.mesAbs', $data);
        }else{
            return redirect('/error-404');
        }
    }
    public function justify(Request $request, $id){
        $request->validate([
            'justification'=>'required|image|mimes:jpg,png,jpeg'
        ]);
        $justification=$request->file('justification');
        $destiPath='images/';
        $profilejusti=date('YmdHis').".".$justification->getClientOriginalExtension();
        $justification->move($destiPath,$profilejusti);
        $update=Absence::where('id',$id)->update(['justification'=>$profilejusti]);
        if($update){
            return redirect('/student/mes-absences');
        }else{
            return back()->with('fail','quelque chose est mal passé!');
        }
    }
    public function liAbs(){
        if(session()->has('LoggedUserAdm')){
            $data=['detail' => Absence::join('students', 'idEtu', '=', 'students.id')
                                        ->where('absences.justi', 0)
                                        ->get(['students.nomc', 'students.cne', 'students.image', 'students.fill', 'students.niveau','absences.seance', 'absences.id', 'absences.idEtu', 'absences.created_at', 'absences.justification'])
            ];
            return view('admin.liNonJust',$data);
        }else{
            return redirect('/error-404');
        }
    }

    public function liJus(){
        if(session()->has('LoggedUserAdm')){
            $data=['detail' => Absence::join('students', 'idEtu', '=', 'students.id')
                                        ->where('absences.justi', 1)
                                        ->get(['students.nomc', 'students.cne', 'students.image', 'students.fill', 'students.niveau','absences.seance', 'absences.id', 'absences.idEtu', 'absences.created_at', 'absences.justifiePar'])
            ];
            return view('admin.liJusstifier',$data);
        }else{
            return redirect('/error-404');
        }
    }

    public function liRef(){
        if(session()->has('LoggedUserAdm')){
            $data=['detail' => Absence::join('students', 'idEtu', '=', 'students.id')
                                        ->where('absences.justi', -1)
                                        ->get(['students.nomc', 'students.cne', 'students.image', 'students.fill', 'students.niveau','absences.seance', 'absences.id', 'absences.idEtu', 'absences.created_at', 'absences.justifiePar'])
            ];
            return view('admin.liiRefuse',$data);
        }else{
            return redirect('/error-404');
        }
    }

    public function accept($id){
        if(session()->has('LoggedUserAdm')){
            $update=Absence::where('id', $id)->update(['justi'=>1, 'justifiePar'=> session('LoggedUAdm')]);
            if($update){
                return redirect('/admin/list-abnsence');
            }else{
                return back()->with('fail','quelque chose est mal passé!');
            }
        }else{
            return redirect('/error-404');
        }
    }
    public function refuse($id){
        if(session()->has('LoggedUserAdm')){
            $update=Absence::where('id', $id)->update(['justi'=>-1, 'justifiePar'=> session('LoggedUAdm')]);
            if($update){
                return redirect('/admin/list-abbsence');
            }else{
                return back()->with('fail','quelque chose est mal passé!');
            }
        }else{
            return redirect('/error-404');
        }
    }
    public function studpage()
    {
        if(session()->has('LoggedUserAdm')){
            return view('admin.studdpage');
        }else{
            return redirect('/error-404');
        }
    }
    public function studinform($id){
        if(session()->has('LoggedUserAdm') || session()->has('LoggedUserTea')){
            $data=[
                'etudiant'=>Student::where('id', '=', $id)->first()
            ];
            
            return view('admin.studssinfor', $data);
        }else{
            return redirect('/error-404');
        }
    }
    public function lisAbse($id){
        if(session()->has('LoggedUserAdm') || session()->has('LoggedUserTea')){
            $data=['absence'=>Absence::join('students', 'idEtu', '=', 'students.id')
                                        ->where('idEtu', '=', $id)
                                        ->get(['students.nomc', 'students.cne', 'students.image','absences.seance','absences.justi','absences.idEtu', 'absences.justification',  'absences.created_at', 'absences.justifiePar']),
                    'name'=>Student::all()->where('id',$id)->first()
            ];
            return view('admin.lisstAbse',$data);
        }else{
            return redirect('/error-404');
        }
    }
    public function chooseCla(){
        if(session()->has('LoggedUserTea')){
            return view('teacher.chsCls');
        }else{
            return redirect('/error-404');
        }
    }
    public function selectCla(Request $request){
        if(session()->has('LoggedUserTea')){
            $request->validate([
                'fill'=>'required',
                'niveau'=>'required'
            ]);
            $data=['students'=>Student::all()->where('niveau','=', $request->niveau)
                                            ->where('fill','=', $request->fill),
                    'fill'=>$request->fill,
                    'niveau'=>$request->niveau
            ];
            return view('teher.setListAbs',$data);
        }else{
            return redirect('/error-404');
        }
    }
    public function setAbs(Request $request){
        if(session()->has('LoggedUserTea')){
            if(!empty($request->abs)){
                $seance=$request->seance;
                $idProf=session('LoggedUserTea');
                foreach($request->abs as $row){
                    $absence=new Absence();
                    $absence->idProf=$idProf;
                    $absence->idEtu=$row;
                    $absence->seance=$seance;
                    $save=$absence->save();
                    if(!$save){
                        return back()->with('fail','quelque chose est mal passé!');
                    }
                }
                return redirect()->route('studens.abs',['seance'=>$seance]);
            }else{
                return redirect()->route('aucunAbs');
            }
        }else{
            return redirect('/error-404');
        }
    }
    public function showT($seance){
        if(session()->has('LoggedUserTea')){
            $data=['absents'=>Absence::join('students', 'idEtu', '=', 'students.id')
                                                ->where('date',Carbon::today()->format('Y-m-d'))
                                                ->where('idProf',session('LoggedUserTea'))
                                                ->where('seance',$seance)
                                                ->get(['students.nomc', 'students.cne', 'students.image','absences.id','absences.idEtu']),
                    'date'=>Carbon::today()->format('d/m/Y'),
                    'seance'=>$seance
            ];
                    return view('teacher.valiAbs',$data);
        }else{
            return redirect('/error-404');
        }
    }
    public function seaClas(){
        if(session()->has('LoggedUserAdm')){
            return view('admin.sealas');
        }else{
            return redirect('/error-404');
        }
    }
    public function shoClas(Request $request){
        if(session()->has('LoggedUserAdm')){
            $request->validate([
                'fill'=>'required',
                'niveau'=>'required'
            ]);
            $data=['students'=>Student::all()->where('niveau','=', $request->niveau)
                                            ->where('fill','=', $request->fill),
                    'fill'=>$request->fill,
                    'niveau'=>$request->niveau
            ];
            return view('admn.shoClas',$data);
        }else{
            return redirect('/error-404');
        }
    }
    public function removeAbsent($id){
        if(session()->has('LoggedUserTea')){
            $delete=Absence::destroy($id);
            return back();
        }else{
            return redirect('/error-404');
        }
    }
    public function aucunAbs(){
        if(session()->has('LoggedUserTea')){
            return view('techer.aucunAbs');
        }else{
            return redirect('/error-404');
        }
    }
}
