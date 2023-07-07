
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
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
          <div class="breadcrumb-item"><a href="#">Forms</a></div>
          <div class="breadcrumb-item">Form Tambah Admin</div>
        </div>
      </div>

      <div class="section-body">
        <h2 class="section-title">Edit Data Admin</h2>
        <div class="row">
          <div class="col-12 col-md-6 col-lg-6">
            <div class="card">
                <div class="card-header">
                  <h4>Data</h4>
                </div>
                <form method="post" action="{{ url('/admin/kategori/'.$item->id) }}"
                    enctype="multipart/form-data">
                    @method('PUT')
                     {{ csrf_field() }}
                <div class="card-body">
                  <div class="form-group">
                    <label>Nama</label>
                    <input class="form-control" type="text" name="nama" id="nama" value="{{ $item->nama }}" required="required">
                  </div>
                <div class="card-footer text-right">
                  <button class="btn btn-primary">Submit</button>
                </div>
              </form>
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
