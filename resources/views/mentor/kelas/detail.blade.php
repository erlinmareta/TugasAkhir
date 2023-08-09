
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Dashboard Mentor</title>
    @include('mentor.layout.head')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
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
                        <h4 class="card-title">Data Materi </h4>
                          <form action="{{ url('mentor/kelas/detail', ['id' => $kelas->id]) }}" method="get" class="form-inline">
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
                          <th>Kelas</th>
                          <th>Isi Materi</th>
                          <th>Deskripsi</th>
                          <th>Urutan</th>
                          @if ($kelas->status === 'pending')
                          <th>Action</th>
                          @endif
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                            @foreach ($materi as $item )
                            <td>{{ $no++ }}</td>
                            <td>{{$item->judul}}</td>
                            <td>{{$item->kelas->judul}}</td>
                            <td>
                                <video width="150" height="90" controls>
                                    <source src="{{ url('/storage/' . $item->isi_materi) }}" type="video/mp4">
                                </video>
                            </td>
                            <td style="max-width: 400px; max-height: 3em; overflow: hidden; white-space: normal; text-overflow: ellipsis;">
                                {!! $item->deskripsi !!}
                            </td>
                            <td>{{$item->urutan}}</td>
                            @if ($kelas->status === 'pending')
                            <td>
                                <a href="{{ url('mentor/kelas/editmateri/' . $kelas->id .'/'. $item->id) }}" title="Edit">
                                    <i class="fas fa-edit"></i>Edit |
                                </a>
                                <a href="{{ url('mentor/hapus/' . $item->id) }}" data-confirm-delete="true"><i class="fas fa-trash-alt"></i> Hapus</a>
                            </td>
                            @endif
                        </tr>
                      </tbody>
                      @endforeach
                    </table>
                  </div>
                  <div class="pagination-container">
                    <ul class="pagination">

                        {!! $materi->links('pagination.bootstrap-4') !!}
                    </ul>
                  </div>
                </div>
              </div>
            </div>
        </div>


  @include('mentor.layout.script')

  @include('sweetalert::alert')

    </body>
</html>

