
<!DOCTYPE html>
<html lang="en"
      dir="ltr">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible"
              content="IE=edge">
        <meta name="viewport"
              content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Forgot Password</title>
        <script
			  src="https://code.jquery.com/jquery-3.7.0.js"></script>


        <!-- Prevent the demo from appearing in search engines -->
        @include('layout.head')

    </head>

    <body class="layout-default layout-login-centered-boxed">

        <div class="layout-login-centered-boxed__form card">
            <div class="d-flex flex-column justify-content-center align-items-center mb-5 navbar-light">
                <a class="navbar-brand flex-column mb-2 align-items-center mr-0" style="min-width: 0">
                    <span >
                        <center><img src="{{ asset('img/login.jpg') }}" alt="logo" width="50%" /></center>
                    </span>
                </a>
                <p class="m-0">Form Lupa Password</p>
            </div>

            @if ($message = Session::get('error'))
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @endif
        @if ($message = Session::get('info'))
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @endif
        @if ($message = Session::get('fail'))
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @endif
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                {{ $message }}
            </div>
        @endif
            <form action="{{ url('/forgot')}}" method="post">
                @csrf
                <div class="form-group">
                    <label class="text-label"
                           for="email_2">Email:</label>
                    <div class="input-group input-group-merge">
                        <input id="email" name="email" type="email" class="form-control form-control-prepended" placeholder="example@gmail.com">
                        <p>Ketik email anda dan kami akan kirim link untuk mengubah password anda</p>
                        @error('email')
                        <label for="email" class="text-danger">{{ $message}}</label>
                    @enderror
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <span class="far fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <button class="btn btn-block btn-primary"
                            type="submit">Kirim link lupa password</button>
                </div>
                <div class="form-group text-center">
                    <a href="{{ url('/login')}}">Login</a> <br>

                </div>

            </form>
        </div>

        <!-- jQuery -->
        @include('layout.script')
    </body>

</html>
