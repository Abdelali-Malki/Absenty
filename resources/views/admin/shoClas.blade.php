@extends('layout')
@section('nav')
							<li class="nav-item active">
			                    <a class="nav-link" href="{{url('/admin/profile')}}"><font color="#1b9ad9"><i class="fa fa-university"></i> {{session('LoggedUAdm')}}</font></a>
			                </li>
							<li class="nav-item active">
			                    <a class="nav-link" href="{{url('/admin/dashboard')}}"><font color="#1b9ad9"><i class="fa fa-home"></i> Dashboard</font></a>
			                </li>
							<li class="nav-item">
			                    <a class="nav-link" href="{{url('/logoutadm')}}"><font color="#1b9ad9"><i class="fa fa-sign-out" aria-hidden="true"></i> se deconnecter</font></a>
			                </li>
@endsection
@section('content')
<br><br>
<h3 style="margin-left: 100px;"><font color="#1b9ad9"><i class="fa fa-list"></i> Liste d'étudiants :</font> {{$niveau}}-{{$fill}}  </h3><br><br>
<div class="body1">
    <div class="maildet">
		
					<table class="content-tab" style="width: 1000px; margin-left:100px;" >
						<thead><tr>
							<th>Image</th>
							<th>Nom</th>
							<th>CNE</th>
							<th>profile</th>
						</tr></thead>
						@foreach($students as $student)
						<tr>
							<th><img src="/images/{{$student->image}}" alt="student image" height="40px" width="30px"></th>
							<th>{{$student->nomc}}</th>
							<th>{{$student->cne}}</th>
							<th><a href="{{route('studinfo',$student->id)}}">v<i class="fa fa-eye"></i>ir</a></th>
						</tr>
						@endforeach
					</table>
					<br><br>
				<div class="text-right"><a href="{{url('/admin/search-class')}}"><button class="btn btn-primary"><i class="fa fa-undo"></i> retour</button></a></div>
	</div>
</div>
					
		
@endsection