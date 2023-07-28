<!DOCTYPE html>
<html lang="en">

<head>
    <title>Reset Password</title>
    @include('mentor.layout.head')
</head>

<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Ubah Password</h4>
                        <form class="form-horizontal" action="{{url('/mentor/reset_password')}}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail3">Email</label>
                                <input type="email" name="email" class="form-control" id="email"
                                    placeholder="Email" value="{{ old('email', Auth::user()->email) }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputCity1">Password Lama</label>
                                <input type="password" name="password" class="form-control" id="password"
                                    placeholder="Password Lama">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputCity1">Password Baru</label>
                                <input type="password" name="new_password" class="form-control" id="new_password"
                                    placeholder="Password Baru">
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            <button class="btn btn-light">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('mentor.layout.script')

    @include('sweetalert::alert')

</body>

</html>
