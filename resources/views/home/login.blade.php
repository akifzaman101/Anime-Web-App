@extends('layouts.app')
@section('content')
	<title> Login Page</title>
    <b style="color: red">{{Session::get('msg')}}</b>
<div class="container custom-login">
    <div class="row">
        <div class="col-sm-4 col-sm-offset-4">
        <fieldset>
        <legend><b style="color: black">LOGIN</b></legend>
            <form action="{{route('login.submit')}}" method="post" >
                <div class="form-group">
                    @csrf
                <label for="exampleInputEmail1" style="color: black">User Name</label>
                <input type="text" name="uname" class="form-control" id="exampleInputName1" placeholder="User Name" value="{{old('uname')}}">
                    @error('uname')
					<span style="color: red">{{$message}}</span>
					@enderror
                </div>
                <div class="form-group">
                <label for="exampleInputPassword1" style="color: black">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    @error('password')
                    <span style="color: red">{{$message}}</span>
                    @enderror
                </div>
                <br>
                <center><button type="submit" class="btn btn-success btn-lg">Login</button></center>
            </form>
            </fieldset>
        </div>
    </div>
</div>

@endsection
