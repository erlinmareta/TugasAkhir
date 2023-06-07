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
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Edit Kelas</h4>
                            <form method="post" action="{{ url('/mentor/materi/'.$item->id) }}"
                                enctype="multipart/form-data">
                                @method('PUT')
                                {{ csrf_field() }}
                                <input type="hidden" name="materiLama" value="{{ $item->isi_materi }}">
                                <div class="form-group">
                                    <label for="judul">Judul</label>
                                    <input type="text" class="form-control" id="judul" name="judul"
                                        value="{{ $item->judul }}" required="required">
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="kelas_id">Nama Kelas</label>
                                    <select name="kelas_id" class="form-control mb-2 mr-sm-2" id="kelas_id" required="required">
                                        <option value="">-- Pilih kelas --</option>
                                        @foreach ($kelas as $kelas_item)
                                            <option value="{{ $kelas_item->id }}"
                                                {{ $item->kelas_id == $kelas_item->id ? 'selected' : '' }}>
                                                {{ $kelas_item->judul }}
                                            </option>
                                        @endforeach
                                    </select>
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
                                    <label>Deskripsi</label>
                                    <input name="deskripsi" id="deskripsi" type="text" class="form-control" value="{{ $item->deskripsi }}" required="required">
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
    <!-- End custom js for this page-->
</body>

</html>
