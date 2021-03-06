
@extends('layouts.dashboard_app')

@section('home')
  active
@endsection


@section('dashboard_contant')


    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        {{-- <a class="breadcrumb-item" href="index.html">Home</a>
        <a class="breadcrumb-item" href="index.html">Pages</a> --}}
        <span class="breadcrumb-item active">Home</span>
      </nav>

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Dashboard</h5>
          <p>This is my dynamic dashboard</p>
        </div><!-- sl-page-title -->

            <div class="container">
         <div class="row justify-content-center">

           <div class="col-md-12">

             <div class="card">
             <div class="card-header">
                 Dashboard
                 <h1>Total Users: {{ $total_users }}</h1>
             </div>

             <div class="card-body">
                 @if (session('status'))
                     <div class="alert alert-success" role="alert">
                         {{ session('status') }}
                     </div>
                 @endif

                  <table class="table table-striped table-dark">
                     <thead>
                      <tr>
                        <th>Id</th>
                         <th>SL. No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Create at</th>
                      </tr>
                     </thead>
                     <tbody>
                         {{-- @php
                             $falg = 1;
                         @endphp --}}
                         @foreach ($users as $user)
                             <tr>
                               {{-- <td>{{$loop->index+1}}</td> --}}
                               <td>{{$users->firstItem() + $loop->index+1}}</td>
                               <td>{{$user->id}}</td>
                               <td>{{ Str::title($user->name)}}</td>
                               <td>{{$user->email}}</td>
                               <td>
                                   <li>Date: {{$user->created_at->format('d/m/Y')}}</li>
                                   <li>Time: {{$user->created_at->format('h:i:s A')}}</li>
                                   <li>Time: {{$user->created_at->diffForHumans()}}</li>
                               </td>
                             </tr>
                         @endforeach
                     </tbody>
                     </table>
                     {{ $users->links() }}

             </div>

         </div>

          </div>

          </div>

        </div>

      </div><!-- sl-pagebody -->
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

@endsection
