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
      </div>
      <!-- /.container-fluid -->
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
                  <th>CATEGORY ID:</th>
                  <th>CATEGORY NAME:</th>
                  <th colspan="2">ACTION</th>
                </tr>
                </thead>
                
                <tbody>
                    @foreach ($categoryarray as $category)
                <tr>
                    <td>{{$category->category_id}}</td>
                    <td>{{$category->category_name}}</td>
                    <td><a href="{{route('category.edit',$category->category_id) }}" class="button">EDIT</a></td>
                    <td>
                        <form method="post" action="{{route('category.destroy',$category->category_id) }}" class="button">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="button">DELETE</button>
        
                        </form>
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