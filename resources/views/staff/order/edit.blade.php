@extends('layout/staff')

@section('title','Edit Order')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Order</h1>
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
                            <a href="{{ url('staff/order') }}" class="btn btn-dark">Order List</a>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('order.update') }}" method="post" autocomplete="off" id="myform" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="update_id" id="update_id" value="{{$order[0]['order_id']}}">
                            <div class="card-body">
                                <div class="col-md-12 row">
                                    <div class="form-group col-md-6">
                                        <label for="name">Dealer Name <span style="color:red;font-weight:bolder;">*</span></label>
                                        <input type="text" class="form-control @error('dealer_name') is-invalid @enderror" name="dealer_name" value="{{old('dealer_name',$order[0]['dealer_name'])}}" id="dealer_name" placeholder="Enter Dealer Name">
                                        @error('dealer_name')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- <div class="form-group col-md-6">
                                        <label for="name">Shop Name <span style="color:red;font-weight:bolder;">*</span></label>
                                        <input type="text" class="form-control @error('shop_name') is-invalid @enderror" name="shop_name" value="{{old('shop_name',$order[0]['shop_name'])}}" id="shop_name" placeholder="Enter Shop Name">
                                        @error('shop_name')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div> -->

                                    <div class="form-group col-md-6">
                                        <label for="name">Address <span style="color:red;font-weight:bolder;">*</span></label>
                                        <!-- <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{old('address')}}" id="address" placeholder="Enter Address"> -->
                                        <textarea name="address" id="address" cols="30" rows="1" class="form-control @error('address') is-invalid @enderror" placeholder="Enter Address"> {{$order[0]['address']}}</textarea>
                                        @error('address')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="name">Product <span style="color:red;font-weight:bolder;">*</span></label>
                                        <!-- <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{old('address')}}" id="address" placeholder="Enter Address"> -->
                                        <select name="product" id="product" class="form-control @error('product') is-invalid @enderror">
                                            <option value="">--Select Product--</option>
                                            @foreach($product as $product)
                                            <option <?php if ($order[0]['product'] == $product['product_id']) {
                                                        echo 'selected';
                                                    } ?> value="{{$product['product_id']}}">{{$product['product_name']}}</option>
                                            @endforeach
                                        </select>
                                        @error('product')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="name">Height <span style="color:red;font-weight:bolder;">*</span></label>
                                        <input type="text" class="form-control @error('height') is-invalid @enderror" name="height" value="{{old('height',$order[0]['height'])}}" id="height" placeholder="Enter Height" onkeypress="return event.charCode >= 48 && event.charCode <= 57" minlength="1" maxlength="11">
                                        @error('height')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="name">Width</label>
                                        <input type="text" class="form-control @error('width') is-invalid @enderror" name="width" value="{{old('width',$order[0]['width'])}}" id="width" placeholder="Enter Width" onkeypress="return event.charCode >= 48 && event.charCode <= 57" minlength="1" maxlength="11">
                                        @error('width')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="name">Length</label>
                                        <input type="text" class="form-control @error('Length') is-invalid @enderror" name="Length" value="{{old('Length',$order[0]['length'])}}" id="Length" placeholder="Enter Length" onkeypress="return event.charCode >= 48 && event.charCode <= 57" minlength="1" maxlength="11">
                                        @error('Length')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="name">Area</label>
                                        <input type="text" class="form-control @error('area') is-invalid @enderror" name="area" value="{{old('area',$order[0]['area'])}}" id="area" placeholder="Area" onkeypress="return event.charCode >= 48 && event.charCode <= 57" minlength="1" maxlength="11" onclick=getarea()>
                                        @error('area')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="name">Quantity</label>
                                        <input type="text" class="form-control @error('quantity') is-invalid @enderror" name="quantity" value="{{old('quantity',$order[0]['quantity'])}}" id="quantity" placeholder="Enter Quantity" onkeypress="return event.charCode >= 48 && event.charCode <= 57" minlength="1" maxlength="11">
                                        @error('quantity')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="name">Total Area</label>
                                        <input type="text" class="form-control @error('total_area') is-invalid @enderror" name="total_area" value="{{old('total_area',$order[0]['total_area'])}}" id="total_area" placeholder="Total Area" onkeypress="return event.charCode >= 48 && event.charCode <= 57" minlength="1" maxlength="11" onclick=get_total_area()>
                                        @error('total_area')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>



                                    <div class="form-group col-md-6">
                                        <label for="name">Measurement Type</label>
                                        <!-- <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{old('address')}}" id="address" placeholder="Enter Address"> -->
                                        <select name="measurement" id="measurement" class="form-control @error('measurement') is-invalid @enderror">
                                            <option value="">--Select Measurement--</option>
                                            <option <?php if ($order[0]['measurement_type'] == 'inch') {
                                                        echo 'selected';
                                                    }  ?> value="inch">inch</option>
                                            <option <?php if ($order[0]['measurement_type'] == 'cm') {
                                                        echo 'selected';
                                                    }  ?> value="cm">cm</option>
                                            <option <?php if ($order[0]['measurement_type'] == 'mm') {
                                                        echo 'selected';
                                                    }  ?> value="mm">mm</option>
                                            <option <?php if ($order[0]['measurement_type'] == 'pieces') {
                                                        echo 'selected';
                                                    }  ?> value="pieces">pieces</option>
                                        </select>
                                        @error('measurement')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="name">Rate</label>
                                        <input type="text" class="form-control @error('rate') is-invalid @enderror" name="rate" value="{{old('rate',$order[0]['rate'])}}" id="rate" placeholder="Enter Rate" onkeypress="return event.charCode >= 48 && event.charCode <= 57" minlength="1" maxlength="11">
                                        @error('rate')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>




                                    <div class="form-group col-md-6">
                                        <label for="name">Total Amount</label>
                                        <input type="text" class="form-control @error('total') is-invalid @enderror" name="total" value="{{old('total',$order[0]['total'])}}" id="total" placeholder="Total Amount" onkeypress="return event.charCode >= 48 && event.charCode <= 57" minlength="1" maxlength="11" onclick="gettotal()">
                                        @error('total')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="name">Printing</label>
                                        <!-- <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{old('address')}}" id="address" placeholder="Enter Address"> -->
                                        <select name="printing" id="printing" class="form-control @error('printing') is-invalid @enderror">
                                            <option value="">--Select Printing--</option>
                                            <option <?php if ($order[0]['printing'] == 'Solvent Printing') {
                                                        echo 'selected';
                                                    } ?> value="Solvent Printing">Solvent Printing</option>
                                            <option <?php if ($order[0]['printing'] == 'Desolvent Printing') {
                                                        echo 'selected';
                                                    } ?> value="Desolvent Prinrting">Desolvent Printing</option>
                                            <option <?php if ($order[0]['printing'] == 'HP Latex') {
                                                        echo 'selected';
                                                    } ?> value="HP Latex">HP Latex</option>
                                            <option <?php if ($order[0]['printing'] == 'Digital Printing') {
                                                        echo 'selected';
                                                    } ?> value="Digital Printing">Digital Printing</option>
                                        </select>
                                        @error('printing')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="name">Cutting</label>
                                        <!-- <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{old('address')}}" id="address" placeholder="Enter Address"> -->
                                        <select name="cutting" id="cutting" class="form-control @error('cutting') is-invalid @enderror">
                                            <option value="">--Select Cutting--</option>
                                            <option <?php if ($order[0]['cutting'] == 'Laser Cutting') {
                                                        echo 'selected';
                                                    } ?> value="Laser Cutting">Laser Cutting</option>
                                            <option <?php if ($order[0]['cutting'] == 'Router Cutting') {
                                                        echo 'selected';
                                                    } ?> value="Router Cutting">Router Cutting</option>
                                            <option <?php if ($order[0]['cutting'] == 'Plotter Cutting') {
                                                        echo 'selected';
                                                    } ?> value="Plotter Cutting">Plotter Cutting</option>
                                        </select>
                                        @error('cutting')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="name">Lamination</label>
                                        <!-- <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{old('address')}}" id="address" placeholder="Enter Address"> -->
                                        <select name="lamination" id="lamination" class="form-control @error('lamination') is-invalid @enderror">
                                            <option value="">--Select Lamination--</option>
                                            <option <?php if ($order[0]['lamination'] == '16inch lamination') {
                                                        echo 'selected';
                                                    } ?> value="16inch lamination">16inch lamination</option>
                                            <option <?php if ($order[0]['lamination'] == '18inch lamination') {
                                                        echo 'selected';
                                                    } ?> value="18inch lamination">18inch lamination</option>
                                        </select>
                                        @error('lamination')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="name">Pasting</label>
                                        <!-- <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{old('address')}}" id="address" placeholder="Enter Address"> -->
                                        <select name="pasting" id="pasting" class="form-control @error('pasting') is-invalid @enderror">
                                            <option value="">--Select Pasting--</option>
                                            <option <?php if ($order[0]['pasting'] == 'Subboard Pasting') {
                                                        echo 'selected';
                                                    } ?> value="Subboard Pasting">Subboard Pasting</option>
                                            <option <?php if ($order[0]['pasting'] == 'Paper Pasting') {
                                                        echo 'selected';
                                                    } ?> value="Paper Pasting">Paper Pasting</option>
                                            <option <?php if ($order[0]['pasting'] == 'Cardboard Pasting') {
                                                        echo 'selected';
                                                    } ?> value="Cardboard Pasting">Cardboard Pasting</option>

                                        </select>
                                        @error('cutting')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="name">Installation</label>
                                        <!-- <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{old('address')}}" id="address" placeholder="Enter Address"> -->
                                        <select name="installation" id="installation" class="form-control @error('installation') is-invalid @enderror">
                                            <option value="">--Select Installation--</option>
                                            <option <?php if ($order[0]['installation'] == 'Side Installation') {
                                                        echo 'selected';
                                                    } ?> value="Side Installation">Side Installation</option>
                                            <option <?php if ($order[0]['installation'] == 'Outside Installation') {
                                                        echo 'selected';
                                                    } ?> value="Outside Installation">Outside Installation</option>
                                        </select>
                                        @error('installation')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="name">Delivery</label>
                                        <!-- <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{old('address')}}" id="address" placeholder="Enter Address"> -->
                                        <select name="delivery" id="delivery" class="form-control @error('delivery') is-invalid @enderror">
                                            <option value="">--Select Delivery--</option>
                                            <option <?php if ($order[0]['delivery'] == 'Home') {
                                                        echo 'selected';
                                                    } ?> value="Home">Home</option>
                                            <option <?php if ($order[0]['delivery'] == 'Office') {
                                                        echo 'selected';
                                                    } ?> value="Office">Office</option>
                                        </select>
                                        @error('delivery')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="name">Order Mode</label>
                                        <input type="text" readonly class="form-control @error('order_mode') is-invalid @enderror" name="order_mode" value="{{$order[0]['order_mode']}}" id="order_mode">
                                        @error('order_mode')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>



                                    
                                    <?php //print_r($image_array); exit(); ?>
                                    <div class="form-group col-md-6">
                                        <label for="name">Image</label>
                                        <input type="file" multiple class="form-control @error('image') is-invalid @enderror" name="image[]" value="" id="">
                                        @error('image')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    @php
                                    $image_arrays = explode("|",$order[0]['image'])
                                    
                                    @endphp             
                                    <div class="form-group col-md-12">
                                    <div class="row">

                                        <?php foreach ($image_arrays as $imgs) {  ?>
                                            <div class="col-md-2">
                                                <img src="{{asset('uploads/order/'.$imgs)}}" alt="" width="100" style=" border-radius: 1px;">
                                            </div>
                                        <?php  } ?>
                                    </div>
                                </div>
                                </div>
                                

                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary" id="submit" value="submit">Submit</button>
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
    function getarea() {
        let height = Number($('#height').val());
        let width = Number($('#width').val());
        let length = Number($('#Length').val());
        let area;

        if (height == 0) {
            area = width * length;
            $('#area').val(area)
        } else if (width == 0) {
            area = height * length;
            $('#area').val(area)
        } else if (length == 0) {
            area = width * height;
            $('#area').val(area)
        } else {
            area = width * length * height;
            $('#area').val(area)
        }
    }

    function get_total_area() {
        let area = Number($('#area').val());
        let qty = Number($('#quantity').val());

        if (area == 0 || qty == 0) {
            let total_area = 0;
            $('#total_area').val(total_area);
        } else {
            let total_area = area * qty;
            $('#total_area').val(total_area);
        }
    }

    function gettotal() {

        let rate = Number($('#rate').val());
        let total_area = Number($('#total_area').val());


        $('#total').val(total);
        if (rate == 0 || total_area == 0) {
            let total_amound = 0;
            $('#total').val(total_amound);
        } else {
            let total_amound = total_area * rate;
            $('#total').val(total_amound);
        }

    }
</script>


@endsection