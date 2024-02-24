
    @extends('vendor.layout.layout')
@push('title')
    <title>Vendor::Business Detail Registration</title>
@endpush

@section('content')


  <div class="container-fluid">
    <div class="row">
      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
              <h1 class="h2">Business Detail Registration..</h1>
          </div>
          <div class="container">
              <div class="row">
                  <div class="col-sm-6">
                  
  <form method="post" name="vendor_business_detail_registerform" id="vendor_business_detail_registerform"  onsubmit="return confirm('Verify your details before submission. If correct : Ok ');" action='{{url('vendor/registerBusinessDetail')}}' enctype="multipart/form-data">
    @csrf
    {{-- <img class="mb-4" src="{{ url('vendor/assets/brand/bootstrap-logo.svg')}}" alt="" width="72" height="57">
    <h1 class="h3 mb-3 fw-normal">Business Detail Register</h1> --}}
    {{-- <div class="form-floating mb-3">
      <span class="text-primary " >Already Registered? <a href="{{ route('vendor.login')}}">Sign In Here</a></span>
      
    </div>  --}}
    
    @if(Session::has('error_message'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
            Error: {{ Session::get('error_message') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif
    <div class="form-floating">
      <input type="text" class="form-control" id="shop_name" name="shop_name" placeholder="" value="{{old('shop_name')}}">
      <label for="name">Your Shop Name</label>
    </div>
    @error('shop_name')
        <div class="form-floating">
        <span class="alert-danger">
            {{ $message }}
        </span>
        </div>
    @enderror
    <div class="form-floating">
        <textarea name="shop_address" class="form-control" id="shop_address" cols="50" rows="10" placeholder="Address">{{old('shop_address')}}</textarea>
        <label for="address">Shop Address</label>
      </div>
      @error('shop_address')
      <div class="form-floating">
      <span class="alert-danger">
          {{ $message }}
      </span>
      </div>
      @enderror
      
     
      <div class="form-floating">
        <input type="text" class="form-control" id="shop_city" name="shop_city" placeholder=""  value="{{old('shop_city')}}">
        <label for="city">Shop City Name</label>
      </div>
      @error('shop_city')
      <div class="form-floating">
      <span class="alert-danger">
          {{ $message }}
      </span>
      </div>
      @enderror
      <div class="form-floating">
        <input type="text" class="form-control" id="shop_pincode" name="shop_pincode" placeholder=""  value="{{old('shop_pincode')}}">
        <label for="pincode">Pincode</label>
      </div>
      @error('shop_pincode')
      <div class="form-floating">
      <span class="alert-danger">
          {{ $message }}
      </span>
      </div>
      @enderror
      <div class="form-floating">
        <input type="text" class="form-control" id="shop_state" name="shop_state" placeholder=""  value="{{old('shop_state')}}">
        <label for="state">Shop State Name</label>
      </div>
      @error('shop_state')
      <div class="form-floating">
      <span class="alert-danger">
          {{ $message }}
      </span>
      </div>
      @enderror
      <div class="form-floating">
        <input type="text" class="form-control" id="shop_country" name="shop_country" placeholder=""  value="{{old('shop_country')}}">
        <label for="country">Shop Country Name</label>
      </div>
      @error('shop_country')
      <div class="form-floating">
      <span class="alert-danger">
          {{ $message }}
      </span>
      </div>
      @enderror
      <div class="form-floating ">
        <input type="text" class="form-control" id="shop_mobile" name="shop_mobile" placeholder=""  value="{{old('shop_mobile')}}">
        <label for="mobile">Shop Contact No.</label>
      </div>
      @error('shop_mobile')
      <div class="form-floating">
      <span class="alert-danger">
          {{ $message }}
      </span>
      </div>
      @enderror
      <div class="form-floating ">
        <input type="text" class="form-control" id="shop_website" name="shop_website" placeholder=""  value="{{old('shop_website')}}">
        <label for="mobile">Shop Website</label>
      </div>
      @error('shop_website')
      <div class="form-floating">
      <span class="alert-danger">
          {{ $message }}
      </span>
      </div>
      @enderror
      <div class="form-floating ">
        <input type="email" class="form-control" id="shop_email" name="shop_email" placeholder=""  value="{{old('shop_email')}}">
        <label for="mobile">Shop Email</label>
      </div>
      @error('shop_email')
      <div class="form-floating">
      <span class="alert-danger">
          {{ $message }}
      </span>
      </div>
      @enderror
      <div class="form-floating ">
        <select class="form-control aria-label="Address Proof" name="address_proof" id="address_proof">
          <option value="0" >Address Proof</option>
          <option {{old('address_proof')=='pan_card' ? 'selected' : ''}}   value="pan_card">PAN Card</option>
          <option {{old('address_proof')=='passport' ? 'selected' : ''}} value="passport">Passport</option>
          <option {{old('address_proof')=='aadhar_card' ? 'selected' : ''}} value="aadhar_card">Aadhar Card</option>
        </select>
        {{-- <input type="text" class="form-control" id="address_proof" name="address_proof" placeholder=""  value="{{old('address_proof')}}">
        <label for="mobile">Address Proof</label> --}}
      </div>
      @error('address_proof')
      <div class="form-floating">
      <span class="alert-danger">
          {{ $message }}
      </span>
      </div>
      @enderror
      <div class="form-floating ">
        <input type="file" class="form-control" id="address_proof_image" name="address_proof_image" placeholder=""  value="">
        <label for="mobile" class="pt-2">Address Proof Image</label>
      </div>
      @error('address_proof_image')
      <div class="form-floating">
      <span class="alert-danger">
          {{ $message }}
      </span>
      </div>
      @enderror
      <div class="form-floating ">
        <input type="text" class="form-control" id="business_license_no" name="business_license_no" placeholder=""  value="{{old('business_license_no')}}">
        <label for="mobile">Business License No.</label>
      </div>
      @error('business_license_no')
      <div class="form-floating">
      <span class="alert-danger">
          {{ $message }}
      </span>
      </div>
      @enderror
      <div class="form-floating ">
        <input type="text" class="form-control" id="gst_no" name="gst_no" placeholder=""  value="{{old('gst_no')}}">
        <label for="mobile">GST No.</label>
      </div>
      @error('gst_no')
      <div class="form-floating">
      <span class="alert-danger">
          {{ $message }}
      </span>
      </div>
      @enderror
      <div class="form-floating ">
        <input type="text" class="form-control" id="pan_no" name="pan_no" placeholder=""  value="{{old('pan_no')}}">
        <label for="mobile">PAN No.</label>
      </div>
      @error('pan_no')
      <div class="form-floating">
      <span class="alert-danger">
          {{ $message }}
      </span>
      </div>
      @enderror
      <div class="form-floating ">
        <input type="text" class="form-control" id="acc_holder_name" name="acc_holder_name" placeholder=""  value="{{old('acc_holder_name')}}">
        <label for="mobile">Account Holder Name</label>
      </div>
      @error('acc_holder_name')
      <div class="form-floating">
      <span class="alert-danger">
          {{ $message }}
      </span>
      </div>
      @enderror
      <div class="form-floating ">
        <input type="text" class="form-control" id="bank_name" name="bank_name" placeholder=""  value="{{old('bank_name')}}">
        <label for="mobile">Bank Name</label>
      </div>
      @error('bank_name')
      <div class="form-floating">
      <span class="alert-danger">
          {{ $message }}
      </span>
      </div>
      @enderror
      <div class="form-floating ">
        <input type="text" class="form-control" id="ifsc_code" name="ifsc_code" placeholder=""  value="{{old('ifsc_code')}}">
        <label for="mobile">IFSC Code</label>
      </div>
      @error('ifsc_code')
      <div class="form-floating">
      <span class="alert-danger">
          {{ $message }}
      </span>
      </div>
      @enderror
      <div class="form-floating ">
        <input type="text" class="form-control" id="acc_no" name="acc_no" placeholder=""  value="{{old('acc_no')}}">
        <label for="mobile">Account Number</label>
      </div>
      @error('acc_no')
      <div class="form-floating">
      <span class="alert-danger">
          {{ $message }}
      </span>
      </div>
      @enderror
    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="1"  name="agreeto" id="agreeto"> I agree to the Terms and Conditions of Ecom
      </label>
    </div>
    @error('agreeto')
      <div class="form-floating">
      <span class="alert-danger">
          {{ $message }}
      </span>
      </div>
      @enderror
    <button class="w-auto btn btn-sm btn-primary" type="submit">Register Business Detail</button>
    
  </form>



  </div>
</div>
</div>
</main>
</div>
</div>
@endsection

{{--     
  </body>
</html> --}}
