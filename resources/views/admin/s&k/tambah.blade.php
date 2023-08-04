
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
          <div class="breadcrumb-item">Form Tambah Syarat dan Ketentuan</div>
        </div>
      </div>

      <div class="section-body">
        <h2 class="section-title">Form Tambah Data Syarat dan Ketentuan</h2>
        <div class="row">
          <div class="col-12 col-md-6 col-lg-6">
            <div class="card">
                <form action="/admin/s&k/store" method="post" enctype="multipart/form-data" class="forms-sample">
                    @csrf
                <div class="card-header">
                  <h4>Data</h4>
                </div>
                <div class="card-body">
                  <div class="form-group">
                    <label>Keterangan</label>
                    <input class="form-control" type="text" name="keterangan" id="keterangan">
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