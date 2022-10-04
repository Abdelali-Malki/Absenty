@extends('layout')
@section('nav')
							
							@if(session()->has('LoggedUserAdm'))
                            <li class="nav-item active">
			                    <a class="nav-link" href="{{url('/admin/profile')}}"><font color="#1b9ad9"><i class="fa fa-university"></i> {{session('LoggedUAdm')}}</font></a>
			                </li>
							@endif
							@if(session()->has('LoggedUserTea'))
							<li class="nav-item active">
			                    <a class="nav-link" href="{{url('/teacher/profile')}}"><font color="#1b9ad9"><i class="fa fa-user"></i> {{session('LoggedUTea')}}</font></a>
			                </li>
							@endif
                            @if(session()->has('LoggedUserAdm'))
                            <li class="nav-item active">
			                    <a class="nav-link" href="{{url('/admin/dashboard')}}"><font color="#1b9ad9"><i class="fa fa-home"></i> Dashboard</font></a>
			                </li>
							@endif
							@if(session()->has('LoggedUserTea'))
							<li class="nav-item active">
			                    <a class="nav-link" href="{{url('teacher/dashboard')}}"><font color="#1b9ad9"><i class="fa fa-home"></i> Dashboard</font></a>
			                </li>
							@endif
							<li class="nav-item">
			                    <a class="nav-link" href="{{url('/logoutadm')}}"><font color="#1b9ad9"><i class="fa fa-sign-out"></i> se deconnecter</font></a>
			                </li>
@endsection
@section('content')
<br>
<h3 style="margin-left: 100px;"><font color="#1b9ad9"><i class="fa fa-graduation-cap"></i> Liste d'Absence de:</font> {{$name->nomc}} ,</h3><br><br>
<table  class="content-tab" style="width: 1050px; margin-left:100px;" >
		<thead><tr>
			<th>Date</th>
			<th>Séance</th>
			<th>Justifier</th>
			<th>Justifiée par</th>
		</tr></thead>
		@foreach($absence as $det)
		<tr>
			<th>{{date('d/m/Y', strtotime($det->created_at))}}</th>
			<th>{{$det->seance}}</th>
			@if($det->justi ==-1)
				<th><font color="red"><i class="fa fa-times"> refusée</font></th>
				<th>{{$det->justifiePar}}</th>
			@elseif($det->justi==1)
				<th><font color="green"><i class="fa fa-check"> justifiée</font></th>
				<th>{{$det->justifiePar}}</th>
			@elseif($det->justi==0)
				@if(!empty($det->justification))
					<th><i class="fa fa-spinner"> en cours de justification</th>
					<th>---</th>
				@else
					<th><font color="blue"><i class="fa fa-minus"> non justifiée</th>
					<th>---</th>
				@endif
			@endif
			
		@endforeach
</table>
<br><br>
<div style="text-align: right; margin-right:20px ;">
	<a href="{{route('studinfo',$name->id)}}"><font color="#1b9ad9"><h5><i class="fa fa-undo" ></i> revenir au profile de {{$name->nomc}}</h5></font></a>
</div> <br><br>
@endsection