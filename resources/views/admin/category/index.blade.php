
@extends('layouts.dashboard_app')

@section('category')
  active
@endsection

@section('dashboard_contant')

  <!-- ########## START: MAIN PANEL ########## -->
  <div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="{{ url('home') }}">Home</a>

      <span class="breadcrumb-item active">Category</span>
    </nav>

    <div class="sl-pagebody">
      <div class="sl-page-title">
        <h5>Category</h5>
        <p>This is my dynamic category page</p>
      </div><!-- sl-page-title -->
    </div>

    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header">
              List Category(Active)
            </div>
            <div class="card-body">
              @if (session('delete_status'))
                <div class="alert alert-danger">
                  {{ session('delete_status')}}
                </div>
              @endif

              @if (session('restore_status'))
                <div class="alert alert-success">
                  {{ session('restore_status') }}
                </div>
              @endif
              @if (session('forcedelete_status'))
                <div class="alert alert-danger">
                  {{ session('forcedelete_status') }}
                </div>
              @endif

            <form  action="{{ url('mark/delete') }}" method="post">

              @csrf
              <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">Mark</th>
                        <th scope="col">Serial. No</th>
                        <th scope="col">Category Name</th>
                        <th scope="col">Category Description</th>
                        <th scope="col">Category Created At</th>
                        <th scope="col">Created By</th>
                        <th scope="col">Acation</th>
                      </tr>
                    </thead>

                    <tbody>
                      @forelse ($categories as $category)
                        <tr>
                          <td>
                            <input type="checkbox" name="category_id[]" value="{{ $category->id }}">
                          </td>
                          <td>{{$loop->index + 1}}</td>
                          <td>{{$category->category_name}}</td>
                          <td>{{$category->category_description}}</td>
                          <td>{{App\User::find($category->user_id)->name}}</td>
                          <td>{{$category->created_at->format('d/m/y h:i:s A')}}</td>
                          <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                  <a href="{{url('edit/category')}}/{{$category->id}}" type="button" class="btn btn-info">Edit</a>
                                  <a href="{{url('delete/category')}}/{{$category->id}}" type="button" class="btn btn-danger">Delete</a>

                            </div>
                          </td>

                        </tr>
                      @empty
                        <tr>
                          <td colspan="50" class="text-center  text">No data avalilavle</td>
                        </tr>

                      @endforelse

                    </tbody>
                </table>
              </div>


              <button type="submit" class="btn btn-danger">Mark Deleted</button>
            </form>

            </div>
          </div>

          <div class="card mt-5">
            <div class="card-header bg-danger">
              List Category(Deleted)
            </div>
            <div class="card-body">
              {{-- @if (session('delete_status'))
                <div class="alert alert-danger">
                  {{ session('delete_status')}}
                </div>

              @endif

              @if (session('edit_status'))
                <div class="alert alert-success">
                  {{ session('edit_status') }}
                </div>
              @endif --}}
              <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th scope="col">Serial. No</th>
                      <th scope="col">Category Name</th>
                      <th scope="col">Category Description</th>
                      <th scope="col">Category Created At</th>
                      <th scope="col">Created By</th>
                      <th scope="col">Acation</th>
                    </tr>
                  </thead>

                  <tbody>
                    @forelse ($deleted_categories as $deleted_category)
                      <tr>
                        <td>{{$loop->index + 1}}</td>
                        <td>{{$deleted_category->category_name}}</td>
                        <td>{{$deleted_category->category_description}}</td>
                        <td>{{App\User::find($category->user_id)->name}}</td>
                        <td>{{$deleted_category->created_at->format('d/m/y h:i:s A')}}</td>
                        <td>


                          <div class="btn-group" role="group" aria-label="Basic example">
                                {{-- <a href="{{url('edit/category')}}/{{$category->id}}" type="button" class="btn btn-info">Edit</a> --}}
                                <a href="{{url('force/delete/category')}}/{{$deleted_category->id}}" type="button" class="btn btn-danger">F.D</a>
                                <a href="{{url('restore/category')}}/{{$deleted_category->id}}" type="button" class="btn btn-success">Restore</a>

                          </div>
                        </td>

                      </tr>
                    @empty
                      <tr>
                        <td colspan="50" class="text-center  text">No data avalilavle</td>
                      </tr>

                    @endforelse

                  </tbody>
              </table>

            </div>
          </div>

            </div>

        <div class="col-md-4">

          <div class="card">
            <div class="card-header">
              Add Category
            </div>
            <div class="card-body">
            @if (session('succss_status'))
              <div class="alert alert-success">
                {{ session('succss_status') }}
              </div>

            @endif
              @if ($errors->all())
                <div class="alert alert-danger">
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </div>
              @endif

              <form method="post" action='{{ url('app/category/post') }}'>
                @csrf
                <div class="mb-3">
                  <label>Category Name</label>
                  <input type="text" class="form-control" placeholder="Enter Category name" name="category_name" value="{{ old('category_name') }}">
                  @error ('category_name')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                <div class="mb-3">
                  <label>Category Description</label>
                  <textarea class="form-control" name="category_description" rows="4" >{{ old('category_description') }}</textarea>
                  @error ('category_description')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                <button type="submit" class="btn btn-primary">Add Category</button>
              </form>
            </div>
          </div>


        </div>

      </div>

    </div>

  </div>

@endsection
