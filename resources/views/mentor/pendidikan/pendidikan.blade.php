
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Dashboard Mentor | Riwayat Pendidikan</title>
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
            <h4 class="card-title">Informasi Data Riwayat Pendidikan</h4>
            <form class="form-horizontal" action="{{url('/mentor/profil')}}" method="post" enctype="multipart/form-data">
                @method('put')
                @csrf
              <div class="form-group">
                <label for="exampleInputName1">Sekolah Dasar - SD</label>
                <input type="text" name="sd"  class="form-control" id="sd" placeholder="Masukkan nama Sekolah Dasar" value="{{ old('sd', Auth::user()->sd) }}">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail3">Sekolah Menengah Pertama - SMP</label>
                <input type="text" name="smp" class="form-control" id="smp" placeholder="Masukkan nama Sekolah Menengah Pertama" value="{{ old('smp', Auth::user()->smp) }}">
              </div>
              <div class="form-group">
                <label for="exampleInputCity1">Sekolah Menengan Atas - SMA</label>
                <input type="text" name="sma" class="form-control" id="sma" placeholder="Masukkan nama Sekolah Menengah Atas" value="{{ old('sma', Auth::user()->sma) }}">
              </div>
              <div class="form-group">
                <label for="exampleInputCity1">Diploma 1 - D1</label>
                <input type="text" name="d1" class="form-control" id="d1" placeholder="Masukkan Pendidikan Diploma 1" value="{{ old('d1', Auth::user()->d1) }}">
              </div>
              <div class="form-group">
                <label for="exampleInputCity1">Diploma 2 - D2</label>
                <input type="text" name="d2" class="form-control" id="d2" placeholder="Masukkan Pendidikan Diploma 2" value="{{ old('d2', Auth::user()->d2) }}">
              </div>
              <div class="form-group">
                <label for="exampleInputCity1">Diploma 3 - D3</label>
                <input type="text" name="d3" class="form-control" id="d3" placeholder="Masukkan Pendidikan Diploma 3" value="{{ old('d3', Auth::user()->d3) }}">
              </div>
              <div class="form-group">
                <label for="exampleInputCity1">Diploma 4/S1</label>
                <input type="text" name="d4" class="form-control" id="d4" placeholder="Masukkan Pendidikan Diploma 4" value="{{ old('d4', Auth::user()->d4) }}">
              </div>
              <div class="form-group">
                <label for="exampleInputCity1">S2</label>
                <input type="text" name="s2" class="form-control" id="s2" placeholder="Masukkan Pendidikan Pascasarjana" value="{{ old('s2', Auth::user()->s2) }}">
              </div>
              <div class="form-group">
                <label for="exampleInputCity1">S3</label>
                <input type="text" name="s3" class="form-control" id="s3" placeholder="Masukkan Pendidikan Doctor" value="{{ old('s3', Auth::user()->s3) }}">
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


