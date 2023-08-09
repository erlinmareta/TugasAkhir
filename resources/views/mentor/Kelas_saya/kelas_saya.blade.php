
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Dashboard Mentor</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Data Kelas Publish</h4>
                        <form action="{{ url('mentor/kelas/kelas') }}" method="get" class="form-inline">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <?php $no=1; ?>
                          <th>No</th>
                          <th>Judul</th>
                          <th>Gambar</th>
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
                            <td><label class="badge badge-secondary">{{$item->status}}</label></td>
                            <td>
                                <a class="btn btn-sm btn-success-outline" href="{{ url('mentor/kelas_saya/detail/' .$item->id) }}" title="detail">
                                    <i class="fa fa-eye"></i> Detail
                                </a>

                                @if ($item["status"] == "sukses" || $item["status"] == "proses")

                                @else
                                <a class="btn btn-sm btn-success-outline" href="#" title="publish" onclick="publishConfirmation('{{ route('mentor.kelas_saya.publish', $item->id) }}')">
                                    <span class="badge badge-info">Publish</span>
                                </a>
                                @endif
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
  <script>
    function publishConfirmation(url) {
        Swal.fire({
            title: "Konfirmasi Publish",
            text: "Apakah anda yakin untuk menerbitkan kelas ini, apakah materi yang diinputkan sudah sesuai?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Iya, publish sekarang!",
            cancelButtonText: "Cancel",
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = url;
            }
        });
    }
</script>








  @include('sweetalert::alert')
  <!-- End custom js for this page-->
</body>

</html>

