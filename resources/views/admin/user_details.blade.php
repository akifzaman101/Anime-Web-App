@extends('layouts.app')
@section('content')
    <table class="table table-bordered">
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>UserName</th>
            <th>Email</th>
            <th>Date of Birth</th>
            <th>UserType</th>

          
            <tr>
                <td>{{$u->fname}}</td>
                <td>{{$u->lname}}</td>
                <td>{{$u->uname}}</td>
                <td>{{$u->email}}</td>
                <td>{{$u->dob}}</td>
                <td>{{$u->status}}</td>
            </tr>
        </tr>
    </table>

    <a class="btn btn-primary" href="{{route('user_edit',['id'=>encrypt($u->id)])}}">Modify</a>
    <a class="btn btn-danger" href="{{route('user_delete',['id'=>encrypt($u->id)])}}">Delete</a>

@endsection