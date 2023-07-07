
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
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
          <div class="breadcrumb-item"><a href="#">Forms</a></div>
          <div class="breadcrumb-item">Form Tambah Admin</div>
        </div>
      </div>

      <div class="section-body">
        <h2 class="section-title">Form Tambah Admin</h2>
        <div class="row">
          <div class="col-12 col-md-6 col-lg-6">
            <div class="card">
              <form action="/admin/akun/store" method="post">
                @csrf
                <div class="card-header">
                  <h4>Data</h4>
                </div>
                <div class="card-body">
                  <div class="form-group">
                    <label>Nama</label>
                    <input class="form-control" type="text" name="name" id="name">
                  </div>
                  <div class="form-group">
                    <label>Email</label>
                    <input class="form-control" type="email" name="email" id="email">
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input class="form-control" type="password" name="password" id="password">
                  </div>
                  <div class="form-group mb-0">
                    <label for="level">Level</label>
                    <select class="form-control"  id="level" name="level">
                        <option value="Admin">Admin</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>TempatLahir</label>
                    <input class="form-control" type="text" name="tempat_lahir" id="tempat_lahir">
                  </div>
                <div class="form-group">
                    <label>Tanggal Lahir</label>
                    <input class="form-control" type="date" name="tanggal_lahir" id="tanggal_lahir">
                  </div>
                <div class="form-group mb-0">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <select id="jenis_kelamin" name="jenis_kelamin" class="form-control">
                        <option value="Perempuan">Perempuan</option>
                        <option value="Laki-Laki">Laki - Laki</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Pekerjaan</label>
                    <input class="form-control" type="text" name="pekerjaan" id="pekerjaan">
                  </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <input class="form-control" type="text" name="alamat" id="alamat">
                  </div>
                <div class="form-group">
                    <label>Nomor Telepon</label>
                    <input class="form-control" type="text" name="nomor_telepon" id="nomor_telepon">
                  </div>
                  <div class="form-group">
                    <label>Deskripsi</label>
                    <input class="form-control" type="text" name="deskripsi" id="deskripsi">
                  </div>
                  <div class="form-group">
                    <label>Foto</label>
                    <input class="form-control" type="file" name="foto" id="foto" accept="image/*>
                  </div>
                <div class="card-footer text-right">
                  <button class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>

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

</body>
</html>
