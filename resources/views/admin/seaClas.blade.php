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
<h3 style="margin-left: 100px;"><font color="#1b9ad9"><i class="fa fa-cogs"></i> Chercher la classe </font></h3><br><br>
<div class="body1">
    <div class="maildet">
		<form action="{{url('/admin/show-class')}}" method="post" class="form-contact">
				@csrf
					<div class="form-group">
						<select name="fill" id="fill" class="form-control" required>
							<option value="">Select Fillière</option>
							<option value="DSI">DSI</option>
							<option value="PME">PME</option>
							<option value="PRO">PRO</option>
							<option value="MA">MA</option>
						</select>
						<span style="color:red">@error('fill'){{ $message}} @enderror</span>
					</div>
					<div class="form-group">
						<select name="niveau" id="niveau" class="form-control" required>
							<option value="">Select Niveau</option>
							<option value="1">Première Année</option>
							<option value="2">Deuxième Année</option>
						</select>
						<span style="color:red">@error('niveau'){{ $message}} @enderror</span>
					</div>
				<div class="text-right"><button type="submit" class="btn btn-primary">Selectionner</button></div><br><br>
				
		</form>
		<div class="text-right"><a href="{{url('/admin/stud-page')}}"><button class="btn btn-primary"><i class="fa fa-undo"></i> retour</button></a></div>
		
	</div>
</div>
					
		
@endsection