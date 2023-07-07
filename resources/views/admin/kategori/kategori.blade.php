
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
          <div class="breadcrumb-item"><a href="#">Components</a></div>
          <div class="breadcrumb-item">Table</div>
        </div>
      </div>
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4>Data Kategori</h4><br>
            <a href="{{ url('admin/kategori/tambah') }}" class="btn btn-outline-primary">Tambah</a>
              </div>
        <div class="card-body p-0">
          <div class="table-responsive">
            <table class="table table-striped" id="sortable-table">
              <thead>
                <tr>
                    <?php $no=1; ?>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($kategori as $item )
                <tr>
                  <td>{{ $no++ }}</td>
                  <td>{{$item->nama}}</td>
                  <td>
                    <a class="btn btn-sm btn-success-outline" href="{{ url('admin/kategori/edit/' .$item->id) }}" title="Edit"><span class="fa fa-edit"></span> Edit |</a>
                    <a class="btn btn-sm btn-success-outline" href="{{ url('admin/hapuskategori/' .$item->id) }}" title="Hapus"><span class="fa fa-trash"></span> Hapus |</a>
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
