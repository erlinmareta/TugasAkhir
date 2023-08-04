
<!DOCTYPE html>
<html lang="en"
      dir="ltr">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible"
              content="IE=edge">
        <meta name="viewport"
              content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Reset Password</title>
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
                <p class="m-0">Form Ubah Password</p>
            </div>

            <form action="{{ url('/password/reset')}}" method="post">

                @if ($message = Session::get('fail'))
            <div class="alert alert-danger">
                {{ $message }}
            </div>
            @endif
            @if ($message = Session::get('susscess'))
            <div   div class="alert alert-success">
                {{ $message }}
            </div>
        @endif
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">
                <div class="form-group">
                    <label class="text-label"
                           for="email_2">Email:</label>
                    <div class="input-group input-group-merge">
                        <input id="email" name="email" type="email" class="form-control form-control-prepended" placeholder="example@gmail.com"
                        value="{{ $email ?? old ('email')}}">
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
                    <label class="text-label"
                           for="password_2">Password:</label>
                    <div class="input-group input-group-merge">
                        <input id="password" name="password" type="password" class="form-control form-control-prepended" placeholder="Masukkan Password">
                        @error('password')
                        <label for="password" class="text-danger">{{ $message}}</label>
                        @enderror
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <span class="fa fa-key"></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="text-label"
                           for="password_2">Konfirmasi Password:</label>
                    <div class="input-group input-group-merge">
                        <input id="password_confirmation" name="password_confirmation" type="password" class="form-control form-control-prepended" placeholder="Masukkan Password">
                        @error('password_confirmation')
                        <label for="password_confirmation" class="text-danger">{{ $message}}</label>
                    @enderror
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <span class="fa fa-key"></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <button class="btn btn-block btn-primary"
                            type="submit">Reset</button>
                </div>
                <div class="form-group text-center">
                    Belum Punya Akun? <a class="text-body text-underline"
                       href="{{ url('/login')}}">Login</a>
                </div>
            </form>

        </div>

        <!-- jQuery -->
        @include('layout.script')
    </body>

</html>
