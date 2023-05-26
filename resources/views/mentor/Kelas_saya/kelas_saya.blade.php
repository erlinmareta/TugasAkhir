
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
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Basic Table</h4>
                  <a href="{{ url('mentor/kelas/tambah') }}" class="btn btn-light">Tambah</a>
                  </p>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <?php $no=1; ?>
                          <th>No</th>
                          <th>Judul</th>
                          <th>Gambar</th>
                          <th>Deskripsi</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                            @foreach ($kelas as $item )
                            <td>{{ $no++ }}</td>
                            <td>{{$item->judul}}</td>
                            <td><img src="{{ url('/storage/' .$item->gambar)}}"         ></td>
                            <td>{{$item->deskripsi}}</td>
                            <td>{{$item->status}}</td>
                            <td>
                                <a class="btn btn-sm btn-success-outline" href="{{ url('mentor/kelas_saya/detail/' .$item->id) }}" title="detail"><span class="fa fa-edit"></span> Detail |</a>
                                <a class="btn btn-sm btn-success-outline" href="{{ url('mentor/' .$item->id) }}" title="publish"><span class="fa fa-trash"></span> Publish |</a>
                            </td>
                        </tr>
                      </tbody>
                      @endforeach
                    </table>
                  </div>
                </div>
              </div>
            </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  @include('mentor.layout.script')
  <!-- End custom js for this page-->
</body>

</html>

