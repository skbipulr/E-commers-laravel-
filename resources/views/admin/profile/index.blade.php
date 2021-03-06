
@extends('layouts.dashboard_app')

@section('dashboard_contant')

  <!-- ########## START: MAIN PANEL ########## -->
  <div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="index.html">Starlight</a>
      <a class="breadcrumb-item" href="index.html">Pages</a>
      <span class="breadcrumb-item active">Blank Page</span>
    </nav>

    <div class="sl-pagebody">
      <div class="sl-page-title">
        <h5>Dashboard</h5>
        <p>This is my dynamic dashboard</p>
      </div><!-- sl-page-title -->

      <div class="container">
        <div class="row">
          <div class="col-md-6">
            @if (session('name_change_status_error'))
              <div class="alert alert-danger">
                {{ session('name_change_status_error') }}
              </div>
            @endif

            @if (session('name_change_status'))
              <div class="alert alert-success">
                {{ session('name_change_status') }}
              </div>
            @endif



            <div class="card">
              <div  class="card-header card-header-default"">
                  Name Edit
              </div>
              <div class="card-body">

                <form method="post" action='{{ url('edit/profile/post') }}'>
                  @csrf
                  <div class="mb-3">
                    <label>Name</label>
                    <input type="text" class="form-control" placeholder="Enter name" name="name" value="{{ Auth::user()->name }}">
                  </div>
                  <button type="submit" class="btn btn-warning">Change name</button>
                </form>
              </div>
            </div>


          </div>
          <div class="col-md-6">
            @if (session('name_change_status_error'))
              <div class="alert alert-danger">
                {{ session('name_change_status_error') }}
              </div>
            @endif

            @if (session('name_change_status'))
              <div class="alert alert-success">
                {{ session('name_change_status') }}
              </div>
            @endif



            <div class="card">
              <div  class="card-header card-header-default"">
                  Change Profile Photo
              </div>
              <div class="card-body">

                <form method="post" action='{{ url('edit/profile/post') }}' enctype="application/x-www-form-urlencoded">
                  @csrf
                  <div class="mb-3">
                    <label>Profile Photo</label>
                    <input type="file" class="form-control" name="name">
                  </div>
                  <button type="submit" class="btn btn-info">Change Profile Photo</button>
                </form>
              </div>
            </div>


          </div>
        </div>

        <div class="row mt-4">

          <div class="col-md-4 m-auto">

            @error ('password')
              <div class="alert alert-danger">
                {{ $message }}
              </div>
            @enderror

            @if (session('password_error'))
              <div class="alert alert-success">
                {{ session('password_error') }}
              </div>
            @endif

            <div class="card">
              <div class="card-header card-header-default bg-success">
                  Change Password
              </div>
              <div class="card-body">
                <form method="post" action='{{ url('edit/password/post') }}'>
                  @csrf
                  <div class="mb-3">
                    <label>Old Password</label>
                    <input type="password" class="form-control" placeholder="Enter Old Password" name="old_password">
                  </div>

                  <div class="mb-3">
                    <label>New Password</label>
                    <input type="password" class="form-control" placeholder="Enter New Password" name="password" id="password_inp">
                    <br>
                    <button type="button" name="button" class="btn btn-sm btn-success" onclick="showPassword()">show</button>

                    <script type="text/javascript">
                        function showPassword() {
                          var x = document.getElementById("password_inp");
                          if (x.type === "password") {
                            x.type = "text";
                          } else {
                            x.type = "password";
                          }
                        }
                    </script>

                  </div>

                  <div class="mb-3">
                    <label>Comfirm Password</label>
                    <input type="password" class="form-control" placeholder="Enter confirm password" name="password_confirmation" >
                  </div>

                  <button type="submit" class="btn btn-warning">Change Password</button>
                </form>
              </div>
            </div>


          </div>

        </div>

      </div>

    </div>
  </div>



@endsection
