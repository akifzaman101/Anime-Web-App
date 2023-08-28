<?php

namespace App\Http\Controllers;
use App\Models\AllUser;
use Session;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct(){
        $this->middleware('auth.user');
    }
    public function all_users()
    {
        $all_user = AllUser::all();
        return view('admin.viewallusers')
        ->with('all_user',$all_user);
        
    }
    public function all_users2()
    {
        // $all_user = AllUser::all();

        // if(Session::get('user')['id'] != $all_user->id)
        // {
        //     return redirect()->route('login');
        // }
        // else{
        //     return view('admin.viewallusers')
        //     ->with('all_user',$all_user);
        // }
    }
    public function user_details(Request $req)
    {
        $u = AllUser::where('id','=',decrypt($req->id))
        ->first();
        return view('admin.user_details')
        ->with('u',$u);
    }
    public function user_delete(Request $req)
    {
         $delete = AllUser::where('id',decrypt($req->id))
         ->first();
         $delete->delete();
         if(Session::get('user')['id'] == $delete->id)
        {
            session()->flush();
            return redirect()->route('login');
        }
        else{
            return redirect()->route('all_users'); 
        }
        
    }

    public function user_edit(Request $req)
    {
        $e = AllUser::where('id',decrypt($req->id))
        ->first();
        return view('admin.user_edit')
        ->with('e',$e);
    }
    public function user_update(Request $req)
    {
        $data = AllUser::where('id',$req->id)
        ->first();
        $data->fname = $req->fname;
        $data->lname = $req->lname;
        $data->uname = $req->uname;
        $data->email = $req->email;
        $data->dob = $req->dob;
        $data->status = $req->status;
        $data->save();
        return redirect()->route('user_details',['id'=>encrypt($req->id)]);
    }

    //
}
