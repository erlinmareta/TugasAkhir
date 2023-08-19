
<!DOCTYPE html>
<html lang="en"
      dir="ltr">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible"
              content="IE=edge">
        <meta name="viewport"
              content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Registrasi</title>

        <!-- Prevent the demo from appearing in search engines -->
        @include('layout.head')
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <!-- Import Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- Import jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Import Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    </head>

    <body class="layout-default layout-login-centered-boxed">

        <div class="layout-login-centered-boxed__form card">
            <div class="d-flex flex-column justify-content-center align-items-center navbar-light">
                <a  class="navbar-brand flex-column align-items-center mr-0"   >
                    <span >
                       <center><img src="{{ asset('img/register.jpg') }}" alt="logo" width="50%" /></center>
                        </span>
                </a>
                <p class="m-0">Membuat Akun Baru</p>
            </div>

            <div class="page-separator justify-content-center">
            </div>
            @if ($message = Session::get('error'))
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
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @endif
            <form action="/registeruser" method="post">
                @csrf
                <div class="form-group">
                    <label class="text-label" for="name">Nama:</label>
                    <div class="input-group input-group-merge">
                        <input id="name" name="name" type="text" class="form-control form-control-prepended">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <span class="far fa-user"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="text-label" for="email">Email:</label>
                    <div class="input-group input-group-merge">
                        <input id="email" name="email" type="email" class="form-control form-control-prepended" placeholder="example@gmail.com">
                        <span class="text-danger">@error('email'){{ $massage }}@enderror</span>
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <span class="far fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="text-label" for="level">Registrasi Sebagai :</label>
                    <div class="input-group input-group-merge">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <span class="far fa-user"></span>
                            </div>
                        </div>
                        <select id="level" name="level" class="form-control form-control-prepended">
                            <option value="">Pilih Level</option>
                            <option value="Mentor">Mentor</option>
                            <option value="Member">Member</option>
                            <!-- Tambahkan option sesuai dengan kebutuhan Anda -->
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="text-label" for="password_2">Password:</label>
                    <div class="input-group input-group-merge">
                        <input id="password"
                               type="password"
                               name="password"
                               required=""
                               class="form-control form-control-prepended"
                               placeholder="Enter your password">
                        <div class="input-group-append">

                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group text-center">
                    <button class="btn btn-primary mb-2"
                            type="submit">Register</button><br>
                    <a class="text-body text-underline"
                       href="{{ url('/login')}}">Sudah Punya Akun? Login</a>
                </div>
            </form>
        </div>

        <!-- jQuery -->

        @include('layout.script')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#togglePassword').on('click', function() {
            var passwordInput = $('#password_2');
            var passwordFieldType = passwordInput.attr('type');

            if (passwordFieldType === 'password') {
                passwordInput.attr('type', 'text');
            } else {
                passwordInput.attr('type', 'password');
            }
        });


    $('#registerBtn').on('click', function (e) {
                var passwordInput = $('#password_2');
                var password = passwordInput.val();

                if (password.length < 8) {
                    e.preventDefault();
                    alert('Password must be at least 8 characters long.');
                }
            });
        });
</script>
    </body>


</html>
