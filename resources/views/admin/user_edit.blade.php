@extends('layouts.app')
@section('content')
<div class="container custom-login">
    <h1>Update User {{$e->fname}}{{" "}}{{$e->lname}}</h1>
    <form action="{{route('user_update')}}" method="POST">
        {{@csrf_field()}} 
        <input type="hidden" name="id" value="{{$e->id}}">
        <input type="text" name="fname" value="{{$e->fname}}"><br>
        <input type="text" name="lname" value="{{$e->lname}}"><br>
        <input type="text" name="uname" value="{{$e->uname}}"><br>
        <input type="email" name="email" value="{{$e->email}}"><br>
        <input type="date" name="dob" value="{{$e->dob}}"><br>
        <input type="text" name="status" value="{{$e->status}}"><br>
        <button type="Submit">Update</button>

    </form>
</div>
@endsection
