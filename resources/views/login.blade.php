
<!DOCTYPE html>
<html lang="en"
      dir="ltr">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible"
              content="IE=edge">
        <meta name="viewport"
              content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Login</title>
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
                <p class="m-0">Login Untuk mengakses Aplikasi </p>
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
            <form action="/loginproses" method="get">
                @csrf
                <div class="form-group">
                    <label class="text-label"
                           for="email_2">Email:</label>
                    <div class="input-group input-group-merge">
                        <input autocomplete="off" id="email" name="email" type="email" class="form-control form-control-prepended" placeholder="example@gmail.com"
                        value="{{Session::get('verifiedEmail') ? Session::get('verifiedEmail') : old('email')}}">
                        {{-- <span class="text-danger">@error('email'){{ $massage }}@enderror</span> --}}
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <span class="far fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="text-label"
                           for="password_2">Password:</label>
                    <div class="input-group input-group-merge">
                        <input autocomplete="off" id="password" name="password" type="password" class="form-control form-control-prepended" placeholder="Masukkan Password">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <span class="fa fa-key"></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <span id="captcha-img">
                        {!!captcha_img('math')!!}
                    </span>
                    <button id="reload" class="btn btn-primary reload">&#x21bb;</button>
                </div>
                <div class="form-group">
                    <input autocomplete="off" type="text" id="captcha" name="captcha" placeholder="captcha">
                    @error('captcha')
                        <label for="captcha" class="text-danger">{{ $message}}</label>
                    @enderror
                </div>
                <div class="form-group">
                    <button class="btn btn-block btn-primary"
                            type="submit">Login</button>
                </div>
                <div class="form-group text-center">
                    <a href="{{ url('/forgot')}}">Lupa password?</a> <br>
                    Belum Punya Akun? <a class="text-body text-underline"
                       href="{{ url('/registrasi')}}">Register!</a>
                </div>
            </form>

            <script>
                $('#reload').click(function (e)){
                    e.preventDevault();
                    $.ajax({
                        type:'GET',
                        url: 'reload',
                        succsess:function (res){
                            $('#captcha_img').html(res.captcha);
                        }
                    });
                };
            </script>

        </div>

        <!-- jQuery -->
        @include('layout.script')
    </body>

</html>
