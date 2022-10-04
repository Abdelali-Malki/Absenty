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
<h3 style="margin-left: 100px;"><font color="#1b9ad9"><i class="fa fa-graduation-cap"></i> Etudiant : </font>{{$etudiant->nomc}},</h3><br><br>
<table style="margin-left : 100px; width:500px ;">
			<tr>
				<th><img src="/images/{{$etudiant->image}}" alt="mon image" height="350px" width="auto" style="border-radius: 50%;"></th>
				<th>
					<table>
						<tr>
							<th><br><font color="#1b9ad9">Nom : <br></th>
							<th><br>{{$etudiant->nomc}}<br></th>
						</tr>
						<tr>
							<th><br><font color="#1b9ad9">CNE : <br></th>
							<th><br>{{$etudiant->cne}}<br></th>
						</tr>
						<tr>
							<th><br><font color="#1b9ad9">Filliere : <br></th>
							<th><br>{{$etudiant->fill}}<br></th>
						</tr>
						<tr>
							<th><br><font color="#1b9ad9">Niveau : <br></th>
							<th><br>{{$etudiant->niveau}}<br></th>
						</tr>
						
					</table>
				</th>
				
			</tr>
		</table>
		
			<table style="margin-left: 60%; width: 500px;">
				<tr>
					<th><a href="{{route('lisAbse',$etudiant->id)}}"><button class="btn btn-primary">Liste des Absenses</button></a></th>
				@if(session()->has('LoggedUserAdm'))
					<th><a href="{{route('contact-one-etudiant',$etudiant->id)}}"><button class="btn btn-primary" ><i class="fa fa-commenting"></i> Contacter </button></a></th>
					<th>
						<a href="{{url('/admin/stud-page')}}"><button class="btn btn-primary"><i class="fa fa-undo"></i>  retour au choix</button></a>
					</th>
				
				@endif
				</tr>
			</table>
		
		
		
		

		
		
@endsection