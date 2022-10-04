@extends('layoutDash')
@section('nav')
                            <li class="nav-item active">
			                    <a class="nav-link" ><font color="#1b9ad9"><i class="fa fa-graduation-cap"></i> {{session('LoggedUStud')}}</font></a>
			                </li>
							@if(count($messages)>0)
							<li class="nav-item">
			                    <a class="nav-link" href="/student/inbox"><font color="red"><i class="fa fa-inbox" ></i> boîte <font size=1.5>({{count($messages)}})</font></font></a>
			                </li>
							@else
							<li class="nav-item">
			                    <a class="nav-link" href="/student/inbox"><font color="#1b9ad9"><i class="fa fa-inbox" ></i> boîte</font></a>
			                </li>
							@endif
							<li class="nav-item">
			                    <a class="nav-link" href="{{url('/logoutstud')}}"><font color="#1b9ad9"><i class="fa fa-sign-out"></i> se deconnecter</font></a>
			                </li>
@endsection
@section('content')
<br><br>

<h3 style="margin-left: 100px;"><font color="#1b9ad9"><i class="fa fa-graduation-cap"></i> Etudiant : </font>{{$loggedUserInfo->nomc}},</h3><br><br>
<table style="margin-left : 100px; width:500px ;">
			<tr>
				<th><img src="/images/{{$loggedUserInfo->image}}" alt="mon image" height="300px" width="auto" style="border-radius: 50%;"></th>
				<th>
					<table>
						<tr>
							<th><br><font color="#1b9ad9">Nom : <br></th>
							<th><br>{{$loggedUserInfo->nomc}}<br></th>
						</tr>
						<tr>
							<th><br><font color="#1b9ad9">CNE : <br></th>
							<th><br>{{$loggedUserInfo->cne}}<br></th>
						</tr>
						<tr>
							<th><br><font color="#1b9ad9">Filliere : <br></th>
							<th><br>{{$loggedUserInfo->fill}}<br></th>
						</tr>
						<tr>
							<th><br><font color="#1b9ad9">Niveau : <br></th>
							<th><br>{{$loggedUserInfo->niveau}}<br></th>
						</tr>
						
					</table>
					
				</th>
				
			</tr>
		</table>
<div class="text-right" style="margin-right: 40px;"><a href="{{url('/student/mes-absences')}}"><button class="btn btn-primary">Afficher mes Absenses</button></a></div>

@endsection
   