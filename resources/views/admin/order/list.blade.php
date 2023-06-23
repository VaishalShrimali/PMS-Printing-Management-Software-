@extends('layout/admin')

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

                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>SR No</th>
                                        <th>Customer Name</th>
                                        <th>Product</th>
                                        <th>Order On</th>
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
                                            @if($order->status == 'Pending')
                                            <span class="badge badge-danger">{{$order->status}}</span>
                                            @endif

                                            @if($order->status == 'Completed')
                                            <span class="badge badge-success">{{$order->status}}</span>
                                            @endif
                                        </td>
                                        <td>

                                            <a href="{{ url('admin/order/view/'.$order->order_id) }}" class="btn btn-sm btn-primary">View</a>
                                            <a href="{{ url('admin/order/delete/'.$order->order_id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this user?')">Delete</a>
                                            @php
                                            $v = \App\Models\OrderManage::where(['forder_id' =>
                                            $order->order_id])->orderBy('id','DESC')->get();
                                            @endphp
                                            @if(count($v) > 0)
                                            @if($v[0]->status == 'Approved')
                                            <button onclick="assignOrder('{{$order->assined}}','{{$v[0]->id}}')" data-toggle="modal" data-target="#modal-default" type="button" class="btn btn-sm btn-warning">Assign</button>
                                            @endif
                                            @else
                                            <button onclick="assignOrder('{{$order->assined}}')" data-toggle="modal" data-target="#modal-default" type="button" class="btn btn-sm btn-warning">Assign</button>
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
<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Assign Order</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('order.assign')}}" method="post">
                @csrf
                <input type="hidden" name="orderId" value="{{$order->order_id}}">
                <input type="hidden" name="oldId" id="oldId">
                <div class="modal-body" id="modalBody">
                    <label for="assignedTo">Assign</label>
                    <select name="assignedTo" id="assignedTo" class="form-control" required></select>
                </div>
                <div class="modal-footer text-right">
                    <button type="submit" class="btn btn-primary">Sumbit</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

@endsection
@section('js')
<script>
    function assignOrder(id, oldid = 0) {
        $('#oldId').val(oldid);
        $.ajax({
            url: "{{url('/admin/order/assign')}}" + '/' + id,
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                $('#assignedTo').html(data.output);
            }
        })
    }
</script>
@endsection