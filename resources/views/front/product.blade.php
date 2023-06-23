@extends('layout/frontend')

@section('content')
<!-- Page Banner Start -->
<!-- <section class="page-banner bgs-cover text-white pt-65 pb-75" style="background-image: url(assets/images/banner.jpg);">
    <div class="container">
        <div class="banner-inner">
            <h2 class="page-title wow fadeInUp delay-0-2s">Project Details</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb wow fadeInUp delay-0-4s">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Project Details</li>
                </ol>
            </nav>
        </div>
    </div>
</section> -->
<!-- Page Banner End -->


<!-- Project Details Area start -->
<section class="project-details-area pt-130 rpt-120">
    <div class="container">
        <div class="row ">
            <div class="col-lg-7">
                <div class="content mb-75 wow fadeInUp delay-0-2s">
                    <form id="orderForm" action="{{route('forder.insert')}}" name="orderForm" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row mt-25">
                            <div class="col-sm-12">
                                <label for="dealer_name">Customer Name</label>
                                <input type="text" id="dealer_name" name="dealer_name" class="form-control" value="" data-error="Please enter your name" required>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="col-sm-12">
                                <label for="product">Product</label>
                                <select class="form-control" name="product" id="product">
                                    <option selected="" disabled="" readonly>Product :</option>
                                    @foreach($prdcts as $prdct)
                                    <option value="{{$prdct->product_id}}">{{$prdct->product_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div id="orderDetail" class="col-md-12 row  <?= $login == true ? '' : 'd-none' ?>">
                                <div class="col-sm-4">
                                    <label for="height">Height</label>
                                    <input type="text" id="height" name="height" required class="form-control" value="">
                                </div>
                                <div class="col-sm-4">
                                    <label for="width">Width</label>
                                    <input type="text" id="width" name="width" required class="form-control" value="">
                                </div>

                                <div class="col-sm-4">
                                    <label for="name">Length</label>
                                    <input type="text" class="form-control @error('Length') is-invalid @enderror" name="Length" value="" id="Length" onkeypress="return event.charCode >= 48 && event.charCode <= 57" minlength="1" maxlength="11">
                                </div>

                                <div class="col-sm-4">
                                    <label for="name">Area</label>
                                    <input type="text" class="form-control @error('area') is-invalid @enderror" name="area" value="" id="area" onkeypress="return event.charCode >= 48 && event.charCode <= 57" minlength="1" maxlength="11" onclick=getarea()>

                                </div>

                                <div class="col-sm-4">
                                    <label for="quantity">Quantity</label>
                                    <input type="text" id="quantity" name="quantity" required class="form-control" value="">
                                </div>

                                <div class="col-md-4">
                                    <label for="name">Total Area</label>
                                    <input type="text" class="form-control " name="total_area" value="" id="total_area"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" minlength="1" maxlength="11" onclick=get_total_area()>
                                </div>


                                <div class="col-sm-4">
                                    <label for="lamination">Measurement</label>
                                    <select class="form-control" name="measurement" id="measurement" required>
                                        <option value="" disabled="" selected="">Select Measurement</option>
                                        <option value="inch">inch</option>
                                        <option value="cm">cm</option>
                                        <option value="mm">mm</option>
                                        <option value="pieces">pieces</option>
                                    </select>
                                </div>

                                <div class="col-sm-4">
                                    <label for="name">Rate</label>
                                    <input type="text" class="form-control @error('rate') is-invalid @enderror" name="rate" value="" id="rate" onkeypress="return event.charCode >= 48 && event.charCode <= 57" minlength="1" maxlength="11">

                                </div>



                                <div class="col-sm-4">
                                    <label for="name">Total Amount</label>
                                    <input type="text" class="form-control @error('total') is-invalid @enderror" name="total" value="" id="total" onkeypress="return event.charCode >= 48 && event.charCode <= 57" minlength="1" maxlength="11" onclick="gettotal()">

                                </div>

                                <div class="col-sm-4">
                                    <label for="printing">Printing</label>
                                    <select class="form-control" name="printing" id="printing" required>
                                        <option value="" disabled selected>Select Printing</option>
                                        <option value="Solvent Printing">Solvent Printing</option>
                                        <option value="Desolvent Printing">Desolvent Printing</option>
                                        <option value="HP Latex">HP Latex</option>
                                        <option value="Digital Printing">Digital Printing</option>
                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <label for="cutting">Cutting</label>
                                    <select class="form-control" name="cutting" id="cutting" required>
                                        <option value="" disabled="" selected="">Select Cutting</option>
                                        <option value="Laser Cutting">Laser Cutting</option>
                                        <option value="Router Cutting">Router Cutting</option>
                                        <option value="Plotter Cutting">Plotter Cutting</option>
                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <label for="lamination">Lamination</label>
                                    <select class="form-control" name="lamination" id="lamination" required>
                                        <option value="" disabled="" selected="">Select Lamination</option>
                                        <option value="16inch lamination">16inch lamination</option>
                                        <option value="18inch lamination">18inch lamination</option>
                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <label for="pasting">Pasting</label>
                                    <select class="form-control" name="pasting" id="pasting" required>
                                        <option value="" selected disabled>Select Pasting</option>
                                        <option value="Subboard Pasting">Subboard Pasting</option>
                                        <option value="Paper Pasting">Paper Pasting</option>
                                        <option value="Cardboard Pasting">Cardboard Pasting</option>
                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <label for="subject">Installation </label>
                                    <select class="form-control" name="installation" id="installation" required>
                                        <option value="" selected disabled>Select Installation</option>
                                        <option value="Side Installation">Site Installation</option>
                                        <option value="Outside Installation">Outside Installation</option>
                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <label for="delivery">Delivery</label>
                                    <select class="form-control" name="delivery" id="delivery" required>
                                        <option value="" selected disabled>Select Delivery</option>
                                        <option value="Home">Home</option>
                                        <option value="Office">Office</option>
                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <label for="phone">Order Mode</label>
                                    <input type="text" id="order_mode" name="order_mode" class="form-control" readonly value="B2C">
                                </div>
                                <div class="col-sm-4">
                                    <label for="email">Email</label>
                                    <input type="email" id="email" name="email" class="form-control" required value="">
                                </div>
                                <div class="col-sm-4">
                                    <label for="contact">Contact</label>
                                    <input type="text" id="contact" name="contact" required minlength="7" maxlength="12" class="form-control" value="">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="name">Image</label>
                                    <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="" id="image">
                                    @error('image')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-sm-6">
                                    <label for="address">Address</label>
                                    <textarea name="address" id="address" class="form-control" rows="2" data-error="Please enter your address"></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <input type="hidden" name="subcatid" value="{{$subcatid}}">
                            <div class="col-sm-12 mt-2">
                                <div class="form-group mb-0">
                                    <button type="submit" id="submitBtn" class="theme-btn">Send
                                        Message <i class="fas fa-arrow-right"></i></button>
                                    <div id="msgSubmit" class="hidden"></div>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
            <div class="col-lg-5">
                <!-- <div class="project-description wow fadeInDown delay-0-2s"> -->
                <!-- <div class="image mb-35 wow fadeInUp delay-0-2s animated" style="visibility: visible; animation-name: fadeInUp;"> -->
                <img id="product_img" src="/front_assets/images/services/service-details.jpg" alt="Service Details">
                <!-- </div> -->
                <!-- </div> -->
            </div>
        </div>

    </div>
</section>
<input type="hidden" id="logged" value="{{$login}}">
<input type="hidden" id="csrfToken" value="{{csrf_token()}}">
<!-- Project Details Area End -->
@endsection
@section('js')
<script>
    $('#submitBtn').click(function(e) {
        let logged = $('#logged').val();
        if (!logged) {
            e.preventDefault();
            $('.menu-sidebar button').click();
        } else {
            $('#orderForm').validate();
        }
    });
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'x-csrf-token': $('#csrfToken').val()
            }
        })
    })
    $('#loginBtnSmbt').click(function() {
        // alert();
        $("#apntmentForm").validate();
        let email = $('#loginEmail').val();
        let pass = $('#loginPassword').val();
        if ($("#apntmentForm").valid()) {
            $.ajax({
                url: "{{url('/login/auth')}}",
                type: "POST",
                data: {
                    email: email,
                    pass: pass
                },
                success: function(data) {
                    console.log(data.icon);
                    var Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    });
                    Toast.fire({
                        icon: data.icon,
                        title: '&nbsp;' + data.msg
                    });
                    if (data.icon == 'success') {
                        $('#logged').val(true)
                        $('.menu-sidebar button').click();
                        $('#orderDetail').removeClass('d-none')
                    }

                }
            })
        }
    });
    $('#product').change(function() {
        // alert()
        let product = $(this).val();
        $.ajax({
            url: "{{url('/product')}}" + "/" + product,
            type: "GET",
            success: function(data) {
                let img = data.image.trim();
                $('#product_img').attr("src", "{{url('/uploads/product/')}}" + "/" + img);
            }
        })
    })
</script>


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
        } else{
            area = width * length * height;
            $('#area').val(area)
        }
    }

    function get_total_area(){
        let area = Number($('#area').val());
        let qty = Number($('#quantity').val());
        
        if(area == 0 || qty == 0){
            let total_area = 0;
            $('#total_area').val(total_area);
        }else{
            let total_area = area * qty;
            $('#total_area').val(total_area);
        }
    }

    function gettotal(){
        
        let rate = Number($('#rate').val());
        let total_area = Number($('#total_area').val());

        
        $('#total').val(total);
        if(rate == 0 || total_area == 0){
            let total_amound = 0;
            $('#total').val(total_amound);
        }else{
            let total_amound = total_area * rate;
            $('#total').val(total_amound);
        }

    }
</script>
@endsection