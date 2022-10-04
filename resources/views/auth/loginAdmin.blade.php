@extends('layout')
@section('nav')
                            <li class="nav-item active">
			                    <a class="nav-link" ><font color="#1b9ad9"><i class="fa fa-university"></i> espace Administration</font></a>
			                </li>
							
@endsection
@section('content')
<div class="content-wrap pb-0">
	<div class="container">
        <h2 class="section-heading no-after mb-5"><i class="fa fa-university"> </i> Se Connecter</h2>
        <form action="{{url('/checkadm')}}" class="form-contact" method="POST">
            @csrf
            @if(Session::get('fail'))
                <div class="alert alert-danger">{{Session::get('fail')}}</div>
            @endif

            <div class="form-group">
                <input type="text" class="form-control" name="user" id="user" placeholder="Username..." value="{{old('user')}}" required>
                <span style="color:red">@error('user'){{$message}}@enderror</span>
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" id="password" placeholder="Password..." required>
                <span style="color:red">@error('password'){{$message}}@enderror</span>
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group">
                <div id="success"></div>
                <button type="submit" class="btn btn-primary">se connecter</button>
            </div>
                        
        </form>
    </div>
</div>
@endsection