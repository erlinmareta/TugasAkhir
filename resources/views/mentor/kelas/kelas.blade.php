
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Dashboard Mentor</title>
    @include('mentor.layout.head')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
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
                                <form action="{{ url('mentor/kelas/kelas') }}" method="get" class="form-inline">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="search" placeholder="Search">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
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
                            <td style="max-width: 200px; overflow: hidden; white-space: nowrap; text-overflow: ellipsis;">
                                {{ $item->deskripsi }}
                            </td>
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
                                @if ($item["status"] == "sukses" || $item["status"] == "proses")
                                <a class="btn btn-sm btn-success-outline" href="{{ url('mentor/kelas/detail/' .$item->id) }}" title="Tambah"><label class="badge badge-info"> + Detail |</label></a>
                                @else
                                <a class="btn btn-sm btn-success-outline" href="{{ url('mentor/kelas/add_materi/' .$item->id) }}" title="Tambah"><label class="badge badge-info"> + Tambah |</label></a>
                                <a class="btn btn-sm btn-success-outline" href="{{ url('mentor/kelas/detail/' .$item->id) }}" title="Tambah"><label class="badge badge-info"> + Detail |</label></a>
                                <a class="btn btn-sm btn-success-outline" href="{{ url('mentor/kelas/edit/' .$item->id) }}" title="Edit"><label class="badge badge-info">Edit |</label></a>
                                <a class="btn btn-sm btn-success-outline" href="{{ url('mentor/hapus/' .$item->id) }}" title="Hapus"><label class="badge badge-warning">Hapus |</label></a>
                                @endif
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
            </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  @include('mentor.layout.script')

  @include('sweetalert::alert')
  <!-- End custom js for this page-->
</body>

</html>
