@extends('layout')
@section('nav')
                            <li class="nav-item active">
			                    <a class="nav-link" href="{{url('/teacher/profile')}}"><font color="#1b9ad9"><i class="fa fa-user"></i> {{session('LoggedUTea')}}</font></a>
			                </li>
                            <li class="nav-item active">
			                    <a class="nav-link" href="{{url('/teacher/dashboard')}}"><font color="#1b9ad9"><i class="fa fa-home"></i> Dashboard</font></a>
			                </li>
							<li class="nav-item">
			                    <a class="nav-link" href="{{url('/logoutadm')}}"><font color="#1b9ad9"><i class="fa fa-sign-out" aria-hidden="true"></i> se deconnecter</font></a>
			                </li>
@endsection
@section('content')
<br><br>
<h3 style="margin-left: 100px;"><font color="#1b9ad9"><i class="fa fa-list"></i> Les absences de</font> {{$date}} ( {{$seance}} ) </h3><br><br><br><br>
<center>
	<table class="content-table1" style="width: 900px;">
        <thead><tr>
            <th>Image</th>
			<th>Nom</th>
			<th>CNE</th>
			<th>profile</th>
            <th></th>
        </tr></thead>
        @foreach($absents as $det)
            <tr>
                <th><img src="/images/{{$det->image}}" alt="student image" height="40px" width="32px"></th>
                <th>{{$det->nomc}}</th>
                <th>{{$det->cne}}</th>
                <th><a href="{{route('studinfo',$det->idEtu)}}">v<i class="fa fa-eye"></i>ir</a></th>
                <th><a href="{{ route('absent.remove',$det->id)}}"><i class="fa fa-eraser"></i></a></th>
            </tr>
        @endforeach
    </table>		
    <br><br><br><br><div class="text-right" style="margin-right: 190px;"><a href="{{url('/teacher/dashboard')}}"><button type="submit" class="btn btn-primary">valider</button></a></div>
</center>

@endsection
   