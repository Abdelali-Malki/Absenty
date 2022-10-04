@extends('layout')
@section('nav')
                            <li class="nav-item active">
			                    <a class="nav-link" href="{{url('/admin/profile')}}"><font color="#1b9ad9"><i class="fa fa-university"></i> {{$loggedUserInfo->user}}</font></a>
			                </li>
							
							@if(count($absences)>0)
							<li class="nav-item">
			                    <a class="nav-link" href="{{url('/admin/notification')}}"><font color="red">{{count($absences)}} <i class="fa fa-bell"></i> trinnnn</font></a>
			                </li>
							@else
							<li class="nav-item active">
			                    <a class="nav-link" href="{{url('/admin/notification')}}"><font color="#1b9ad9"><i class="fa fa-bell"></i> trinnnn</font></a>
			                </li>
							@endif
							<li class="nav-item">
			                    <a class="nav-link" href="{{url('/logoutadm')}}"><font color="#1b9ad9"><i class="fa fa-sign-out" ></i> se deconnecter</font></a>
			                </li>
@endsection
@section('content')
<br><br>
<h3 style="margin-left: 100px;"><font color="#1b9ad9"><i class="fa fa-home"></i> Dashboard : </font>Bonjour {{$loggedUserInfo->nomc}},</h3><br><br><br><br>


	<center>
	
		<table style="text-align: center;">
			<tr>
				<th><a href="{{url('teacher-mana')}}"><img src="/images/teacher.jpg" height="200px" width="auto" style="border-radius: 20%;"></a></th>
				<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
				<th><a href="{{url('/admin/stud-page')}}"><img src="/images/student.jpg" height="200px" width="auto" style="border-radius: 20%;"></a></th>
			</tr>
			<tr>
				<th><br><a href="{{url('teacher-mana')}}"><font color="#1b9ad9"><h3> Gerer les Professeurs</h3></font></a></th>
				<th></th>
				<th><br><a href="{{url('/admin/stud-page')}}"><font color="#1b9ad9"><h3>Gerer les Etudiants</h3></font></a></th>
			</tr>
		</table>
	</center>

@endsection
   