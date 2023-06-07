<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>AdminLTE 3 | Profile</title>

        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/fontawesome-free/css/all.min.css') }}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('AdminLTE/dist/css/adminlte.min.css') }}">
      </head>
<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Profile</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">Mentor Profile</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="card card-primary card-outline">
            <div class="card-body box-profile">
              <div class="text-center">
                @if (Auth::user()->foto == null)
                <img src="{{ asset('img/90x90.jpg') }}" alt=""
                style="width: 150px; height:150px"
                class="img-thumbnail rounded-circle mx-auto d-block">
                @else
                <img src="{{ url('/storage/'.Auth::user()->foto) }}" alt=""
                style="width: 150px; height:150px"
                class="img-thumbnail rounded-circle mx-auto d-block">
                @endif
              </div>

              <h3 class="profile-username text-center">{{ Auth::user()->name }} </h3>

              <p class="text-muted text-center">{{ Auth::user()->pekerjaan }} </p>

              <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                  <b>Partisipan</b> <a class="float-right">1,322</a>
                </li>
                <li class="list-group-item">
                  <b>Following</b> <a class="float-right">543</a>
                </li>
              </ul>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

          <!-- About Me Box -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Tentang Saya</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <p class="text-muted">{{ Auth::user()->deskripsi }} </p>
              <hr>
              <strong><i class="fas fa-map-marker-alt mr-1"></i>Alamat</strong>
              <p class="text-muted">{{ Auth::user()->alamat }} </p>
              <hr>
              <strong><i class="far fa-file-alt mr-1"></i>Email</strong>
              <p class="text-muted">{{ Auth::user()->alamat }} </p>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="card">
            <div class="card-header p-2">
              <ul class="nav nav-pills">
                <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Activity</a></li>
                <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Edit Profil</a></li>
              </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
              <div class="tab-content">
                <div class="active tab-pane" id="activity">
                  <!-- Post -->
                  <div class="post">
                    <div class="user-block">
                      <img class="img-circle img-bordered-sm" src="../AdminLTE/dist/img/user1-128x128.jpg" alt="user image">
                      <span class="username">
                        <a href="#">Jonathan Burke Jr.</a>
                        <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                      </span>
                      <span class="description">Shared publicly - 7:30 PM today</span>
                    </div>
                    <!-- /.user-block -->
                    <p>
                      Lorem ipsum represents a long-held tradition for designers,
                      typographers and the like. Some people hate it and argue for
                      its demise, but others ignore the hate as they create awesome
                      tools to help create filler text for everyone from bacon lovers
                      to Charlie Sheen fans.
                    </p>
                  </div>
                  <!-- /.post -->

                  <!-- Post -->
                  <div class="post clearfix">
                    <div class="user-block">
                      <img class="img-circle img-bordered-sm" src="../AdminLTE/dist/img/user7-128x128.jpg" alt="User Image">
                      <span class="username">
                        <a href="#">Sarah Ross</a>
                        <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                      </span>
                      <span class="description">Sent you a message - 3 days ago</span>
                    </div>
                    <!-- /.user-block -->
                    <p>
                      Lorem ipsum represents a long-held tradition for designers,
                      typographers and the like. Some people hate it and argue for
                      its demise, but others ignore the hate as they create awesome
                      tools to help create filler text for everyone from bacon lovers
                      to Charlie Sheen fans.
                    </p>
                  </div>
                  <!-- /.post -->

                  <!-- Post -->
                  <div class="post">
                    <div class="user-block">
                    </div>
                    <div class="row mb-3">
                      <div class="col-sm-6">
                      </div>
                      <div class="col-sm-6">
                        <div class="row">
                          <div class="col-sm-6">
                          </div>
                          <div class="col-sm-6">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="settings">
                  <form class="form-horizontal" action="{{url('/mentor/profil')}}" method="post">
                    @method('put')
                    @csrf
                    @if (Auth::user()->foto == null)
                    @else
                    <input type="hidden" name="gambarLama" value="{{ Auth::user()->foto }}">
                    @endif
                    <div class="form-group row">
                      <label for="name" class="col-sm-2 col-form-label">Nama Lengkap</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="name" id="name" placeholder="Nama Lengkap" required="" value="{{ old('name', Auth::user()->name) }}">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                      <div class="col-sm-10">
                        <input type="email" class="form-control" name="email" id="email" placeholder="Email" required="" value="{{ old('email', Auth::user()->email) }}">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputName2" class="col-sm-2 col-form-label">Nomor Telepon</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="nomor_telepon" id="nomor_telepon" placeholder="Nomor Telepon" required="" value="{{ old('nomor_telepon', Auth::user()->nomor_telepon) }}">
                      </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat" required="" value="{{ old('alamat', Auth::user()->alamat) }}">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Tempat Lahir</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" placeholder="Tempat Lahir" required="" value="{{ old('tempat_lahir', Auth::user()->tempat_lahir) }}">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                        <div class="col-sm-10">
                          <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" placeholder="Tanggal Lahir" required="" value="{{ old('tanggal_lahir', Auth::user()->tanggal_lahir) }}">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                        <div class="col-sm-10">
                        <select class="form-select form-control form-select-sm" aria-label=".form-select-sm example" name="jenis_kelamin">
                            <option selected>Pilih jenis kelamin</option>
                            <option value="Laki-Laki" {{Auth::user()->jenis_kelamin=="Laki-Laki"?"selected" : ""}}>Laki-Laki</option>
                            <option value="Perempuan" {{Auth::user()->jenis_kelamin=="Perempuan"?"selected" : ""}}>Perempuan</option>
                        </select>
                      </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Pekerjaan</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="pekerjaan" id="pekerjaan" placeholder="Pekerjaan" required="" value="{{ old('pekerjaan', Auth::user()->pekerjaan) }}">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Deskripsi</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="deskripsi" id="deskripsi" placeholder="Deskripsi" required="" value="{{ old('deskripsi', Auth::user()->deskripsi) }}">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="foto" class="col-sm-2 col-form-label">Foto Diri</label>
                        <div class="col-sm-10">
                            @if (Auth::user()->foto == null)
                            @else
                            <img src="{{ url('/storage/'.Auth::user()->foto) }}" alt="foto" width="90px" height="90px">
                            @endif
                            <br>
                            <input type="file" name="foto" id="foto" accept="image/*">
                        </div>
                      </div>
                    <div class="form-group row">
                      <div class="offset-sm-2 col-sm-10">
                        <button type="submit" class="btn btn-danger">Submit</button>
                      </div>
                    </div>
                  </form>
                </div>
                <!-- /.tab-pane -->
              </div>
              <!-- /.tab-content -->
            </div><!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
  </div>
  <!-- jQuery -->
<script src="{{ asset('AdminLTE/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('AdminLTE/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('AdminLTE/dist/js/demo.js') }}"></script
</body>
</html>
