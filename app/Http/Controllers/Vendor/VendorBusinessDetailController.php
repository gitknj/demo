<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VendorBusinessDetail;
use Illuminate\Contracts\Session\Session;

class VendorBusinessDetailController extends Controller
{
    //
    public function register_business_detail()
    {
        
        session(['page'=>'vendor_business_detail']);
        return view('vendor.vendor_business_detail');
    }

    public function register_business_detail_post(Request $request)
    {
        $vendor_id=session('vendor_id');
        
        //$vendor=VendorBusinessDetail::find($vendor_id);
        $vendor=VendorBusinessDetail::where('vendor_id',$vendor_id)->first();
        if($vendor=='')
        {
                    $request->validate([
                    /* 'shop_name'=>'required|max:255|regex:/^[a-zA-Z ]*$/',
                        'shop_address'=>'nullable|max:255',
                        'shop_city'=>'nullable|alpha|max:100',
                        'shop_pincode'=>'nullable|numeric|digits:6',
                        'shop_state'=>'nullable|alpha|max:100',
                        'shop_country'=>'nullable|alpha|max:100',
                        'shop_mobile'=>'required|numeric|digits:10',
                        'shop_website'=>'nullable|url',
                        'shop_email'=>'required|email|max:255',
                        'address_proof'=>'required|notin:0',
                        'address_proof_image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                        'business_license_no'=>'required|numeric|digits:16',
                        'gst_no'=>'required|regex:/^[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]{1}[1-9A-Z]{1}Z[0-9A-Z]{1}$/',
                        'pan_no'=>'required|regex:/[A-Z]{5}[0-9]{4}[A-Z]{1}/',
                        'acc_holder_name'=>'required|max:255|regex:/^[a-zA-Z ]*$/',
                        'bank_name'=>'required|max:255|regex:/^[a-zA-Z ]*$/',
                        'ifsc_code'=>'required|regex:/^[A-Z]{4}0[A-Z0-9]{6}$/',
                        'acc_no'=>'required|regex:/^[0-9]{9,18}$/',*/
                        
                    ],
                [
                    'address_proof.notin'=>'Please select appropriate Address Proof',
                ]);
                    //echo $request->address_proof;
                    //echo "hello";
                    
                    
                    $img_file= $request->file('address_proof_image');
                    $extension=$request->file('address_proof_image')->extension();
                    $imgData = base64_encode(file_get_contents($img_file));
                    $src = 'data: image/'.$extension.' ;base64,'.$imgData;
                    

                    
                    $vbdetail=new VendorBusinessDetail;
                    $vbdetail->vendor_id=$vendor_id;
                    $vbdetail->shop_name=$request->shop_name;
                    if($request->shop_address!=''){
                    $vbdetail->shop_address=$request->shop_address;}
                    if($request->shop_city!=''){
                        $vbdetail->shop_city=$request->shop_city;
                    }
                    if($request->shop_state!=''){
                        $vbdetail->shop_state=$request->shop_state;
                    }
                    if($request->shop_country!=''){
                        $vbdetail->shop_country=$request->shop_country;
                    }
                    if($request->shop_pincode!=''){
                        $vbdetail->shop_pincode=$request->shop_pincode;
                    }
                    $vbdetail->shop_mobile=$request->shop_mobile;
                    if($request->shop_website!=''){
                        $vbdetail->shop_website=$request->shop_website;
                    }
                    $vbdetail->shop_email=$request->shop_email;
                    $vbdetail->address_proof=$request->address_proof;
                    $vbdetail->address_proof_image=$src;
                    $vbdetail->business_license_no=$request->business_license_no;
                    $vbdetail->gst_no=$request->gst_no;
                    $vbdetail->pan_no=$request->pan_no;
                    $vbdetail->acc_holder_name=$request->acc_holder_name;
                    $vbdetail->bank_name=$request->bank_name;
                    $vbdetail->ifsc_code=$request->ifsc_code;
                    $vbdetail->acc_no=$request->acc_no;

                    $vbdetail->save();
                    //$request->session->flash('status', 'Registration was successful!');
                    
                    //session(['status'=>'Registration was successful!. Shortly you will be verfied.']);
                    //return view('vendor.dashboard');
                    session(['page'=>'dashboard']);
                    return redirect(route('vendor.dashboard'))->with('success','Registration was successful!. Shortly you will be verfied.');
        }   
    else{
        session(['page'=>'dashboard']);
            return redirect(route('vendor.dashboard'))->with('success','You have already been registered.');
        }
    }

}
