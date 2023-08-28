<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\AllUser;


class UserController extends Controller
{
    //
    
    public function aboutus(){
        return view('home.aboutus');
    }
    public function contactus(){
        return view('home.contactus');
    }
    public function login(){
        return view('home.login');
    }
    public function registration(){
        return view('home.registration');
    }
    public function registrationsubmit(Request $req){
    //$req->file('pro_pic/name')->getClientOriginalName();
    $this->validate($req,[
            'fname'=>'required|min:3|max:25|regex:/^[A-Z a-z 0-9.]+$/',
            'lname'=>'required|min:3|max:25|regex:/^[A-Z a-z 0-9.]+$/',
            'uname'=>'required|min:3|max:25|regex:/^[A-Z a-z 0-9.]+$/',
            'password'=>'required',
            'conf_password'=>'required|same:password',
            'email'=>'required|email',
            'dob'=>'required|date|before:2004-01-01',
            'pro_pic'=>'required|mimes:png,jpg,jpeg|max:2048'
        ],
        [
            'fname.required'=>' Please provide a First Name',
            'fname.min'=>' First Name Should be at least 3 characters',
            'fname.max'=>' First Name Should not contain more than 25 characters',
            'lname.required'=>' Please provide a Last name',
            'lname.min'=>' Last Name Should be at least 3 characters',
            'lname.max'=>' Last Name Should not contain more than 25 characters',
            'uname.required'=>' Please provide a Username',
            'uname.min'=>' Username Should be at least 3 characters',
            'uname.max'=>' Username Should not contain more than 25 characters',
            'password.required'=>' Please provide a Password',
            'conf_password.required'=>' Please provide the password again',
            'email.required'=>' Please provide an Email',
            'dob.required'=>' Please provide a date of birth',
            'dob.before'=>' The dob must be a date before 2004-01-01(18 Years or older)',
            'pro_pic.required'=>'Plase provide your profile picture'
        ]
    );
        //end of validation
        
        $folder = "public/"."profile_images";
        $f_name = $req->uname.'.'.$req->file('pro_pic')->getClientOriginalExtension();
        $name = $req->file('pro_pic')->storeAs($folder,$f_name);
        
        $user = new AllUser();
        $user->fname = $req->fname;
        $user->lname = $req->lname;
        $user->uname = $req->uname;
        $user->password = md5($req->password);
        $user->email = $req->email;
        $user->dob = $req->dob;
        $user->status = $req->status;
        $user->pro_pic = "storage/profile_images/".$f_name;
        $user->save();

        // return "<h2><center>
        //         Submitted with <br>
        //         Name: $req->uname <br>
        //         Password: $req->password <br>
        //         Email: $req->email <br>
        //         DOB: $req->dob
        //         </center></h2>";
        return redirect()->route('login');
    }

    public function loginsubmit(Request $req){
        $this->validate($req,[
                'uname'=>'required|min:3|max:25|regex:/^[A-Z a-z 0-9.]+$/',
                'password'=>'required'
            ],
            [
                'uname.required'=>'Please provide a Username',
                'uname.min'=>'Username Should be at least 3 characters',
                'uname.max'=>'Username Should not contain more than 25 characters',
                'password.required'=>'Please provide a Password'
            ]
        );
            //end of validation
            $user = AllUser::where('uname',$req->uname)
            ->where('password',md5($req->password))
            ->first();
            $msg="";
            if($user){
                $req->session()->flash('msg','User Exists & Logged in');
                if($user->status == "Admin")
                {
                    $req->session()->put('user',$user);
                    return redirect()->route('series.list');
                }
                else if($user->status == "Regular"){
                    $req->session()->put('user',$user);
                    return redirect()->route('series.list');    
                }
                else{
                    $req->session()->flash('msg','User-Name & Password Does Not Match');
                    return redirect()->route('login');
                }
                
            }
            else{
                $req->session()->flash('msg','User-Name & Password Does Not Match');
                return redirect()->route('login');
            }
            
    }

    public function logout(){
        session()->flush();
        return redirect()->route('login');
    }

    public function get(Request $req){
        
        //select * from user_info where id = $req->id
        $user = AllUser::where('id','=',decrypt($req->id))
        //middle parameter default '=' if not given
        ->select('id','fname','lname','uname','email','dob','status','pro_pic')
        ->first();  //get() for multiple data.
        
        return view('user.get')
        ->with('user',$user); 
    }

    public function admin_home(){
        return view('admin.home');
    }

    public function get_user(Request $req)
    {
        $e = AllUser::where('id',decrypt($req->id))
        ->first();
        return view('user.user_profile_edit')
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
        return redirect()->route('user.details',['id'=>encrypt($req->id)]);
    }
}
