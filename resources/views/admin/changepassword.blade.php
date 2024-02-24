

@extends('admin.layout.layout')
@push('title')
    <title>Admin::Change Password</title>
@endpush

@section('content')
    
<div class="container-fluid">
  <div class="row">
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Set new password here..</h1>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    @isset($success)
                        <script>
                            alert('You are about to log out and log in once again using New Password set.');
                            location.href="{{ url('admin/changepassword/success')}}";
                        </script>
                    @endisset
                    <form action="{{url('admin/changepassword')}}" method="post" onsubmit="return confirm('Do you really want to Change Password?')">
                        @csrf
                        
                       
                        <div class="form-floating">
                            <input type="password" class="form-control mb-2" id="current_password" name="current_password" placeholder="" required>
                            <label for="floatingInput">Current Password</label>
                            @error('current_password')
                            <div class="form-floating">
                           <span class="alert alert-danger">
                               {{ $message }}
                           </span>
                       </div>
                       @enderror
                        </div>
                        <div class="form-floating">
                            <input type="password" class="form-control mb-2" id="password" name="password" placeholder="" required>
                            <label for="floatingInput">New Password</label>
                            @error('password')
                            <div class="form-floating alert alert-danger mb-2">
                                {{ $message }}
                           </div>
                       @enderror
                        </div>
                        <div class="form-floating">
                            <input type="password" class="form-control mb-2" id="password_confirmation" name="password_confirmation" placeholder="" required>
                            <label for="floatingInput">Confrim Password</label>
                            @error('password_confirmation')
                            <div class="form-floating">
                           <span class="alert alert-danger">
                               {{ $message }}
                           </span>
                       </div>
                       @enderror
                        </div>
                          <button class="w-auto btn btn-sm btn-primary " type="submit">Change Password</button>
                    
                  </form>  
                </div>  
            </div>
        </div>
    </main>
    {{-- <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Set new password here..</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
          </div>
          <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar"></span>
            This week
          </button>
        </div>
      </div>



      <h2>Section title</h2>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Header</th>
              <th scope="col">Header</th>
              <th scope="col">Header</th>
              <th scope="col">Header</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1,001</td>
              <td>random</td>
              <td>data</td>
              <td>placeholder</td>
              <td>text</td>
            </tr>
            <tr>
              <td>1,002</td>
              <td>placeholder</td>
              <td>irrelevant</td>
              <td>visual</td>
              <td>layout</td>
            </tr>
            <tr>
              <td>1,003</td>
              <td>data</td>
              <td>rich</td>
              <td>dashboard</td>
              <td>tabular</td>
            </tr>
            <tr>
              <td>1,003</td>
              <td>information</td>
              <td>placeholder</td>
              <td>illustrative</td>
              <td>data</td>
            </tr>
            <tr>
              <td>1,004</td>
              <td>text</td>
              <td>random</td>
              <td>layout</td>
              <td>dashboard</td>
            </tr>
            <tr>
              <td>1,005</td>
              <td>dashboard</td>
              <td>irrelevant</td>
              <td>text</td>
              <td>placeholder</td>
            </tr>
            <tr>
              <td>1,006</td>
              <td>dashboard</td>
              <td>illustrative</td>
              <td>rich</td>
              <td>data</td>
            </tr>
            <tr>
              <td>1,007</td>
              <td>placeholder</td>
              <td>tabular</td>
              <td>information</td>
              <td>irrelevant</td>
            </tr>
            <tr>
              <td>1,008</td>
              <td>random</td>
              <td>data</td>
              <td>placeholder</td>
              <td>text</td>
            </tr>
            <tr>
              <td>1,009</td>
              <td>placeholder</td>
              <td>irrelevant</td>
              <td>visual</td>
              <td>layout</td>
            </tr>
            <tr>
              <td>1,010</td>
              <td>data</td>
              <td>rich</td>
              <td>dashboard</td>
              <td>tabular</td>
            </tr>
            <tr>
              <td>1,011</td>
              <td>information</td>
              <td>placeholder</td>
              <td>illustrative</td>
              <td>data</td>
            </tr>
            <tr>
              <td>1,012</td>
              <td>text</td>
              <td>placeholder</td>
              <td>layout</td>
              <td>dashboard</td>
            </tr>
            <tr>
              <td>1,013</td>
              <td>dashboard</td>
              <td>irrelevant</td>
              <td>text</td>
              <td>visual</td>
            </tr>
            <tr>
              <td>1,014</td>
              <td>dashboard</td>
              <td>illustrative</td>
              <td>rich</td>
              <td>data</td>
            </tr>
            <tr>
              <td>1,015</td>
              <td>random</td>
              <td>tabular</td>
              <td>information</td>
              <td>text</td>
            </tr>
          </tbody>
        </table>
      </div>
    </main> --}}
    
  </div>
</div>

@endsection