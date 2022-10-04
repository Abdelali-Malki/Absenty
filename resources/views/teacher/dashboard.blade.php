@extends('layoutDash')
@section('nav')
                            <li class="nav-item active">
			                    <a class="nav-link" href="{{url('/teacher/profile')}}"><font color="#1b9ad9"><i class="fa fa-user"></i> {{session('LoggedUTea')}}</font></a>
			                </li>
							@if(count($messages)>0)
							<li class="nav-item">
			                    <a class="nav-link" href="/teacher/inbox"><font color="red"><i class="fa fa-inbox" ></i> boîte <font size=1.5>({{count($messages)}})</font></font></a>
			                </li>
							@else
							<li class="nav-item">
			                    <a class="nav-link" href="/teacher/inbox"><font color="#1b9ad9"><i class="fa fa-inbox" ></i> boîte</font></a>
			                </li>
							@endif
							<li class="nav-item">
			                    <a class="nav-link" href="{{url('/logoutteach')}}"><font color="#1b9ad9"><i class="fa fa-sign-out" aria-hidden="true"></i> se deconnecter</font></a>
			                </li>
@endsection
@section('content')
<br><br>
<h3 style="margin-left: 100px;"><font color="#1b9ad9"><i class="fa fa-home"></i> Dashboard : </font>Bonjour {{$loggedUserInfo->nomc}},</h3><br><br><br><br>


<div style="margin-left: 100px;">
	<table style="width: 1300px;">
			<tr><a href="{{url('/teacher/last-absence')}}"><button class="yup">Afficher les derniers absents</button></a><br><br></tr>

			<tr><a href="{{url('/teacher/choose-class')}}"><button class="yup">Enregister l'absence</button></a></tr>
		
	</table>
</div>
@endsection