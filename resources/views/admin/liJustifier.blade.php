@extends('layout')
@section('nav')
							<li class="nav-item active">
			                    <a class="nav-link" href="{{url('/admin/profile')}}"><font color="#1b9ad9"><i class="fa fa-university"></i> {{session('LoggedUAdm')}}</font></a>
			                </li>
                            <li class="nav-item active">
			                    <a class="nav-link" href="{{url('/admin/dashboard')}}"><font color="#1b9ad9"><i class="fa fa-home"></i> Dashboard</font></a>
			                </li>
							<li class="nav-item">
			                    <a class="nav-link" href="{{url('/logoutadm')}}"><font color="#1b9ad9"><i class="fa fa-sign-out"></i> se deconnecter</font></a>
			                </li>
@endsection
@section('content')
<br><br>
<h3 style="margin-left: 100px;"><font color="green"><i class="fa fa-list"></i> Absences Justifiée :</font></h3><br>
<table  class="content-tab" style="width: 1050px; margin-left:100px;" >
						<thead><tr>
							<th>Image</th>
							<th>Nom</th>
							<th>CNE</th>
							<th>Fillier</th>
							<th>Niveau</th>
							<th>Séance</th>
							<th>Date</th>
							<th>Justifiée par</th>
						</tr></thead>
						@foreach($detail as $det)
						<tr>
							<th><img src="/images/{{$det->image}}" alt="student image" height="50px" width="40px"></th>
							<th>{{$det->nomc}}</th>
							<th>{{$det->cne}}</th>
							<th>{{$det->fill}}</th>
							<th>{{$det->niveau}}</th>
							<th>{{$det->seance}}</th>
							<th>{{date('d/m/Y', strtotime($det->created_at))}}</th>
							<th>{{$det->justifiePar}}</th>
							<th><a href="{{route('studinfo',$det->idEtu)}}">v<i class="fa fa-eye"></i>ir</a></th>
						</tr>
						@endforeach
		</table><br><br>
		<div style="text-align: right; margin-right:120px ;">
			<br><div  class="text-right" ><a href="{{url('/admin/stud-page')}}"><button class="btn btn-primary"><i class="fa fa-undo"></i>  retour</button></a></div>
		</div> <br><br>
@endsection