@extends('layout/admin')

@section('title','Edit Role')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Role</h1>
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
                            <a href="{{ url('admin/role') }}" class="btn btn-dark">Role List</a>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->

                      
                        <form action="{{ route('role.update') }}" method="post" autocomplete="off">
                            @csrf
                            <div class="card-body">
                                <div class="col-md-12 row">
                                    <input type="hidden" name="update_id" id="update_id" value="{{$role[0]['role_id']}}">
                                    <div class="form-group col-md-6">
                                        <label for="role">Role <span style="color:red;font-weight:bolder">*</span></label>
                                        <input type="text" class="form-control" name="role" id="role" value="{{$role[0]['role']}}">
                                        @error('role')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>                                    
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
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
<script>
    function myFunction() {
        var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }

    }
</script>
@endsection