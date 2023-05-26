
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
            <h4 class="card-title">Tambah Data Kelas</h4>
            <form action="/mentor/kelas/store" method="post" enctype="multipart/form-data" class="forms-sample">
                @csrf
              <div class="form-group">
                <label for="exampleInputName1">Judul</label>
                <input name="judul" type="text" class="form-control" id="exampleInputName1" placeholder="Masukkan Judul">
              </div>
              <div class="form-group">
                <label for="foto">Gambar</label><br>
                <input type="file" name="gambar" id="gambar" accept="image/*">
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">Deskripsi</label>
                    <input name="deskripsi" type="text" class="form-control" id="exampleInputName1" placeholder="Masukkan Judul">
                  </div>
              <div class="form-group">
                <label for="exampleSelectGender">Status</label>
                  <select class="form-control" id="exampleSelectGender" name="status">
                    <option>Pending</option>
                  </select>
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

