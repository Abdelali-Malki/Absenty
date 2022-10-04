@extends('layout')
@section('nav')
                            <li class="nav-item active">
			                    <a class="nav-link" href="{{url('/teacher/profile')}}"><font color="#1b9ad9"><i class="fa fa-user"></i> {{session('LoggedUTea')}}</font></a>
			                </li>
                            <li class="nav-item active">
			                    <a class="nav-link" href="{{url('/teacher/dashboard')}}"><font color="#1b9ad9"><i class="fa fa-home"></i> Dashboard</font></a>
			                </li>
							<li class="nav-item">
			                    <a class="nav-link" href="{{url('/logoutadm')}}"><font color="#1b9ad9"><i class="fa fa-sign-out"></i> se deconnecter</font></a>
			                </li>
@endsection
@section('content')
<br><br>
<h1 style="margin-left: 300px; margin-top: 10%;"><font color="#84b4c4"><i class="fa fa-exclamation-triangle"></i>  Aucune Absence </h1>

		<th><br><br><br><br><div class="text-right" style="margin-right: 190px;"><a href="{{url('/teacher/dashboard')}}"><button type="submit" class="btn btn-primary">valider</button></a></div></th>



	
@endsection
   