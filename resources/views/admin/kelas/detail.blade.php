
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
          <h4>Daftar Materi Kelas</h4><br>
              </div>
        <div class="card-body p-0">
          <div class="table-responsive">
            <table class="table table-striped" id="sortable-table">
              <thead>
                <tr>
                    <?php $no=1; ?>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Kelas</th>
                    <th>Isi Materi</th>
                    <th>Deskripsi</th>
                    <th>Urutan</th>
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
                      <td>{!! $item->deskripsi !!}</td>
                      <td>{{$item->urutan}}</td>
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

</body>
</html>
