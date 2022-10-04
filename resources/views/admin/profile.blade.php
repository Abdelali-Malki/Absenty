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
		<div style="margin-left : 100px;">
        <h2><font color="#1b9ad9"><i class="fa fa-university"></i>  Admin :</font> </h2>
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
						
					</table>
				</th>
				
			</tr>
		</table><br>
	
		<div style="text-align: right; margin-right:120px ;">
			<br><div  class="text-right" ><a href="{{url('/add-admin')}}"><button class="btn btn-primary"><i class="fa fa-paper-plus"></i>  Ajouter un Admin</button></a></div>
		</div> 


@endsection