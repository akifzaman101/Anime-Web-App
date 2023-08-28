@extends('layouts.app')
@section('content')
<center>  

        <table border="2" width="100%" class="table table-hover">
			<tr align="center">
				<td>
					<img src="{{asset($series->poster)}}" width="230px" height="300px">
				</td>
				<td>
		<table border="1" cellspacing="3" cellpadding="3" align="center">
			<tr align="center" height="60px">
				<td colspan="2"><h3>{{$series->name}}</h3></td>
			</tr>
			<tr align="center" height="40px">
				<td>Type : </td>
				<td> {{$series->type}}</td>
			</tr>
			<tr align="center" height="40px">
				<td>Genre : </td>
				<td> {{$series->genre}} </td>
			</tr>
			<tr align="center" height="40px">
				<td width="25%">Description : </td>
				<td>{{$series->description}}</td>
			</tr>
            <tr align="center" height="40px">
				<td width="25%">Episodes : </td>
				<td>{{$series->ep_count}}</td>
			</tr>
		</table>
		</td>
        <td>
        <center>Trailer
        <div  id="panel-9-11-0-0" class="so-panel widget widget_sow-editor panel-first-child" data-index="27" >              
            <iframe width="400" height="300" src="{{$series->trailer}}" frameborder="1" allow="autoplay; encrypted-media" allowfullscreen></iframe>
        </div>
        </center>
        </td>
		</tr>
        <!-- <tr><td colspan=3>
        <center>
        <div  id="panel-9-11-0-0" class="so-panel widget widget_sow-editor panel-first-child" data-index="27" >              
            <iframe width="100%" height="600" src="{{$series->trailer}}" frameborder="1" allow="autoplay; encrypted-media" allowfullscreen></iframe>
        </div>
        </center>
        </td></tr> -->
		</table>


@if(count($series->episodes)>0)
    <h2 style="color: white">Available Episodes</h2>
</div>
<table class="table table-bordered">
<tr>
    @foreach($series->episodes as $ep)
    
        <td class="episode-wrapper"><a href="{{route('episode.details',['id'=>encrypt($ep->id)])}}"><button class="btn btn-success">{{$ep->ep_no}}</button></a></td>
    
    @endforeach 
    </tr> 
</table>
@else
    <h2 style="color: white">No Episodes Available</h2>
@endif



<!-- <table class="table table-bordered">
@foreach($series->episodes as $ep)
    <tr>
        <th><a href="{{route('episode.details',['id'=>encrypt($ep->id)])}}">{{$ep->name}}</a></th>
    </tr>
@endforeach    
</table> -->




<!-- <h3 style="color: white">Episodes</h3>
<table class="table table-bordered">
    <tr>
        <th>Name</th>
        <th>Summary</th>
        <th>Video</th>
    </tr>

    @foreach($series->episodes as $ep)
    <tr>
        <th>{{$ep->name}}</th>
        <td>{{$ep->summary}}</td>
        <td>{{$ep->video}}</td>
    </tr>
    @endforeach
</table> -->

</center>
@endsection