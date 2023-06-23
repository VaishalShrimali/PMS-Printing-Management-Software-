@extends('layout/staff')

@section('title','Order List')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Order List</h1>
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
                            <a href="{{ url('staff/order/create') }}" class="btn btn-primary">Add Order</a>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>SR No</th>
                                        <th>Customer Name</th>
                                        <th>Product</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    @foreach($order as $order)
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{$order->dealer_name}}</td>
                                        <td>{{$order->product_name}}</td>
                                        <td>@if($order->status == 'Pending')
                                                <span class="badge badge-danger">{{$order->status}}</span>
                                                <!-- <button class="btn btn-danger btn-sm">{{$order->status}}</button> -->
                                            @endif

                                            @if($order->status == 'Completed')
                                                <span class="badge badge-success">{{$order->status}}</span>
                                                <!-- <button class="btn btn-danger btn-sm">{{$order->status}}</button> -->
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ url('staff/order/edit/'.$order->order_id) }}" class="btn btn-sm btn-warning">Edit</a>
                                            <a href="{{ url('staff/order/view/'.$order->order_id) }}" class="btn btn-sm btn-primary">View</a>
                                            <!-- <a href="{{ url('staff/order/delete/'.$order->order_id) }}" onclick="return confirm('Are you sure you want to delete this user?')" class="btn btn-sm btn-danger">Delete</a> -->
                                            <a href="{{ url('staff/order/pdf/'.$order->order_id) }}" class="btn btn-sm btn-secondary">PDF</a>
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