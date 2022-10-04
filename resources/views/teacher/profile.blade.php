@extends('layout')
@section('nav')
                            
                            <li class="nav-item active">
			                    <a class="nav-link" href="{{url('teacher/dashboard')}}"><font color="#1b9ad9"><i class="fa fa-home"></i> Dashboard</font></a>
			                </li>
							<li class="nav-item">
			                    <a class="nav-link" href="{{url('/logoutadm')}}"><font color="#1b9ad9"><i class="fa fa-sign-out"></i> se deconnecter</font></a>
			                </li>
@endsection
@section('content')
		<div style="margin-left : 100px;">
        <h2><font color="#1b9ad9"><i class="fa fa-user"></i>  Professeur :</font> </h2>
		</div><br><br>
		<table style="margin-left : 100px; width:500px ;">
			<tr>
				<th><img src="/images/{{$detail->image}}" alt="admin image" height="300px" width="auto" style="border-radius: 50%;"></th>
				<th>
					<table>
						<tr>
							<th><br><font color="#1b9ad9">Nom : <br></th>
							<th><br>{{$detail->nomc}}<br></th>
						</tr>
						<tr>
							<th><br><font color="#1b9ad9">CIN : <br></th>
							<th><br>{{$detail->cin}}<br></th>
						</tr>
						<tr>
							<th><br><font color="#1b9ad9">User : <br></th>
							<th><br>{{$detail->user}}<br></th>
						</tr>
						<tr>
							<th><br><font color="#1b9ad9">Filliere : <br></th>
							<th><br>{{$detail->fill}}<br></th>
						</tr>
						
					</table>
				</th>
				
			</tr>
		</table><br><br>


@endsection