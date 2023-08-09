
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Dashboard Mentor</title>
    @include('mentor.layout.head')
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
</head>
<body>
  <div class="container-scroller">

    @include('mentor.layout.navbar')


    <div class="container-fluid page-body-wrapper">


      @include('mentor.layout.setting')

        </div>
      </div>

      @include('mentor.layout.sidebar')


      <div class="col-8 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Tambah Data Materi</h4>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
            <form action="{{ route('mentor.kelas.store_materi', ['id' => $kelas->id]) }}" method="post" enctype="multipart/form-data" class="forms-sample">
                @method('put')
                {{ csrf_field() }}
              <div class="form-group">
                <label for="exampleInputName1">Judul</label>
                <input autocomplete="off" name="judul_materi" type="text" class="form-control" id="judul_materi" placeholder="Masukkan Judul">
                <small>judul yang di inputkan tidak boleh lebih dari 50 karakter</small>
              </div>
              <div class="form-group">
                <label for="exampleInputName1">Kelas</label>
                <input  type="hidden" name="kelas_id" value="{{ $kelas->id }}">
                <input name="judul" type="text" class="form-control" id="judul" value="{{ old('judul', $kelas->judul ?? '') }}" readonly>
            </div>

                <div class="form-group">
                    <label for="foto">Materi</label><br>
                    <input type="file" class="form-control" name="isi_materi" id="isi_materi" accept="video/*">
                    <small>video yang diunggah tidak boleh melebihi 30 mb dan durasinya tidak boleh lebih dari 10 menit</small>
                    </div>
                <div class="form-group">
                    <label for="exampleInputName1">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" placeholder="Masukkan Deskripsi" id="deskripsiTextarea"></textarea>
                    <small>deskripsi singkat tentang materi ini, dan panjangnya tidak boleh melebihi 200 karakter</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">Urutan</label>
                    <input autocomplete="off" name="urutan" type="text" class="form-control" id="urutan" placeholder="Masukkan Urutan berdasarkan urutan materinya">
                    <small>urutan berupa angka untuk mengurutkan materinya</small>
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

