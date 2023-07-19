
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
                  <h4 class="card-title">Data Kelas</h4>
                  </p>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <?php $no=1; ?>
                          <th>No</th>
                          <th>Judul</th>
                          <th>Kategori</th>
                          <th>Total</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($kelas as $item )
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->judul }}</td>
                                <td>{{ $item->kategori->nama}}</td>
                                <td>{{ count($item->subscription) }}</td>
                                <td>
                                    <a class="btn btn-sm btn-success-outline" href="{{ url('mentor/member/member_kelas/' .$item->id. '/student' )}}" title="Hapus"><label class="badge badge-warning">Detail |</label></a>
                                </td>
                            </tr>
                        @endforeach
                      </tbody>
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


