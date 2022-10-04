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
<font color="#1b9ad9"><h3 style="margin-left: 100px;"> Choisissez une Action : </h3></font><br>
<div class="hv">
<table style="margin-left: 250px; width: 1100px; margin-top: 50px;">
	<tr>
		<th><a href="{{url('/admin/list-absence')}}"><button class="yuk"><i class="fa fa-spinner fa-spin fa fa-fw"></i> Absences non justifiee </button><br></a></th>
		<th><a href="{{url('/add-student')}}"><button class="yuk"><i class="fa fa-plus"></i> Ajouter un Etudiant </button><br></a></th>
	</tr>
	<tr>
		<th><a href="{{url('/admin/list-justifie')}}" id="hvg"><button class="yug"><i class="fa fa-check"></i> Absences  justifiee </h3></button><br></a></th>
		<th><a href="{{url('/admin/search-class')}}"><button class="yuk"><i class="fa fa-search"></i> Chercher une classe </button><br></a></th>
	</tr>
	<tr>
		<th><a href="{{url('/admin/list-refuse')}}" id="hvr"><button class="yur"><i class="fa fa-times"></i> Absences refusee </h3></button></a></th>
		<th><a href="{{url('/admin/contact-un-etudiant')}}"><button class="yuk"><i class="fa fa-commenting"></i> Contacter un Etudiant </button></a></th>
	</tr>
</table>
</div>







@endsection