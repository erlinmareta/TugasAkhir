
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Dashboard Mentor</title>
    @include('mentor.layout.head')
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    @include('mentor.layout.navbar')
    <!-- partial -->

    <div class="container-fluid page-body-wrapper">

      <!-- partial:partials/_settings-panel.html -->
      @include('mentor.layout.setting')

        </div>
      </div>
      <!-- partial -->

      <!-- partial:partials/_sidebar.html -->
      @include('mentor.layout.sidebar')

      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
      <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Informasi Data Diri</h4>
            <form class="form-horizontal" action="{{url('/mentor/profil')}}" method="post" enctype="multipart/form-data">
                @method('put')
                @csrf
                @if (Auth::user()->foto == null)
                @else
                <input type="hidden" name="gambarLama" value="{{ Auth::user()->foto }}">
                @endif
              <div class="form-group">
                <label for="exampleInputName1">Nama Lengkap</label>
                <input type="text" name="name"  class="form-control" id="name" placeholder="Nama Lengkap" value="{{ old('name', Auth::user()->name) }}">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail3">Email</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="Email" value="{{ old('email', Auth::user()->email) }}">
              </div>
              {{-- <div class="form-group">
                <label for="exampleInputPassword4">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword4" placeholder="Password" value="{{ old('password', Auth::user()->password) }}">
              </div> --}}
              <div class="form-group">
                <label for="exampleSelectGender">Gender</label>
                  <select name="jenis_kelamin" class="form-control" id="jenis_kelamin">
                    <option selected>Pilih jenis kelamin</option>
                            <option value="Laki-Laki" {{Auth::user()->jenis_kelamin=="Laki-Laki"?"selected" : ""}}>Laki-Laki</option>
                            <option value="Perempuan" {{Auth::user()->jenis_kelamin=="Perempuan"?"selected" : ""}}>Perempuan</option>
                  </select>
                </div>
              <div class="form-group">
                <label for="exampleInputCity1">Nomor Telepon</label>
                <input type="text" name="nomor_telepon" class="form-control" id="nomor_telepon" placeholder="Nomor Telepon" value="{{ old('nomor_telepon', Auth::user()->nomor_telepon) }}">
              </div>
              <div class="form-group">
                <label for="exampleInputCity1">Alamat</label>
                <input type="text" name="alamat" class="form-control" id="alamat" placeholder="Alamat" value="{{ old('alamat', Auth::user()->alamat) }}">
              </div>
              <div class="form-group">
                <label for="exampleInputCity1">Tempat Lahir</label>
                <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir" placeholder="Tempat Lahir" value="{{ old('tempat_lahir', Auth::user()->tempat_lahir) }}">
              </div>
              <div class="form-group">
                <label for="exampleInputCity1">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" class="form-control" id="tanggal_lahir" value="{{ old('tanggal_lahir', Auth::user()->tanggal_lahir) }}">
              </div>
              <div class="form-group">
                <label for="exampleInputCity1">Pekerjaan</label>
                <input type="text" name="pekerjaan" class="form-control" id="pekerjaan" placeholder="Pekerjaan" value="{{ old('pekerjaan', Auth::user()->pekerjaan) }}">
              </div>
              <div class="form-group">
                <label for="exampleTextarea1">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" class="form-control" id="deskripsi" rows="4" >{{ old('deskripsi', Auth::user()->deskripsi) }}</textarea>
              </div>
              <div class="form-group">
                <label>File upload</label>
                @if (Auth::user()->foto == null)
                 @else
                <img src="{{ url('/storage/'.Auth::user()->foto) }}" alt="foto" width="90px" height="90px">
                @endif
                <br>
                <input type="file" name="foto" id="foto" accept="image/*">
              </div>
              <button type="submit" class="btn btn-primary mr-2">Submit</button>
              <button class="btn btn-light">Cancel</button>
            </form>
          </div>
        </div>
      </div>


    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  @include('mentor.layout.script')

  @include('sweetalert::alert')
  <!-- End custom js for this page-->
</body>

</html>


