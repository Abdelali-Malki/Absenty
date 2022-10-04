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
<br>
		<div style="margin-left : 100px;">
        <h2><font color="#1b9ad9"><i class="fa fa-commenting"></i>  Contacter un Professeur :</font> </h2>
		</div><br><br>
<div class="body1">
    <div class="maildet">
		<form action="{{url('/send-message-prof')}}" method="post" class="form-contact">
			@csrf
			@if(Session::get('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
            @endif
            @if(Session::get('fail'))
                <div class="alert alert-danger">
                    {{ Session::get('fail') }}
                </div>
            @endif
            <div class="form-group">
                <select name="id" id="id" class="form-control" required>
                    <option value="">Selectionner un Proffesseur</option>
                    @foreach($profs as $prof)
                    <option value="{{$prof->id}}">{{$prof->nomc}}</option>
                    @endforeach
                </select>
                <span style="color:red">@error('cne'){{ $message}} @enderror</span>
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group" style="margin-left: 20px;">
                <input type="checkbox" name="diff" id="diff" value="1" onclick="enable(this);"> diffusion <br>
            </div>
			<div class="form-group">
                <textarea name="message" id="message" class="form-control" placeholder="Message.." value="{{old('message')}}" rows="8" required></textarea> 
                <span style="color:red">@error('message'){{ $message}} @enderror</span>
                <div class="help-block with-errors"></div>
            </div>
			<div  class="text-right"><button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane"></i>  Envoyer</button></div>
		</form>
		<br><div  class="text-right"><a href="{{url('teacher-mana')}}"><button class="btn btn-primary"><i class="fa fa-paper-undo"></i>  retour</button></a></div>
	</div>
</div>
<script>
    function enable(chkdiff){
        var id=document.getElementById("id");
        id.disabled=chkdiff.checked ? true : false;
    }
</script>
		
@endsection