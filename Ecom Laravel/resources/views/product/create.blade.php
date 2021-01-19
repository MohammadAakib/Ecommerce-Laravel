@extends('layouts.master')
@section('home')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Product Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Product Form</li>
            </ol>
          </div>
        </div>
      </div>
      <!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Product Form</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
            @endif

            <form role="form" method="post" action="{{route('product.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Product Name</label>
                    <input type="text" name="product_name" required=""class="form-control" id="exampleInputEmail1" placeholder="Product Name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Product Details</label>
                    <input type="text" name="product_details" required="" class="form-control" id="exampleInputPassword1" placeholder="Product Details">
                  </div>
                    <div class="form-group">
                    <label for="exampleInputEmail1">Product Price</label>
                    <input type="number" name="product_price" required="" class="form-control" id="exampleInputEmail1" placeholder="Product Price">
                  </div>
                  <div class="form-group">
                  <label for="exampleInputEmail1">Category Name</label>
                  
                    <select name="category_id">
                    <option value="" selected disabled>SELECT</option>
                        @foreach ($categoryarray as $category)
                            <option value="{{$category->category_id}}">{{$category->category_name}}</option>                    
                        @endforeach
                    </select>
                  </div>

                    <div class="form-group">
                    <label for="exampleInputEmail1">Product Image</label>
                    <input type="file" name="product_image" required="" class="form-control" id="exampleInputEmail1" placeholder="Product Image">
                    </div>

                  <div class="card-footer">
                    <button type="submit"class="btn btn-primary">Submit</button>
                  <button type="reset" class="btn btn-primary">Reset</button>
                  </div>
                </div>
             </form>
           </div>
        </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
  @endsection