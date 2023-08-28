@extends('layouts.app')
@section('content')
            <p style="color: white; font-size: 25px"><b>Search Results</b></p>
            @foreach($data as $s)
            <div class="searched-s">
              <a href="{{route('series.details',['id'=>encrypt($s->id)])}}">
              <img class="trending-image" src="{{$s['gallery']}}">
                <div class="">
                    <h2><img src="{{$s->poster}}" width="230px" height="300px"></h2>
                    <h5 style="color: white; font-size: 20px">{{$s['name']}}</h5>
                </div>
                </a>
            </div>
            @endforeach

@endsection