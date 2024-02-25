<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vendor;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth as Auth;
class VendorController extends Controller
{
    //
    public function dashboard()
    {




        session(['page'=>'dashboard']);
        return view('vendor.dashboard');
    }

    public function login()
    {
        return view('vendor.login');
    }
    public function loginpost(Request $request)
    {
        //print_r($request->all());
        $request->validate([
            'email'=>'required|email|max:255',
            'password'=>'required|max:255',
        ]);
        if(Auth::guard('vendor')->attempt([
            'email'=>$request->email,
            'password'=>$request->password,
            'status'=>1,
        ]))
        {
            
            $vendoruser=Auth::guard('vendor')->user();
            session(['vendor_name'=>$vendoruser->name]);
            session(['vendor_id'=>$vendoruser->id]);
            session(['vendor_approved'=>$vendoruser->approved]);
            session(['page'=>'dashboard']);
            return redirect(route('vendor.dashboard'));
        }

        return view('vendor.login');
    }
    public function register()
    {
        return view('vendor.register');
    }
    public function registerpost(Request $request)
    {
       // print_r($request->all());
        $request->validate([
            'email'=>'required|email|unique:vendors',
          /*  'name'=>'required|alpha|max:255',
           'email'=>'required|email|max:255|unique:vendors',
            'password'=>'required|confirmed',
            'password_confirmation'=>'required',
           'mobile'=>'required|digits:10|numeric',
           'address'=>'required|max:255',
            'city'=>'required|alpha|max:100',
            'pincode'=>'required|digits:6|numeric',
            'state'=>'required|alpha|max:100',
           'country'=>'required|alpha|max:100',
            'agreeto'=>'required', */
        ]);

        $img_file= 'vendor\assets\brand\userprofile.png';
        $imgData = base64_encode(file_get_contents($img_file));
        $src = 'data: image/png ;base64,'.$imgData;
        
        $vendoruser=new Vendor;
        $vendoruser->name=$request->name;
        $vendoruser->email=$request->email;
        $vendoruser->password=Hash::make($request->password);
        $vendoruser->mobile=$request->mobile;
        $vendoruser->address=$request->address;
        $vendoruser->city=$request->city;
        $vendoruser->pincode=$request->pincode;
        $vendoruser->state=$request->state;
        $vendoruser->country=$request->country;
        $vendoruser->image=$src;
        
        $vendoruser->save();
        $registrationsuccess='yes';
        $data=compact('registrationsuccess');
        return view('vendor.login')->with($data);


    }
        
    public function logout()
    {
        Auth::guard('vendor')->logout();
        session()->flush();
        return redirect(route('vendor.login'));   
    }

}
