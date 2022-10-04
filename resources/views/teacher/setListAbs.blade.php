@extends('layout')
@section('nav')
							<li class="nav-item active">
			                    <a class="nav-link" href="{{url('/teacher/profile')}}"><font color="#1b9ad9"><i class="fa fa-user"></i> {{session('LoggedUTea')}}</font></a>
			                </li>
							<li class="nav-item active">
			                    <a class="nav-link" href="{{url('/teacher/dashboard')}}"><font color="#1b9ad9"><i class="fa fa-home"></i> Dashboard</font></a>
			                </li>
							<li class="nav-item">
			                    <a class="nav-link" href="{{url('/logoutteach')}}"><font color="#1b9ad9"><i class="fa fa-sign-out" aria-hidden="true"></i> se deconnecter</font></a>
			                </li>
@endsection
@section('content')
<br><br>
<h3 style="margin-left: 100px;"><font color="#1b9ad9"><i class="fa fa-list"></i> Liste d'etudiant :</font> {{$fill}} - {{$niveau}} </h3><br><br>
<div class="body1">
    <div class="maildet">
		<form action="{{url('/save-absence')}}" method="post" class="form-contact" name="frm">
				@csrf
				@if(Session::get('fail'))
                	<div class="alert alert-danger">{{Session::get('fail')}}</div>
           		@endif
				<div class="form-group" style="margin-left:100px;">
					<select name="seance" id="seance" class="form-control" required>
						<option value="">Selectionnez la seance</option>
						<option value="08:30 - 10:30">08:30 - 10:30</option>
						<option value="10:30 - 12:30">10:30 - 12:30</option>
						<option value="14:30 - 16:30">14:30 - 16:30</option>
						<option value="16:30 - 18:30">16:30 - 18:30</option>
					</select>
					<span style="color:red">@error('seance'){{ $message}} @enderror</span>
				</div>
					<table class="content-tab" style="width: 1000px; margin-left:100px;" >
						<thead><tr>
							<th>Image</th>
							<th>Nom</th>
							<th>CNE</th>
							<th>profile</th>
							<th>Absent</th>
						</tr></thead>
						@foreach($students as $student)
						<tr>
							<th><img src="/images/{{$student->image}}" alt="student image" height="40px" width="32px"></th>
							<th>{{$student->nomc}}</th>
							<th>{{$student->cne}}</th>
							<th><a href="{{route('studinfo',$student->id)}}">v<i class="fa fa-eye"></i>ir</a></th>
							<th>
								<input type="checkbox" name="abs[]" value="{{$student->id}}" class="form-control" id="abs" >
							</th>
						</tr>
						@endforeach
					</table>
					<br><br>
				<div class="text-right"><button type="submit" class="btn btn-primary">Inserer</button></div>
			
		</form>
	</div>
</div>

		
@endsection