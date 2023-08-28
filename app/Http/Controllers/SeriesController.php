<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DateTime;
use App\Models\Series;
use App\Models\Episode;

class SeriesController extends Controller
{
    public function __construct(){
        $this->middleware('auth.user');
    }
    //
    public function create(){
        return view('');
    }
    public function edit(){
        //Id from request
        //retrive object from elquent
        //pass the object to view
        //show db value in form
        return view('');      
    }
    public function editSubmit(){
        //do validations
        //retrive object from db using id
        //reinitiate db properties/columns with req values
        //object->save(); (no new series>series::where id = id from parameter)
    }

    public function delete(){
        //object->delete();
        //return view('series.delete');  
    }
    public function get(Request $req){
        
        //select * from series_info where id = $req->id
        $series = Series::where('id','=',decrypt($req->id))
        //middle parameter default '=' if not given
        ->select('id','name','type','genre','description','ep_count','poster','trailer')
        ->first();  //get() for multiple data.
        
        return view('series.get')
        ->with('series',$series); 
    }
    public function list(){
        
        $series = Series::all();
        return view('series.list')
        ->with('series',$series);
    }

    public function get_ep(Request $req){
        
        //select * from episode_info where id = $req->id
        $episode = Episode::where('id','=',decrypt($req->id))
        ->select('id','ep_no','name','summary','video','from_series')
        //->orderBy('name', 'desc')
        ->first();  //get() for multiple data.
        
        //return $episode;
        return view('episode.get')
        ->with('episode',$episode); 
    }

    function search(Request $req)
    {
        $data= Series::
        where('name','like', '%'. $req->input('query').'%')
        ->get();
        return view('series.search')
        ->with('data',$data); 
    }

    public function series_upload(){
        
        return view('series.series_upload');
    }

    public function exist_episode(){
        $data = Series::all();
        return view('series.exist_ep_upload')
        ->with('data',$data);
    }

    public function ep_upload(Request $req){
        $s=Series::where('name','=',$req->ser)
        ->first();

        $this->validate($req,[
                'epi_file'=>'required|mimes:mp4,ogx,oga,ogv,ogg,webm,3gp,mkv'
            ],
            [           
                'epi_file.required'=>'Plase provide Episode Please!'
            ]
        );
        
        
            $id = $s->id;
            $name = $s->name;

            $folder ="public/".$name."/episodes";
            $f_name = $req->epi_no.'.'.$req->file('epi_file')->getClientOriginalExtension();
            $name = $req->file('epi_file')->storeAs($folder,$f_name);
            $user = new Episode();
            $user->ep_no = $req->epi_no;
            $user->name = $req->epi_name;
            $user->summary = $req->epi_summary;
            $user->video = "storage/".$req->ser."/"."episodes/".$f_name;
            $user->from_series = $id;

            $user->save();
            return redirect()->route('series.list');
        
    }
    public function ser_upload(Request $req)
    {
        
        $this->validate($req,[
                'poster'=>'required|mimes:png,jpg,jpeg|max:2048'
            ],
            [           
                'poster.required'=>'Plase provide your profile picture'
            ]
        );
    
        $folder ="public/". $req->name ."/posters";
        $f_name = $req->name.'.'.$req->file('poster')->getClientOriginalExtension();
        $name = $req->file('poster')->storeAs($folder,$f_name);
        $user = new Series();
        $user->name = $req->name;
        $user->type = $req->type;
        $user->genre = $req->genre;
        $user->description =$req->description;
        $user->ep_count = $req->ep_count;
        $user->poster ="storage/".$req->name."/"."posters/".$f_name;
        $user->trailer = $req->trailer;
        $user->save();
        return redirect()->route('series.list');
    }

    public function s_upload(){
        return view('series.ser_upload');
    }
}
