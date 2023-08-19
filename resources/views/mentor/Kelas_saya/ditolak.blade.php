
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Dashboard Mentor</title>
    @include('mentor.layout.head')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        /* Pagination Styles */
        .pagination-container {
            margin-top: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .pagination {
            display: flex;
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .pagination li {
            margin: 0 2px;
        }

        .pagination li a,
        .pagination li span {
            display: block;
            padding: 6px 12px;
            text-decoration: none;
            color: #333;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        .pagination li a:hover {
            background-color: #f5f5f5;
        }

        .pagination li.active span {
            background-color: #007bff;
            color: #fff;
            border-color: #007bff;
        }

        .pagination li.disabled span {
            color: #ddd;
        }

        /* Optional: Center the pagination on small screens */
        @media (max-width: 576px) {
            .pagination-container {
                justify-content: center;
            }
        }
    </style>
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
                                <h4 class="card-title">Data Kelas</h4>
                                <form action="{{ url('mentor/kelas_saya/ditolak') }}" method="get" class="form-inline">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="search" placeholder="Search">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
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
                          @foreach ($kelas as $item )
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{$item->judul}}</td>
                            <td>{{$item->kategori->nama}}</td>
                            <td><img src="{{ url('/storage/' .$item->gambar)}}"></td>
                            <td> {!! $item->deskripsi !!}</td>
                            <td>
                                @if ($item->status === 'sukses')
                                    <label class="badge badge-success">{{ $item->status }}</label>
                                @elseif ($item->status === 'proses')
                                    <label class="badge badge-primary">{{ $item->status }}</label>
                                @elseif ($item->status === 'cancel')
                                    <label class="badge badge-danger">{{ $item->status }}</label>
                                @else
                                    <label class="badge badge-secondary">{{ $item->status }}</label>
                                @endif
                            </td>
                            <td>
                                    <a class="btn btn-sm btn-success-outline" href="{{ url('mentor/kelas/detail/' .$item->id) }}" title="Detail">
                                        <i class="fas fa-info-circle"></i> Detail
                                    </a>
                                    <a class="btn btn-sm btn-success-outline">
                                        <i class="fas fa-info-circle" data-toggle="modal" data-target="#myModal{{ $item->id }}s" ></i> Info
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    @endforeach
                    </table>
                  </div>
                  <div class="pagination-container">
                    <ul class="pagination">
                        <!-- Anggap $kelas adalah objek pagination dari controller -->
                        {!! $kelas->links('pagination.bootstrap-4') !!}
                    </ul>
                </div>
            </div>
        </div>
    </div>
    @foreach ($kelas as $item)
    <div class="modal" tabindex="-1" id="myModal{{ $item->id }}s">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{$item->judul}}</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Alasan : {{$item->alasan}}</p>

            </div>
            <div class="modal-footer">
            </div>
          </div>
        </div>
    </div>
    @endforeach
</div>

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
