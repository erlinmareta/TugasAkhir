
<!DOCTYPE html>
<html lang="en">
<head>

@include('admin.layout.head')

</head>

<body>

{{-- navbar --}}
@include('admin.layout.navbar')

{{-- sidebar --}}
@include('admin.layout.sidebar')

<!-- Main Content -->
<div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Profile</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
          <div class="breadcrumb-item">Profile</div>
        </div>
      </div>
      <div class="section-body">
        <h2 class="section-title">Hi, {{ Auth::user()->name }} !</h2>
        <p class="section-lead">
          Ubah informasi tentang data diri anda pada halaman ini.
        </p>

        <div class="row mt-sm-4">
          <div class="col-12 col-md-12 col-lg-5">
            <div class="card profile-widget">
              <div class="profile-widget-header">
                @if (Auth::user()->foto == null)
                <img src="{{ asset('img/90x90.jpg') }}" alt=""
                style="width: 150px; height:150px"
                class="img-thumbnail rounded-circle mx-auto d-block">
                @else
                <img src="{{ url('/storage/'.Auth::user()->foto) }}" alt=""
                style="width: 150px; height:150px"
                class="img-thumbnail rounded-circle mx-auto d-block">
                @endif
                <div class="profile-widget-items">
                  <div class="profile-widget-item">
                  </div>
                </div>
              </div>
              <div class="profile-widget-description">
                <div class="profile-widget-name">{{ Auth::user()->name }}<div class="text-muted d-inline font-weight-normal">
                    <div class="slash"></div>{{ Auth::user()->pekerjaan }}</div>
                </div>
                {{ Auth::user()->deskripsi }}
              </div>
            </div>
          </div>
          <div class="col-12 col-md-12 col-lg-7">
            <div class="card">
              <form method="post" action="{{url('/admin/profil/index')}}" enctype="multipart/form-data">
                @method('put')
                @csrf
                @if (Auth::user()->foto == null)
                @else
                <input type="hidden" name="gambarLama" value="{{ Auth::user()->foto }}">
                @endif
                <div class="card-header">
                  <h4>Edit Profile</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                      <div class="form-group col-md-6 col-12">
                        <label>Nama</label>
                        <input type="text" name="name" id="name" class="form-control" required="" value="{{ old('name', Auth::user()->name) }}">
                      </div>
                      <div class="form-group col-md-6 col-12">
                        <label>Email</label>
                        <input type="text" name="email" id="email" class="form-control" required="" value="{{ old('email', Auth::user()->email) }}">
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-md-6 col-12">
                        <label for="">jenis kelamin</label>
                        <select class="form-select form-control form-select-sm" aria-label=".form-select-sm example" name="jenis_kelamin">
                            <option selected>Pilih jenis kelamin</option>
                            <option value="Laki-Laki" {{Auth::user()->jenis_kelamin=="Laki-Laki"?"selected" : ""}}>Laki-Laki</option>
                            <option value="Perempuan" {{Auth::user()->jenis_kelamin=="Perempuan"?"selected" : ""}}>Perempuan</option>
                        </select>
                      </div>
                      <div class="form-group col-md-6 col-12">
                        <label>Nomor Telepon</label>
                        <input type="text" name="nomor_telepon" id="nomor_telepon" class="form-control" value="{{ old('nomor_telepon', Auth::user()->nomor_telepon) }}">
                      </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6 col-12">
                          <label>Tempat Lahir</label>
                          <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" required="" value="{{ old('tempat_lahir', Auth::user()->tempat_lahir) }}">
                        </div>
                        <div class="form-group col-md-6 col-12">
                          <label>Tanggal Lahir</label>
                          <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" required="" value="{{ old('tanggal_lahir', Auth::user()->tanggal_lahir) }}">
                        </div>
                      </div>
                      <div class="row">
                        <div class="form-group col-md-6 col-12">
                          <label>Alamat</label>
                          <input type="text" name="alamat" id="alamat" class="form-control" required="" value="{{ old('alamat', Auth::user()->alamat) }}">
                        </div>
                        <div class="form-group col-md-6 col-12">
                          <label>Pekerjaan</label>
                          <input type="text" name="pekerjaan" id="pekerjaan" class="form-control" required="" value="{{ old('pekerjaan', Auth::user()->pekerjaan) }}">
                        </div>
                      </div>
                      <div class="row">
                        <label for="foto">Foto Diri</label><br>
                        @if (Auth::user()->foto == null)
                        @else
                        <img src="{{ url('/storage/'.Auth::user()->foto) }}" alt="foto" width="90px" height="90px">
                        @endif
                        <br>
                        <input type="file" name="foto" id="foto" accept="image/*">
                      </div>
                    <div class="row">
                      <div class="form-group col-12">
                        <label for="exampleInputPassword1" class="form-label">Deskripsi</label>
                                        <input type="text" name="deskripsi" class="form-control"
                                        value="{{ old('deskripsi', Auth::user()->deskripsi) }}">
                      </div>
                    </div>
                <div class="card-footer text-right">
                  <button class="btn btn-primary">Simpan</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

{{-- footer       --}}
@include('admin.layout.footer')
    </div>
  </div>

{{-- script --}}
@include('admin.layout.script')

@include('sweetalert::alert')

</body>
</html>
