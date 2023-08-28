@extends('layouts.app')
@section('content')
<center>

<div class="">
    
        <fieldset>
        <legend><h2 style="color: black"><b>Episode Details :</b></h2></legend>
                <table class="table table-borderd">
                <tr>
                    <td><label style="color: black">NAME</label></td>
                    <td><label style="color: black"> : </label></td>
                    <td><label style="color: black">{{$episode->name}}</label></td>
                </tr>

                <tr><td colspan=3>
                <center>
                <!-- <div  id="panel-9-11-0-0" class="so-panel widget widget_sow-editor panel-first-child" data-index="27" >          
                    <iframe width="88%" height="595" src="{{$episode->video}}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                </div> -->
                <video width="900px" controls>
                    <source src="{{URL::asset($episode->video)}}" type="video/mp4" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen>
                    Your browser does not support the video tag.
                </video>
                </center>
                </td></tr>
                <!-- <tr>
                    <td><label style="color: black">ID</label></td>
                    <td><label style="color: black"> : </label></td>
                    <td><label style="color: black">{{$episode->id}}</label><td>
                </tr> -->
                
                <tr>
                    <td><label style="color: black">SUMMARY</label></td>
                    <td><label style="color: black"> : </label></td>
                    <td><label style="color: black">{{$episode->summary}}</label></td>
                </tr> 
                
                </table>
            </fieldset>

</div>

</center>
@endsection