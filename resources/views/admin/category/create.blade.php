@extends('layout/admin')

@section('title','Create Category')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add Category</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">General Form</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card">
                        <div class="card-header text-right">
                            <a href="{{ url('admin/category') }}" class="btn btn-dark">Category List</a>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('category.insert') }}" method="post" autocomplete="off" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                               <div class="col-md-12 row">
                                    <div class="col-md-6">
                                        <label for="category_name">Category Name</label>
                                        <input type="text" class="form-control @error('category_name') is-invalid @enderror" name="category_name" value="{{old('category_name')}}" id="category_name" placeholder="Enter Category Name">
                                        @error('category_name')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="dispatch_time">Dispatch Time (Days)</label>
                                        <input type="text" class="form-control @error('dispatch_time') is-invalid @enderror" name="dispatch_time" value="{{old('dispatch_time')}}" id="dispatch_time" placeholder="E.g:- 2-3 Days">
                                        @error('dispatch_time')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="category_img">Image</label>
                                        <input type="file" class="form-control @error('category_img') is-invalid @enderror" name="category_img" id="category_img">
                                        @error('category_img')
                                        <p class="text-danger">The category image field is required.</p>
                                        @enderror
                                    </div>
                               </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (left) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

@endsection