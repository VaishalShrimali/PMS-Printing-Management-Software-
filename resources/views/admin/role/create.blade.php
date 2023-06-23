@extends('layout/admin')

@section('title','Create Role')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add Role</h1>
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
                        @php


                        $array = ['RECCI','DESIGNING','PRINTING','CUTTING','LAMINATION','PASTING','INSTALLATION','DELIVERY'];

                        $check_role = $role->toArray();


                        @endphp
                        <form action="{{ route('role.insert') }}" method="post" autocomplete="off">
                            @csrf
                            <div class="card-body">
                                <div class="col-md-12 row">
                                   
                                    <div class="form-group col-md-6">
                                        <label for="role">Role <span style="color:red;font-weight:bolder">*</span></label>
                                        <input type="text" class="form-control" name="role" id="role" value="">
                                        @error('role')
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