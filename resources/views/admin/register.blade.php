<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('admin_assets/plugins/fontawesome-free/css/all.min.css')  }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('admin_assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')  }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('admin_assets/dist/css/adminlte.min.css')  }}">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{ asset('admin_assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
        <img src="{{ asset('front_assets/images/logo.png') }}" alt="" srcset="" height="70" width="140">
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body register-card-body">
                <p class="login-box-msg">Register a new member</p>

                <form action="{{route('admin.register')}}" method="post">
                    @csrf
                    <div class="col-md-12">

                        <div>
                            <input type="text" name="name" class="form-control" value="{{old('name')}}" placeholder="Name">

                        </div>
                        @error('name')
                        <span class="text-danger">{{$message}}</span>
                        @enderror

                        <!-- <div class="col-md-6">
                            <div>
                                <input type="text" name="surname" class="form-control" value="{{old('surname')}}" placeholder="Surname">
                            </div>
                            @error('surname')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div> -->
                    </div>

                    <!-- <div class="col-md-12 row">
                        <div class="col-md-6">
                            <div class="mt-3">
                                <input type="text" name="state" class="form-control" value="{{old('state')}}" placeholder="State">
                            </div>
                            @error('state')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <div class="mt-3">
                                <input type="text" name="city" class="form-control" value="{{old('city')}}" placeholder="City">
                            </div>
                            @error('city')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div> -->
                    <div class="col-md-12">
                        <!-- <div class="col-md-6">
                            <div class="mt-3">
                                <input type="text" name="phone" class="form-control" value="{{old('phone')}}" placeholder="Phone">

                            </div>
                            @error('phone')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div> -->

                        <div class="mt-3">
                            <input type="email" name="email" class="form-control" value="{{old('email')}}" placeholder="Email">

                        </div>
                        @error('email')
                        <span class="text-danger">{{$message}}</span>
                        @enderror

                    </div>
                    <div class="col-md-12">
                        <div class="mt-3">
                            <input type="password" name="password" class="form-control" value="{{old('password')}}" placeholder="Password">

                        </div>
                        @error('password')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="row px-2 mt-3">
                        <button type="submit" class="btn btn-primary btn-block">Register</button>
                    </div>
                </form>
                <a href="{{url('/admin/login')}}" class="text-center">I already have a Account</a>
            </div>
        </div>
        <!-- /.login-box -->

        <!-- jQuery -->
        <script src="{{ asset('admin_assets/plugins/jquery/jquery.min.js')  }}"></script>
        <!-- Bootstrap 4 -->
        <script src="{{ asset('admin_assets/plugins/bootstrap/js/bootstrap.bundle.min.js')  }}"></script>
        <!-- AdminLTE App -->
        <script src="{{ asset('admin_assets/dist/js/adminlte.min.js')  }}"></script>
        <!-- SweetAlert2 -->
        @if(session("msg"))
        <script src="{{ asset('admin_assets/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
        <script>
            var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });
            Toast.fire({
                icon: '{{ session("icon") }}',
                title: '&nbsp;{{ session("msg") }}'
            });
        </script>
        @endif
</body>

</html>