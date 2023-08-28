@extends('layouts.app')
@section('content')
    <table class="table table-bordered">
        <tr>
            <th>UserName</th>
            <th>Email</th>
            <th>Date of Birth</th>
            <th>UserType</th>
            @foreach($all_user as $a)
                <tr>
                    <td><a href="{{route('user_details',['id'=>encrypt($a->id)])}}">{{$a->uname}}</a></td>
                    <td>{{$a->email}}</td>
                    <td>{{$a->dob}}</td>
                    <td>{{$a->status}}</td>
                </tr>
            @endforeach
        </tr>
    </table>
@endsection