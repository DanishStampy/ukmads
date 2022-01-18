<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Kodinger">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Reset Password</title>

    {{-- Custom CSS File --}}
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/css/my-login.css">

    {{-- Font Awesome 5 --}}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
        integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">

    {{-- Icon --}}
    <link rel="icon" href="{{ asset('img/ukmads-logo-background.png') }}" type="image/x-icon">

</head>

<body class="my-login-page">

    <section class="h-100">
        <div class="container h-100">
            @if($errors->any())
                <div class="row justify-content-center align-items-center fixed-top">
                    <div class="col-8 alert alert-danger alert-dismissible fade show my-3">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h5><i class="icon fas fa-ban"></i> Alert!</h5>
                        @foreach($errors->all() as $err)
                            <li class="">{{ $err }}</li>
                        @endforeach
                    </div>
                </div>

            @endif
            <div class="row justify-content-center align-items-center h-100">

                <div class="card-wrapper">

                    <div class="home-link"><a class="link" href="{{ url('/') }}"><i class="fas fa-arrow-left"></i></a>&nbsp;&nbsp;Home</div>

                    <div class="cardx fat mt-5">
                        <div class="card-body">
                            @if( session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <h4 class="card-title">Forgot Password</h4>
                            <form method="POST" class="my-login-validation" action="{{ route('password.email') }}">
                                @csrf
                                <br>
                                <div class="form_group">
                                    <input id="email" type="text" class="form_input" name="email" placeholder=" "
                                        autofocus value="{{ old('email') }}">
                                    <label for="email" class="form_label">E-Mail Address</label>

                                </div>

                                <div class="form-group m-0">
                                    <button type="submit" id="forgot-password" class="btn btn-block">
                                        Send Password Reset Link
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer">
    </script>
    <script src="/bootstrap/js/popper.js"></script>
    <script src="/bootstrap/js/bootstrap.js"></script>
    <script src="/js/my-login.js"></script>
</body>

</html>

