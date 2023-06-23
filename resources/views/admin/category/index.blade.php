@extends('layout/admin')

@section('title','Category List')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Category List</h1>
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
              <a href="{{ url('admin/category/create') }}" class="btn btn-primary">Add Category</a>
            </div>
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>SR No</th>
                    <th>Category Name</th>
                    <th>Dispatch Time</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                  @foreach($categorys as $category)
                  <tr>
                    <td>{{$i++}}</td>
                    <td>{{$category->category_name}}</td>
                    <td>{{$category['dispatch_time']}}</td>
                    <td>
                      <button data-toggle="modal" data-target="#modal-default"
                        onclick="viewCategory('{{$category->id}}')" class="btn btn-sm btn-dark" title="View Category">
                        <i class="fas fa-eye"></i> </button>
                      <a href="{{url('admin/category/edit/'.$category['id'])}}" class="btn btn-sm btn-warning"
                        title="Edit Category"> <i class="fas fa-pencil-alt"></i> </a>
                      <a href="{{url('admin/category/delete/'.$category['id'])}}"
                        onclick="return confirm('Are you sure you want to delete this category?')"
                        class="btn btn-sm btn-danger" title="Delete Category"> <i class="fas fa-trash-alt"></i> </a>
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
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Category Details</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="modalBody">

      </div>
      <div class="modal-footer text-right">
        <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

@endsection
@section('js')
<script>
  function viewCategory(id) {
    $.ajax({
      url: "{{url('/admin/category/view')}}" + '/' + id,
      type: 'GET',
      dataType: 'json',
      success: function (data) {
        $('#modalBody').html(`<div class="col-md-12 row">
          <div class="col-md-6"> <span class="font-weight-bold">Category Name</span> :- ${data.category_name}</div>
          <div class="col-md-6"> <span class="font-weight-bold">Dispatch Time</span> :- ${data.dispatch_time}</div>
          <div class="col-md-6 my-2"> <span class="font-weight-bold">Created At</span> :- ${data.date_at}</div>
          <div class="col-md-6 my-2"> <span class="font-weight-bold">Category Image</span> :- <img src="/uploads/category/${data.category_img}" width="100" > <a href="/uploads/category/${data.category_img}" download class="btn btn-dark btn-sm"><i class="fa fa-download"></i></a></div>
        </div>`);
      }
    })
  }
</script>
@endsection