@extends('layout')
@section('nav')
							<li class="nav-item active">
			                    <a class="nav-link" href="{{url('/teacher/profile')}}"><font color="#1b9ad9"><i class="fa fa-user"></i> {{session('LoggedUTea')}}</font></a>
			                </li>
							<li class="nav-item active">
			                    <a class="nav-link" href="{{url('/teacher/dashboard')}}"><font color="#1b9ad9"><i class="fa fa-home"></i> Dashboard</font></a>
			                </li>
							<li class="nav-item">
			                    <a class="nav-link" href="{{url('/logoutteach')}}"><font color="#1b9ad9"><i class="fa fa-sign-out" aria-hidden="true"></i> se deconnecter</font></a>
			                </li>
@endsection
@section('content')
<br><br>
<h3 style="margin-left: 100px;"><font color="#1b9ad9"><i class="fa fa-list"></i> Les derniers Absents </font></h3><br><br>

					<table class="content-tab" style="width: 1050px; margin-left:100px;">
						<thead><tr>
							<th>Nom</th>
							<th>Cne</th>
							<th>seance</th>
							<th>date</th>
							<th>justifie</th>
						</tr></thead>
						@foreach($detail as $det)
						<tr>
							<th>{{$det->nomc}}</th>
							<th>{{$det->cne}}</th>
							<th>{{$det->seance}}</th>
							<th>{{date('d-m-Y', strtotime($det->created_at))}}</th>
							@if($det->justi ==-1)
								<th><font color="red"><i class="fa fa-times"> refusee</font></th>
							@elseif($det->justi==1)
								<th><font color="green"><i class="fa fa-check"> justifiee</font></th>
							@elseif($det->justi==0)
								@if(!empty($det->justification))
									<th><i class="fa fa-spinner"> en cours</th>
								@else
									<th><font color="blue"><i class="fa fa-minus"> non justifiee</th>
								@endif
							@endif
						</tr>
						@endforeach
					</table>
				</th>
				
			</tr>
		</table><br><br>
		
@endsection