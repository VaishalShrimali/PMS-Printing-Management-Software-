@extends('layout/admin')

@section('title','Create Subcategory')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add Subcategory</h1>
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
                            <a href="{{ url('admin/subcategory') }}" class="btn btn-dark">Subcategory List</a>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('subcategory.insert') }}" method="post" autocomplete="off" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                               <div class="col-md-12 row">
                                    <div class="col-md-6">
                                        <label for="subcategory_name">Subcategory Name</label>
                                        <input type="text" class="form-control @error('subcategory_name') is-invalid @enderror" name="subcategory_name" value="{{old('subcategory_name')}}" id="subcategory_name" placeholder="Enter Subcategory Name">
                                        @error('subcategory_name')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="f_category">Category Name</label>
                                        <select name="f_category" id="f_category" class="form-control @error('f_category') is-invalid @enderror" required>
                                            <option selected disabled>Select Category</option>
                                            @foreach($categorys as $category)
                                                <option value="{{$category['id']}}">{{$category['category_name']}}</option>
                                            @endforeach
                                        </select>
                                        @error('f_category')
                                        <p class="text-danger">The category field is required.</p>
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
                                        <label for="subcategory_img">Image</label>
                                        <input type="file" class="form-control @error('subcategory_img') is-invalid @enderror" name="subcategory_img" id="subcategory_img">
                                        @error('subcategory_img')
                                        <p class="text-danger">The subcategory image field is required.</p>
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