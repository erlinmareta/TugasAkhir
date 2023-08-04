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
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Edit Materi</h4>
                            <form action="{{ url('/mentor/kelas/materi/' . $kelas->id . '/' . $item->id) }}" method="POST" enctype="multipart/form-data">
                                @method('PUT')
                                {{ csrf_field() }}
                                <input type="hidden" name="materiLama" value="{{ $item->isi_materi }}">
                                <div class="form-group">
                                    <label for="judul">Judul</label>
                                    <input type="text" class="form-control" id="judul" name="judul"
                                        value="{{ $item->judul }}" required="required">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">Nama Kelas</label>
                                    <input type="hidden" name="kelas_id" value="{{ $kelas->id }}">
                                    <input type="text" class="form-control" value="{{ $kelas->judul }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="video">Materi</label>
                                    <br><br>
                                    <video width="35%" controls>
                                        <source src="{{ url('/storage/' . $item->isi_materi) }}" type="video/mp4">
                                    </video>
                                    <br><br>
                                    <input type="file" class="form-control" name="isi_materi" id="isi_materi" accept="video/*">
                                </div>
                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi</label>
                                    <textarea name="deskripsi"  id="deskripsiTextarea" class="form-control" required>{!! $item->deskripsi !!}</textarea>
                                </div>
                                <div class="form-group">
                                    <label >Urutan</label>
                                    <input name="urutan" id="urutan" type="text" class="form-control" value="{{ $item->urutan }}" required="required">
                                  </div>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('mentor.layout.script')
    <script>
        CKEDITOR.replace('deskripsiTextarea', {
            height: 300,
        });
    </script>
    <!-- End custom js for this page-->
</body>

</html>
