






@extends('admin.layout.layout')
@push('title')
    <title>Admin::Update Profile</title>
@endpush

@section('content')
    
<div class="container-fluid">
  <div class="row">
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Profile Update..</h1>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    @isset($success)
                        <script>
                            alert('You profile has been updated successfullly');
                            
                        </script>
                    @endisset
                    <form action="{{url('admin/updateprofile')}}" method="post" enctype="multipart/form-data" onsubmit="return confirm('Do you really want to Update your Profile details?')">
                        @csrf
                      
                        <div class="form-floating">
                            <h5>You are of type <i>{{$usertype}}</i></h5>
                       </div>
                       @if($userimage=="")
                        <img src="{{ url('admin/assets/brand/userprofile.png')}}" height="100" width="100" alt="" class="form-floating">
                        @else
                        <img src="{{$userimage}}" height="100" width="100" alt="" class="form-floating">
                       @endif
                        <div class="form-floating">
                            <input type="file" class="form-control mb-2" id="image" name="image" placeholder="" >
                            <label for="image" class="pt-2">Select Image</label>
                            @error('image')
                            <div class="form-floating">
                           <span class="alert alert-danger">
                               {{ $message }}
                           </span>
                       </div>
                       @enderror
                        </div>
                       
                       
                        <div class="form-floating">
                            <input type="text" class="form-control mb-2" id="name" name="name" placeholder="" value="{{$username}}" required>
                            <label for="name">Name</label>
                            @error('name')
                            <div class="form-floating">
                           <span class="alert alert-danger form-control">
                               {{ $message }}
                           </span>
                       </div>
                       @enderror
                        </div>
                        <div class="form-floating">
                            <input type="text" class="form-control mb-2" id="mobile" name="mobile" placeholder="" value="{{$usermobile}}" required>
                            <label for="mobile">Mobile No.</label>
                            @error('mobile')
                            <div class="form-floating">
                           <span class="alert alert-danger">
                               {{ $message }}
                           </span>
                       </div>
                       @enderror
                        </div>
                        
                          <button class="w-auto btn btn-sm btn-primary " type="submit">Update Profile</button>
                    
                  </form>  
                </div>  
            </div>
        </div>
    </main>
    
    
  </div>
</div>

@endsection