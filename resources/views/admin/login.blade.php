<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Log in</title>

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
      <div class="card-body login-card-body">
        <p class="login-box-msg">Sign in to start your session</p>

        <form action="{{ route('admin.auth') }}" method="post" autocomplete="off">
          @csrf
          <div class="my-3">
            <div class="input-group">
              <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="Email">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-envelope"></span>
                </div>
              </div>
            </div>
            @error('email')
            <p class="text-danger">{{ $message }}</p> 
            @enderror
          </div>
          <div class="my-3">
            <div class="input-group">
              <input type="password" name="password" class="form-control" placeholder="Password" autocomplete="off">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div>
            @error('password')
            <p class="text-danger">{{ $message }}</p> 
            @enderror
          </div>

          <div class="row px-2">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
        </form>
        <p class="mb-0">
          <a href="{{url('admin/register')}}" class="text-center">Register a new member</a>
        </p>
      </div>
      <!-- /.login-card-body -->
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