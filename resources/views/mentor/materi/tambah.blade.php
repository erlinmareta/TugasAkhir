
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Dashboard Mentor</title>
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
      <div class="col-8 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Tambah Data Materi</h4>
            <form action="/mentor/materi/store" method="post" enctype="multipart/form-data" class="forms-sample">
                @csrf
              <div class="form-group">
                <label for="exampleInputName1">Judul</label>
                <input name="judul" type="text" class="form-control" id="exampleInputName1" placeholder="Masukkan Judul">
              </div>
              <div class="form-group">
                <label for="exampleSelectGender">Kelas</label>
                <select type="text" name="kelas_id" class="form-control mb-2 mr-sm-2" id="kelas_id" required="required">
                    <option >Pilih Kelas</option>
                    @foreach ($kelas as $item)
                    <option value="{{ $item->id}}">{{$item->judul}}</option>
                    @endforeach
                 </select>
                </div>
                <div class="form-group">
                    <label for="foto">Materi</label><br>
                    <input type="file" name="isi_materi" id="isi_materi" accept="video/*">
                    </div>
                <div class="form-group">
                    <label for="exampleInputName1">Deskripsi</label>
                    <input name="deskripsi" type="text" class="form-control" id="deskripsi" placeholder="Masukkan Deskripsi">
                </div>
                <div class="form-group">
                    <label for="exampleSelectGender">Status</label>
                      <select class="form-control" id="status" name="status">
                        <option>Pending</option>
                      </select>
                    </div>
                <div class="form-group">
                    <label for="exampleInputName1">Urutan</label>
                    <input name="urutan" type="text" class="form-control" id="urutan" placeholder="Masukkan Urutan">
                  </div>

              <button type="submit" class="btn btn-primary mr-2">Submit</button>
              <button class="btn btn-light">Cancel</button>
            </form>
          </div>
        </div>
      </div>
    </div>

      <!-- content-wrapper ends -->

      <!-- partial:partials/_footer.html -->
      @include('mentor.layout.footer')
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  @include('mentor.layout.script')
  <!-- End custom js for this page-->
</body>

</html>

