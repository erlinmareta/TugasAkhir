
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Dashboard Mentor</title>
    @include('mentor.layout.head')
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
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
      <div class="col-8 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Tambah Data Kelas</h4>
            @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
            <form action="{{ url('/mentor/kelas/store') }}" method="post" enctype="multipart/form-data" class="forms-sample">
                @csrf
              <div class="form-group">
                <label for="exampleInputName1">Judul</label>
                <input autocomplete="off" name="judul" type="text" class="form-control" id="exampleInputName1" placeholder="Masukkan Judul">
              </div>
              <div class="form-group">
                <label for="exampleSelectGender">Kategori</label>
                <select type="text" name="kategori_id" class="form-control mb-2 mr-sm-2" id="kategori_id" required="required">
                    <option >Pilih Kategori</option>
                    @foreach ($kategori as $item)
                    <option value="{{ $item->id}}">{{$item->nama}}</option>
                    @endforeach
                 </select>
                </div>
              <div class="form-group">
                <label for="foto">Gambar</label><br>
                <input type="file" name="gambar" id="gambar" accept="image/*">
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" placeholder="Masukkan Deskripsi" id="deskripsiTextarea"></textarea>
                </div>

              <div class="form-group">
                <label for="exampleSelectGender">Status</label>
                  <select class="form-control" id="exampleSelectGender" name="status">
                    <option>Pending</option>
                  </select>
                </div>

              <button type="submit" class="btn btn-primary mr-2">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>

      @include('mentor.layout.footer')

      </div>
    </div>
  </div>


  @include('mentor.layout.script')
  <script>
    CKEDITOR.replace('deskripsiTextarea', {
        height: 300,
    });
</script>
</body>

</html>

