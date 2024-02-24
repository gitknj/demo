<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Auth\Authenticatable as AuthAuthenticatable;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth as Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    //
    
    
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function login(Request $request)
    {
       /* echo $password=Hash::make('123456');
        die;*/
        if($request->isMethod('POST'))
        {
            $data=$request->all();
            if(Auth::guard('admin')->attempt(['email'=>$data['email'],
                'password'=>$data['password'],
                'status'=>1,
           ] ))
          {
                $user=Auth::guard('admin')->user();
                $username=$user->name;
                session('username',$username);
                $data =compact('username');
                return view('admin.dashboard')->with($data);
           }
           else
           {
                return redirect()->back()->with('error_message','Invalid Email or Password');
           }
            
        }
        return view('admin.login');
    }
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('admin/login');
    }

    public function changepwd()
    {
        return view('admin.changepassword');
    }

    public function changepwdpost(Request $request)
    {
        if($request->isMethod('POST'))
        {
            
            if(Auth::guard('admin')->check())
          {
               
            
              //  echo $new_pwd=$request->new_pwd;
             //   print_r($request->all());
               // die();      
                $request->validate([
                    
                    /*'email'=>'required|email|max:100',*/
                    'current_password'=>'required',
                    'password'=>'required|confirmed',
                    'password_confirmation'=>'required',
                    
                ]
                );
                
                $user=Auth::guard('admin')->user();
                
                $userid=$user->id;
                $usr=Admin::find($userid);
                $usr->password=Hash::make($request['password']);
                
                $usr->save();
                //return view('layout.customers.index');        
                $success='yes';
                $data=compact('success');
                return view('admin.changepassword')->with($data);
                
                
                //return view('admin.dashboard')->with($data);
           }
           else
           {
                return redirect()->back()->with('error_message','Invalid Password');
           }
            
        }        
    }

    public function updateprofile()
    {
        $user=Auth::guard('admin')->user();
        $userid=$user->id;
        $usr=Admin::find($userid);
        //print_r($usr);
         $username=$usr['name'];
         $usermobile=$usr['mobile'];
         $usertype=$usr['type'];
         $uservendor_id=$usr['vendor_id'];
         $userimage=$usr['image'];
         $userstatus=$usr['status'];
        
        $data=compact('username','usermobile','usertype','uservendor_id','userimage','userstatus');

        return view('admin.updateprofile')->with($data);
        
    } 
    
    public function updateprofilepost(Request $request)
    {
        /*$request->name;
        $request->mobile;
       $request->file('image');*/
       $request->validate([
        'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'name' => 'required|string',
        'mobile' => 'required|digits:10|numeric'
        ]);
        $user=Auth::guard('admin')->user();
        $userid=$user->id;
        $usr=Admin::find($userid);
        $usr->name=$request->name;
        $usr->mobile=$request->mobile;
        if($request->file('image')!=null)
        {
        // $imageName = $userid.'_'.time().'_'.$request->file('image')->extension();  
         
        //$request->image->move(public_path('admin/images'), $imageName);
        
        
          //      $usr->image='admin/images/'.$imageName;
                
                // A few settings
                $img_file = $request->file('image');
                //echo $img_file;
                //die();
                // Read image path, convert to base64 encoding
                $imgData = base64_encode(file_get_contents($img_file));

                // Format the image SRC:  data:{mime};base64,{data};
                $src = 'data: image/'.$request->file('image')->extension().';base64,'.$imgData;

                $usr->image=$src;
                // Echo out a sample image
                //echo '<img src="'.$src.'">';
                        
                
        }
        $usr->save();
        //return view('layout.customers.index');        
        $username=$usr['name'];
        $usermobile=$usr['mobile'];
        $usertype=$usr['type'];
        $uservendor_id=$usr['vendor_id'];
        $userimage=$usr['image'];
        $userstatus=$usr['status'];
        $success='yes';
        $data=compact('username','usermobile','usertype','uservendor_id','userimage','userstatus','success');
        return view('admin.updateprofile')->with($data);
        
    }
}
