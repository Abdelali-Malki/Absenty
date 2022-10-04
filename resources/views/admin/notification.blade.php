@extends('layout')
@section('nav')
                            <li class="nav-item active">
			                    <a class="nav-link" href="{{url('/admin/profile')}}" ><font color="#1b9ad9"><i class="fa fa-university"></i> {{session('LoggedUAdm')}}</font></a>
			                </li>
							<li class="nav-item active">
			                    <a class="nav-link" href="{{url('/admin/dashboard')}}"><font color="#1b9ad9"><i class="fa fa-home"></i> Dashboard</font></a>
			                </li>
							<li class="nav-item">
			                    <a class="nav-link" href=""><font color="#1b9ad9"><i class="fa fa-bell" ></i> trinnnn</font></a>
			                </li>
							<li class="nav-item">
			                    <a class="nav-link" href="{{url('/logoutadm')}}"><font color="#1b9ad9"><i class="fa fa-sign-out"></i> se deconnecter</font></a>
			                </li>
@endsection
@section('content')
<br><br>
<table style="margin-left: 100px; width: 110%;">
	<tr>
		<th><h3><font color="#84b4c4"><i class="fa fa-bell"></i> Notifications :</font></h3><br><br></th>
		<th><a href="{{url('/admin/notification')}}"><button class="btn btn-primary" style="border-radius: 100px 100px;"><i class="fa fa-repeat"></i></button></a></th>
	</tr>
</table>
@if(count($absences)>0)
	
	@foreach($absences as $absence)
		<div class="alert alert-warning" style="margin-left: 200px; margin-right: 200px;">
			{{$absence->nomc}} étudiant de {{$absence->niveau}}-{{$absence->fill}} a passé le nombre autorisé des heures avec un total de ({{$absence->nbrhr}} heures) <div class="text-right"><a href="{{route('studinfo',$absence->idEtu)}}">v<i class="fa fa-eye"></i>ir profile</a></div>
		</div>
	@endforeach
@endif


@endsection
   