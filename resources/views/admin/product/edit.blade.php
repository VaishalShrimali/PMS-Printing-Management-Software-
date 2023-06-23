@extends('layout/admin')

@section('title','Edit Product')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Product</h1>
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
                            <a href="{{ url('admin/product') }}" class="btn btn-dark">Product List</a>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('product.update') }}" method="post" autocomplete="off">
                            @csrf
                            <input type="hidden" name="update_id" id="update_id" value="{{$product[0]['product_id']}}">
                            <div class="card-body">
                                <div class="col-md-12 row">

                                    <div class="form-group col-md-6">
                                        <label for="name">Product Name<span style="color:red;font-weight:bolder">
                                                *</span></label>
                                        <input type="text" class="form-control @error('product_name') is-invalid @enderror" name="product_name" value="{{old('product_name',$product[0]['product_name'])}}" id="product_name" placeholder="Enter Product Name">
                                        @error('product_name')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="name">Category <span style="color:red;font-weight:bolder">*</span></label>
                                        <select class="form-control @error('category') is-invalid @enderror" name="category" id="category" onchange="fetchSubcat()">
                                            <option disabled>Select Category</option>
                                            @foreach($categorys as $category)
                                                <option value="{{$category['id']}}" <?= ($category['id'] == $product[0]->category) ? 'selected' : '' ?> >{{$category['category_name']}}</option>
                                            @endforeach
                                        </select>
                                        @error('category')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="name">Sub-Category <span style="color:red;font-weight:bolder">*</span></label>
                                        <select class="form-control @error('sub_category') is-invalid @enderror" name="sub_category" id="sub_category">
                                            <option selected disabled>Select Sub-category</option>
                                        </select>
                                        @error('sub_category')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    

                                    <div class="form-group col-md-6">
                                        <label for="name">Size <span style="color:red;font-weight:bolder">
                                                *</span></label>
                                        <select name="size" id="size" class="form-control @error('size') is-invalid @enderror">
                                        <option value="">Select Size</option>
                                            <option <?php if($product[0]['size'] == 'Inches'){ echo 'selected'; }  ?> value="Inches">Inches</option>
                                            <option <?php if($product[0]['size'] == 'Sq ft'){ echo 'selected'; }  ?>  value="Sq ft">Sq ft</option>
                                            <option <?php if($product[0]['size'] == 'Pieces'){ echo 'selected'; }  ?> value="Pieces">Pieces</option>
                                            <option <?php if($product[0]['size'] == 'MM'){ echo 'selected'; }  ?> value="MM">MM</option>


                                        </select>
                                        @error('size')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="name">Height <span style="color:red;font-weight:bolder">
                                                *</span></label>
                                        <input type="text" class="form-control @error('height') is-invalid @enderror" name="height" value="{{old('height',$product[0]['height'])}}" id="height" placeholder="Enter height" onkeypress="return event.charCode >= 48 && event.charCode <= 57" minlength="1" maxlength="11">
                                        @error('height')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="name">Width <span style="color:red;font-weight:bolder">
                                                *</span></label>
                                        <input type="text" class="form-control @error('width') is-invalid @enderror" name="width" value="{{old('width',$product[0]['width'])}}" id="width" placeholder="Enter Width" onkeypress="return event.charCode >= 48 && event.charCode <= 57" minlength="1" maxlength="11">
                                        @error('width')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="name">Area <span style="color:red;font-weight:bolder">
                                                *</span></label>
                                        <input type="text" class="form-control @error('area') is-invalid @enderror" name="area" value="{{old('area',$product[0]['area'])}}" id="area" placeholder="Enter Area" onclick="getarea()" onkeypress="return event.charCode >= 48 && event.charCode <= 57" minlength="1" maxlength="11">
                                        @error('area')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                   

                                    <div class="form-group col-md-6">
                                        <label for="name">Rate <span style="color:red;font-weight:bolder">
                                                *</span></label>
                                        <input type="text" class="form-control @error('rate') is-invalid @enderror" name="rate" value="{{old('rate',$product[0]['rate'])}}" id="rate" placeholder="Enter Rate" onkeypress="return event.charCode >= 48 && event.charCode <= 57" minlength="1" maxlength="11">
                                        @error('rate')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="name">GST <span style="color:red;font-weight:bolder">
                                                *</span></label>
                                        <input type="text" class="form-control @error('gst') is-invalid @enderror" name="gst" value="{{old('gst',$product[0]['gst'])}}" id="gst" placeholder="Enter GST" onkeypress="return event.charCode >= 48 && event.charCode <= 57" minlength="1" maxlength="11">
                                        @error('gst')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="name">Total <span style="color:red;font-weight:bolder">
                                                *</span></label>
                                        <input type="text" class="form-control @error('total') is-invalid @enderror" name="total" value="{{old('total',$product[0]['total'])}}" id="total" placeholder="Enter Total" onclick="getotal()" onkeypress="return event.charCode >= 48 && event.charCode <= 57" minlength="1" maxlength="11">
                                        @error('total')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="name">Min Amount <span style="color:red;font-weight:bolder">
                                                *</span></label>
                                        <input type="text" class="form-control @error('min_amount') is-invalid @enderror" name="min_amount" value="{{old('min_amount',$product[0]['min_amount'])}}" id="min_amount" placeholder="Enter Min Amount" onkeypress="return event.charCode >= 48 && event.charCode <= 57" minlength="1" maxlength="11">
                                        @error('min_amount')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="name">Max Amount <span style="color:red;font-weight:bolder">
                                                *</span></label>
                                        <input type="text" class="form-control @error('max_amount') is-invalid @enderror" name="max_amount" value="{{old('max_amount',$product[0]['max_amount'])}}" id="max_amount" placeholder="Enter Max Amount" onkeypress="return event.charCode >= 48 && event.charCode <= 57" minlength="1" maxlength="11">
                                        @error('max_amount')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>


                                </div>

                                <div class="form-group col-md-6">
                                        <label for="password">Images</label>
                                        <input type="file" class="form-control @error('img') is-invalid @enderror" name="img"   value="{{old('img')}}" id="img" >
                                        @error('img')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror

                                        <img src="{{asset('uploads/product/'.$product[0]['image'])}}" alt="" srcset="" style="width : 100px; height : 100px;">
                                    </div>


                                <div class="col-md-12 row">
                                    <div class="form-group col-md-6">
                                        <label for="password">Special Remark</label>
                                       <textarea name="remark" id="remark" cols="30" rows="5" class="form-control" placeholder="Enter Remark"> {{$product[0]['remark']}} </textarea>
                                      
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
@section('js')
<script>
     function getarea(){
        let height = $('#height').val();
        let width = $('#width').val();
        // alert('hello');
        if(height == ''){
            alert('Enter Height!');
        }

        if(width == ''){
            alert('Enter width!');
        }

        let area = height * width;
        $('#area').val(area);


    }

    function getotal(){
       
        let rate = Number($('#rate').val());
        let gst = $('#gst').val();
        if(rate == ''){
            alert('Enter rate!');
        }
        if(gst == ''){
            alert('Enter gst!');
        }
        let gst_pr = parseFloat( rate * gst/100);
    
        let total =  rate + gst_pr;
        $('#total').val(total);
    }

    function fetchSubcat(){
        let category = $('#category').val();
        let subcat = "{{$product[0]->sub_category}}";
        $.ajax({
            url : "{{ url('/admin/product/fetchSubcate') }}" + "/" + category,
            type : 'GET',
            data:{subcat:subcat},
            dataType: 'json',
            success: function (data) {
                $('#sub_category').html(data.subcategory);
            }
        })
    };
    fetchSubcat();
</script>
@endsection