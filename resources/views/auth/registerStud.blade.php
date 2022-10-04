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
        <!-- Item 2 -->
<div class="body1">
    <div class="maildet">
		<p><h3 ><font color="#1e81b0">Ajouter un Etudiant</font></h3></p><br>
        <form action="{{url('/savestud')}}" class="form-contact" method="POST" enctype="multipart/form-data">
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
                <input type="text" class="form-control" name="nomc" id="nomc" placeholder="Nom Complet..." value="{{old('nomc')}}" required>
                <span style="color:red">@error('nomc'){{ $message}} @enderror</span>
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="cne" id="cne" placeholder="CNE..." value="{{old('cne')}}" required>
                <span style="color:red">@error('cne'){{ $message}} @enderror</span>
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group">
                <select class="form-control" name="fill" id="fill" required>
                    <option value="">Filliere...</option>
                    <option value="DSI">DSI</option>
                    <option value="PME">PME</option>
                    <option value="PRO">PRO</option>
                    <option value="MA">MA</option>
                </select>
                <span style="color:red">@error('fill'){{ $message}} @enderror</span>
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group">
                <select class="form-control" name="niveau" id="niveau" required>
                    <option value="">Niveau...</option>
                    <option value="1">premiere annee</option>
                    <option value="2">Dexieme annee</option>
                </select>
                <span style="color:red">@error('niveau'){{ $message}} @enderror</span>
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group">
                <input type="file" class="form-control" name="image" id="image" value="" required>
                <span style="color:red">@error('image'){{ $message}} @enderror</span>
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" id="password" placeholder="Password..." required>
                <span style="color:red">@error('password'){{ $message}} @enderror</span>
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="confirmed" id="confirmed" placeholder="Confirm Password..." required>
                <span style="color:red">@error('confirmed'){{ $message }} @enderror</span>
                <div class="help-block with-errors"></div>
            </div><br>
            <div  class="text-right"><button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>  Ajouter</button></div>
        </form>	    
    </div>
</div>
<div style="text-align: right; margin-right:120px ;">
			<br><div  class="text-right" ><a href="{{url('/admin/stud-page')}}"><button class="btn btn-primary"><i class="fa fa-undo"></i>  retour</button></a></div>
		</div> 
</div>
</div>
<br><br><br>



@endsection