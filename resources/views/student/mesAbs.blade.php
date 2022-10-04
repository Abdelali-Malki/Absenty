@extends('layout')
@section('nav')
							<li class="nav-item active">
			                    <a class="nav-link" href="{{url('/student/dashboard')}}"><font color="#1b9ad9"><i class="fa fa-home"></i> Dashboard</font></a>
			                </li>
                            <li class="nav-item active">
			                    <a class="nav-link" ><font color="#1b9ad9"><i class="fa fa-user"></i> {{session('LoggedUStud')}}</font></a>
			                </li>
							<li class="nav-item">
			                    <a class="nav-link" href="{{url('/logoutstud')}}"><font color="#1b9ad9"><i class="fa fa-sign-out" aria-hidden="true"></i> se deconnecter</font></a>
			                </li>
@endsection
@section('content')
<br><br>
<h3 style="margin-left: 100px;"><font color="#1b9ad9"><i class="fa fa-list"></i> Mes Absence :</font></h3><br>
					
					@if(count($nbrhr)*2 >$max=12)
						<div class="alert alert-danger" style="margin-left:100px; margin-right:100px;">vous avez passeé le nombre autorisé des Absences </div> 
					@elseif(count($nbrhr)*2 ==$max)
						<div class="alert alert-danger" style="margin-left:100px; margin-right:100px;">vous avez atteigné le nombre autorisé d'absence </div> 
					@else
						<div class="alert alert-warning" style="margin-left:100px; margin-right:100px;">il vous reste {{$max-count($nbrhr)*2}} heures pour atteindre le nombre autorisé d'absence </div> 
					@endif
					<table  class="content-tab" style="width: 1050px; margin-left:100px;" >
						<thead><tr>
							<th>Date</th>
							<th>Seance</th>
							<th>Justifier</th>
						</tr></thead>
						@foreach($detail as $det)
						<tr>
							<th>{{date('d/m/Y', strtotime($det->created_at))}}</th>
							<th>{{$det->seance}}</th>
							@if($det->justi==-1)
								<th><font color="red"><i class="fa fa-times"> refusée</font></th>
							@endif
							@if($det->justi==0)
								@if(!empty($det->justification))
									<th><i class="fa fa-spinner"> En cours de traitement</th>
								@else
									<th>
										<form action="{{route('justify',$det->id)}}" method="POST" enctype="multipart/form-data">
											@csrf
											<table >
												<tr>
													<th><button type="submit">justifier</button></th>
													<th><input type="file" name="justification" required></th>
													<th><span style="color:red">@error('justification'){{ $message}} @enderror</span></th>
												</tr>
											</table>
										</form>
									</th>
								@endif
							@elseif($det->justi==1)
								<th><font color="green"><i class="fa fa-check"> Justifiée</font></th>
							@endif
						</tr>
						@endforeach
					</table>
@endsection