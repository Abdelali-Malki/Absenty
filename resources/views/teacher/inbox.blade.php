@extends('layout')
@section('nav')
							<li class="nav-item active">
			                    <a class="nav-link" href="{{url('/teacher/dashboard')}}"><font color="#1b9ad9"><i class="fa fa-home"></i> Dashboard</font></a>
			                </li>
							<li class="nav-item active">
			                    <a class="nav-link" href="{{url('/teacher/profile')}}"><font color="#1b9ad9"><i class="fa fa-user"></i> {{session('LoggedUTea')}}</font></a>
			                </li>
							<li class="nav-item">
			                    <a class="nav-link" href="{{url('/logoutteach')}}"><font color="#1b9ad9"><i class="fa fa-sign-out" aria-hidden="true"></i> se deconnecter</font></a>
			                </li>
@endsection
@section('content')
<br><br>
<table style="margin-left: 100px; width: 127%;">
	<tr>
		<th><h3><font color="#1b9ad9"><i class="fa fa-inbox"></i> boîte :</font></h3><br><br></th>
		<th><a href="{{url('/teacher/inbox')}}"><button class="btn btn-primary" style="border-radius: 100px 100px;"><i class="fa fa-repeat"></i></button></a></th>
	</tr>
</table>

@if(count($Nmessages)>0)
	<h3 style="margin-left: 200px; color:#84b4c4;">Nouveau Messages : </h3>
	@foreach($Nmessages as $message)
		<div class="alert alert-success" style="margin-left: 200px; margin-right: 200px;">
		<strong>{{ $message->nomc }} :</strong> {{ $message->message }}
		</div>
	@endforeach
@endif
@if(count($Omessages)>0)
	<h3 style="margin-left: 200px; color:#84b4c4;">Ancien Messages :</h3>
	@foreach($Omessages as $message)
		<div class="alert alert-warning" style="margin-left: 200px; margin-right: 200px;">
		<strong>{{ $message->nomc }} :</strong> {{ $message->message }}
		</div>
	@endforeach
@endif

@endsection
   