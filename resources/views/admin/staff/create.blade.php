@extends('layout/admin')

@section('title','Create Staff')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add Staff</h1>
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
                            <a href="{{ url('admin/staff') }}" class="btn btn-dark">Staff List</a>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('staff.insert') }}" method="post" autocomplete="off">
                            @csrf
                            <div class="card-body">
                                <div class="col-md-12 row">
                                    <div class="form-group col-md-6">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{old('name')}}" id="name" placeholder="Enter Name">
                                        @error('name')
                                         <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="role">Role</label>
                                        <select name="role" id="role" class="form-control @error('role') is-invalid @enderror" required>
                                            <option selected disabled>Select Role</option>
                                            @foreach($roles as $role)
                                                <option value="{{$role['role_id']}}">{{$role['role']}}</option>
                                            @endforeach
                                        </select>
                                        @error('role')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="email">Email address</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{old('email')}}" id="email" placeholder="Enter email">
                                        @error('email')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    
                                     <div class="form-group col-md-6">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Password">
                                        @error('password')
                                         <p class="text-danger">{{ $message }}</p>
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