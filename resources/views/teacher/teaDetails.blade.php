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
<h3 style="margin-left: 100px;"><font color="#1b9ad9"><i class="fa fa-user"></i> Détails des professeurs : </font></h3><br><br><br><br>
<center>
	<table class="content-table1" style="width: 900px;">
        <thead><tr>
            <th>Nom Complet</th>
            <th>CIN</th>
			<th>Username</th>
            <th>Filliere</th>
            <th>profile</th>
            <th>supp</th>
        </tr></thead>
        @foreach($details as $det)
            <tr>
                <th>{{$det->nomc}}</th>
                <th>{{$det->cin}}</th>
                <th>{{$det->user}}</th>
				<th>{{$det->fill}}</th>
                <th><a href="{{ route('teacher.detail',$det->id)}}">v<i class="fa fa-eye"></i>ir</a></th>
                <th><a href="{{ route('teacher.remove',$det->id)}}"><i class="fa fa-eraser"></i></a></th>
            </tr>
        @endforeach
    </table>		
    <br><br><br><br><div class="text-right" style="margin-right: 190px;"><a href="{{url('/add-teacher')}}"><button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Ajouter</button></a></div>
    <br><div class="text-right" style="margin-right: 190px;"><a href="{{url('/admin/contact-un-prof')}}"><button type="submit" class="btn btn-primary" ><i class="fa fa-commenting"></i> Contacter un professeur</button></a></div>
</center>

@endsection
   