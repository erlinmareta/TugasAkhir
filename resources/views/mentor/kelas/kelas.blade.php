
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
                          <th>Kategori</th>
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
                            <td>{{$item->kategori->nama}}</td>
                            <td><img src="{{ url('/storage/' .$item->gambar)}}"></td>
                            <td>{{$item->deskripsi}}</td>
                            <td><label class="badge badge-success">{{$item->status}}</label></td>
                            <td>
                                <a class="btn btn-sm btn-success-outline" href="{{ url('mentor/kelas/edit/' .$item->id) }}" title="Edit"><label class="badge badge-info">Edit |</label></a>
                                <a class="btn btn-sm btn-success-outline" href="{{ url('mentor/hapus/' .$item->id) }}" title="Hapus"><label class="badge badge-warning">Hapus |</label></a>
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

  @include('sweetalert::alert')
  <!-- End custom js for this page-->
</body>

</html>

