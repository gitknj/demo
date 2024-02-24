


<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a  @if(Session::get('page')=='dashboard') class="nav-link active" @else class="nav-link"  @endif aria-current="page" href="{{url('vendor/dashboard')}}">
            <span data-feather="home"></span>
            Dashboard
          </a>
        </li> 
        @if(Session::get('approved')==0)
        <li class="nav-item">
          <a  @if(Session::get('page')=='vendor_business_detail') class="nav-link active" @else class="nav-link"  @endif aria-current="page" href="{{url('vendor/registerBusinessDetail')}}">
            <span data-feather="home"></span>
                Add Business Details
          </a>
        </li>
        
        @else
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="">
            <span data-feather="home"></span>
              Change Password
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="">
            <span data-feather="home"></span>
              Update Profile Image
          </a>
        </li>
        @endif
      </ul>
    </div>
  </nav>
