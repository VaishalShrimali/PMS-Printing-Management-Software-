@extends('layout/admin')

@section('title','Staff List')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Staff List</h1>
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
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header text-right">
                  <a href="{{ url('admin/staff/create') }}" class="btn btn-primary">Add Staff</a>
              </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>SR No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php $i = 1; ?>
                @foreach($staffs as $staff)
                  <tr>
                    <td>{{ $i }}</td>
                    <td>{{$staff['name']}}</td>
                    <td>{{$staff['email']}}</td>
                    <td>{{$staff['role']}}</td>
                    <td>
                        <a href="{{ url('admin/staff/edit/'.$staff['id']) }}" class="btn btn-sm btn-warning">Edit</a>
                        @if($staff['status'] == 'Active')
                        <a href="{{ url('admin/staff/change_status/'.$staff['id']) }}"   class="btn btn-sm btn-primary">{{$staff['status']}}</a>
                        @else
                        <a href="{{ url('admin/staff/change_status/'.$staff['id']) }}"   class="btn btn-sm btn-danger">{{$staff['status']}}</a>
                        @endif
                    </td>
                  </tr> 
                 <?php $i++ ?>
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
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>


@endsection