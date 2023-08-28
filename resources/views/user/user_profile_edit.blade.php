@extends('layouts.app')
@section('content')
<div class="container custom-login">
    <h2 style="color: white">Update User {{$e->fname}}{{" "}}{{$e->lname}}</h2>
    <form action="{{route('user.update')}}" method="POST">
        {{@csrf_field()}} 
        <table class="">
        <tr><td><br></td></tr>
        <tr>
        <td style="color: white" width= "150px"><b>First Name: </b></td>
        <td><input type="text" name="fname" value="{{$e->fname}}"></td>
        </tr>
        <tr><td><br></td></tr>
        <tr>
        <td style="color: white" width= "150px"><b>Last Name: </b></td>
        <td><input type="text" name="lname" value="{{$e->lname}}"></td>
        </tr>
        <tr><td><br></td></tr>
        <tr>
        <td style="color: white" width= "150px"><b>User Name: </b></td>
        <td><input type="text" name="uname" value="{{$e->uname}}"></td>
        </tr>
        <tr><td><br></td></tr>
        <tr>
        <td style="color: white" width= "150px"><b>Email: </b></td>
        <td><input type="email" name="email" value="{{$e->email}}"></td>
        </tr>
        <tr><td><br></td></tr>
        <tr>
        <td style="color: white" width= "150px"><b>Date of Birth: </b></td>
        <td><input type="date" name="dob" value="{{$e->dob}}"></td>
        </tr>
        <tr><td><br></td></tr>
        <tr>
        <td style="color: white" width= "150px"><b>Status: </b></td>
        <td><input type="text" name="status" value="{{$e->status}}"></td>
        </tr>
        <tr><td><br></td></tr>

        <tr>
        <td colspan=2><input type="hidden" name="id" value="{{$e->id}}">
        <center><button type="Submit" class="btn btn-success">Update</button></center></td>
        </tr>
        </table>
    </form>
</div>
@endsection