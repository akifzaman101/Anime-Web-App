@extends('layouts.app')
@section('content')
<h4 style="color: lime">{{Session::get('msg')}}</h4>

    
    

<div class="custom-product">
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
          <li data-target="#myCarousel" data-slide-to="3"></li>
        </ol>

        <!-- Wrapper for slides -->
            <div class="carousel-inner">
              @foreach ($series as $s)
                      <div class="item {{$s['id']==1?'active':''}}">
                        <a href="{{route('series.details',['id'=>encrypt($s->id)])}}">
                        <img class="slider-img" src="{{$s['poster']}}">
                                  <div class="carousel-caption slider-text">
                                    <h4>{{$s['name']}}</h4>
                                    <p>{{$s['type']}}</p>
                                    <p>{{$s['genre']}}</p>
                                  </div>
                        </a>
                      </div>
              @endforeach
            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
              <span class="glyphicon glyphicon-chevron-left"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
              <span class="glyphicon glyphicon-chevron-right"></span>
              <span class="sr-only">Next</span>
            </a>
  </div>   
                  <div class="trending-wrapper">
                    <h3>Trending Series</h3>
                      @foreach($series as $s)
                              <div class="trending-series">
                                  <a href="{{route('series.details',['id'=>encrypt($s->id)])}}">
                                  <img class="trending-image" src="{{asset($s->poster)}}">
                              <div>
                    <h3 class="trending-text">{{$s['name']}}</h3>
                  </div>
                        </a>
            </div>
                 @endforeach
        </div>
        </div>
        </div>   
</div>

@endsection

