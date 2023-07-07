
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
        <h1>Table</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        </div>
      </div>
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4>Data Kelas Berhasil di Publish</h4><br>
              </div>
        <div class="card-body p-0">
          <div class="table-responsive">
            <table class="table table-striped" id="sortable-table">
              <thead>
                <tr>
                    <?php $no=1; ?>
                    <th>No</th>
                    <th>Nama Mentor</th>
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
                      <td>{{$item->user->name}}</td>
                      <td>{{$item->judul}}</td>
                      <td><img src="{{ url('/storage/' .$item->gambar)}}" style="width:70px" ></td>
                      <td>{{$item->deskripsi}}</td>
                      <td><div class="badge badge-success">{{$item->status}}</div></td>
                      <td>
                        <a class="btn btn-sm btn-success-outline" href="{{ route('admin.kelasDetail', $item->id) }}" title="detail"><span class="fa fa-edit"></span> Detail |</a>
                        <a class="btn btn-sm btn-success-outline" href="{{ url('admin/hapus/' .$item->id) }}" title="Hapus"><span class="fa fa-trash"></span> Hapus |</a>
                      </td>
                  </tr>
                <tr>
              </tbody>
              @endforeach
            </table>
          </div>
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

@include('sweetalert::alert')

</body>
</html>
