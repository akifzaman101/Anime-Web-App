@extends('layouts.app')
@section('content')
<a class="btn btn-primary" href="{{route('ex_ep_upload')}}">Upload Existing Webseries Episodes</a>
<a class="btn btn-primary" href="{{route('series_upload')}}">Upload completely new Webseries </a>
@endsection