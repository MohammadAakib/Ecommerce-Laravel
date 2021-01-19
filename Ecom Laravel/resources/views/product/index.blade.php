@extends('layouts.master')
@section('home')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>DataTables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
                @if (session()->get('success'))
    
                        {{session()->get('success')}}
                @endif
              
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td>NAME</td>
                            <td>DETAILS</td>
                            <td>PRICE</td>
                            <td>CATEGORY</td>
                            <td>IMAGE</td>
                            <td colspan="2">ACTION</td>
                        </tr>
                    </thead>
                
                    <tbody>
                        @foreach ($productarray as $product)
                        <tr>
                            <td>{{$product->product_id}}</td>
                            <td>{{$product->product_name}}</td>
                            <td>{{$product->product_details}}</td>
                            <td>{{$product->product_price}}</td>
                            <td>{{$product->category_name}}</td>
                            <td><img src="{{url('uploads/'.$product->product_image)}}" width="100"></td>
                            <td><a href="{{route('product.edit',$product->product_id) }}" class="button">EDIT</a></td>
                            <td>
                                <form method="post" action="{{route('product.destroy',$product->product_id) }}" class="button">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="button">DELETE</button>
                
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
@endsection