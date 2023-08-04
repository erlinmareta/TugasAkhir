<!DOCTYPE html>
<html lang="en">

<head>
    <title>Dashboard Mentor</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
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
                  <h4 class="card-title">Data Kelas</h4>
                    <form action="{{ url('mentor/member/member') }}" method="get" class="form-inline">
                      <div class="input-group">
                          <input type="text" class="form-control" name="search" placeholder="Search">
                          <div class="input-group-append">
                              <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
                          </div>
                      </div>
                    </form>
                  </div>
                  @if ($student->isEmpty())
                    <div class="alert alert-info">No data available.</div>
                  @else
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <?php $no=1; ?>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Judul Kelas</th>
                            <th>Email</th>
                            <th>No. Telepon</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($student as $item)
                          <tr>
                              <td>{{ $loop->iteration }}</td>
                              <td>{{$item->name}}</td>
                              <td>{{$item->judul}}</td>
                              <td>{{$item->email}}</td>
                              <td>{{$item->no_telepon}}</td>
                              <td>
                                  <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#detailModal{{ $loop->iteration }}">Detail</button>
                              </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                    <div class="pagination-container">
                      <ul class="pagination">
                          <!-- Anggap $kelas adalah objek pagination dari controller -->
                          {!! $student->links('pagination.bootstrap-4') !!}
                      </ul>
                    </div>
                  @endif
                </div>
              </div>
            </div>
        </div>


  @include('mentor.layout.script')

  @include('sweetalert::alert')

  @foreach ($student as $item)
  <div class="modal fade" id="detailModal{{ $loop->iteration }}" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="detailModalLabel">{{ $item->name }}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <img src="{{ $item->foto }}" alt="Photo" class="img-fluid mb-2">
          <p><strong>Pekerjaan:</strong> {{ $item->pekerjaan }}</p>
          <p><strong>Alamat:</strong> {{ $item->alamat }}</p>
          <p><strong>Deskripsi:</strong> {{ $item->deskripsi }}</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  @endforeach

</body>

</html>
