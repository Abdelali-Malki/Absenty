<?php

use App\Http\Controllers\AdministrationController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Models\Student;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect('/accueil');
});
Route::get('/accueil',[MainController::class, 'index']);
Route::get('/student/login',[StudentController::class, 'log'])->name('student.login');
Route::get('/student/dashboard',[StudentController::class, 'dashboard'])->name('student.dashboard');
Route::post('/checkstud',[StudentController::class, 'check'])->name('student.check');
Route::get('/logoutstud',[StudentController::class, 'logout'])->name('student.logout');
Route::get('/student/mes-absences',[StudentController::class, 'mesAbs']);
Route::get('/teacher/last-absence', [StudentController::class, 'last']);
Route::post('/justify', [StudentController::class, 'justify'])->name('justify');
Route::get('/admin/list-absence', [StudentController::class, 'liAbs']);
Route::get('/admin/list-justifie', [StudentController::class, 'liJus']);
Route::get('/admin/list-refuse', [StudentController::class, 'liRef']);
Route::post('/accept-justi',[StudentController::class, 'accept'])->name('justi.accept');
Route::get('/refuse-justi',[StudentController::class, 'refuse'])->name('justi.refuse');
Route::get('/admin/stud-page',[StudentController::class, 'studpage']);
Route::get('/add-student', [StudentController::class, 'regis']);
Route::post('/savestud',[StudentController::class,'save']);
Route::get('/admin/student-info',[StudentController::class, 'studinform'])->name('studinfo');
Route::get('/admin/student-list-absence', [StudentController::class, 'lisAbse'])->name('lisAbse');
Route::get('/teacher/choose-class',[StudentController::class, 'chooseCla']);
Route::post('/set-absence', [StudentController::class, 'selectCla']);
Route::post('/save-absence', [StudentController::class, 'setAbs']);
Route::get('/admin/search-class',[StudentController::class, 'seaClas']);
Route::post('/admin/show-class',[StudentController::class, 'shoClas']);
Route::get('/delete-absent',[StudentController::class,'removeAbsent'])->name('absent.remove');
Route::get('/show-absence',[StudentController::class, 'showT'])->name('students.abs');
Route::get('/valid-absence',[StudentController::class, 'aucunAbs'])->name('aucunAbs');
Route::get('/admin/contact-un-etudiant',[MainController::class,'showCon']);
Route::post('/send-message',[MainController::class, 'sendMes']);
Route::get('/student/inbox',[StudentController::class, 'inbox']);
Route::get('/admin/contact-one-etudiant',[MainController::class, 'showOne'])->name('contact-one-etudiant');
Route::get('teacher/login',[TeacherController::class,'log']);
Route::post('/checkteach',[TeacherController::class, 'check']);
Route::get('teacher/dashboard', [TeacherController::class, 'dashboard']);
Route::get('/logoutteach', [TeacherController::class, 'logout']);
Route::get('/teacher/profile',[TeacherController::class, 'profil']);
Route::get('teacher-mana', [TeacherController::class, 'info']);
Route::get('/add-teacher', [TeacherController::class, 'regis']);
Route::post('/saveteach',[TeacherController::class,'save']);
Route::get('/delete',[TeacherController::class,'remove'])->name('teacher.remove');
Route::get('/infoteach',[TeacherController::class, 'detail'])->name('teacher.detail');
Route::get('/admin/contact-un-prof',[MainController::class,'showConProf']);
Route::post('/send-message-prof',[MainController::class, 'sendMesProf']);
Route::get('/teacher/inbox',[TeacherController::class, 'inbox']);
Route::get('Admin/login',[AdministrationController::class,'log']);
Route::post('/checkadm',[AdministrationController::class, 'check']);
Route::get('/admin/dashboard',[AdministrationController::class, 'dashboard']);
Route::get('/logoutadm', [AdministrationController::class,'logout']);
Route::get('/admin/profile',[AdministrationController::class, 'profil']);
Route::get('/add-admin', [AdministrationController::class, 'regis']);
Route::post('/saveadmin', [AdministrationController::class, 'save']);
Route::get('/admin/notification',[AdministrationController::class, 'notif']);
Route::get('/error-404', function(){
    return view('error404');
});