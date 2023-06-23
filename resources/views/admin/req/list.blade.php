@extends('layout/admin')

@section('title','Request List')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Request List</h1>
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

                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>SR No</th>
                                        <th>Customer Name</th>
                                        <th>Product</th>
                                        <th>Request From</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    @foreach($orders as $order)
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{$order->dealer_name}}</td>
                                        <td>{{$order->product_name}}</td>
                                        <td>{{$order->role}}</td>
                                        <td>
                                            <span class="badge badge-warning">Requested</span>
                                        </td>
                                        <td>

                                            <a href="{{ url('admin/order/view/'.$order->order_id) }}"
                                                class="btn btn-sm btn-primary">View</a>
                                           
                                            <a href="{{ url('admin/request/approve/'.$order->id) }}"
                                                class="btn btn-sm btn-success" title="Approve Request" onclick="return confirm('Are you sure you want approve this request?')">
                                                <i class="fa fa-check"></i>
                                            </a>
                                           
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
