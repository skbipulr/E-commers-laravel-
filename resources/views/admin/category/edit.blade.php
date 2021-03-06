
@extends('layouts.dashboard_app')

@section('category')
  active
@endsection

@section('dashboard_contant')

  <!-- ########## START: MAIN PANEL ########## -->
  <div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="{{ url('home') }}">Home</a>
      <a class="breadcrumb-item" href="{{ url('app/category') }}">Category</a>
      <span class="breadcrumb-item active">{{$category_info->category_name}}</span>
    </nav>

    <div class="sl-pagebody">
      <div class="sl-page-title">
        <h5>{{$category_info->category_name}}</h5>
        <p>This is my dynamic category edit page</p>
      </div><!-- sl-page-title -->
    </div>

    <div class="container">
      <div class="row">


        <div class="col-md-4 m-auto">

          <div class="card">
            <div class="card-header">
              Edit Category
            </div>
            <div class="card-body">

            <ol class="breadcrumb">
              <li><a href="{{ url('app/category') }}">Add Category</a> / </li>
              <li class="active">{{$category_info->category_name}}</li>
            </ol>


              <form method="post" action='{{ url('edit/category/post') }}'>
                @csrf
                <div class="mb-3">
                  <label>Category Name</label>
                  <input type="hidden" name="category_id" value="{{ $category_info->id }}">
                  <input type="text" class="form-control" placeholder="Enter Category name" name="category_name" value="{{ $category_info->category_name }}">
                  @error ('category_name')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                <div class="mb-3">
                  <label>Category Description</label>
                  <textarea class="form-control" name="category_description" rows="4" >{{ $category_info->category_description }}</textarea>
                  @error ('category_description')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                <button type="submit" class="btn btn-warning">Edit Category</button>
              </form>
            </div>
          </div>


        </div>

      </div>

    </div>

  </div>

@endsection
