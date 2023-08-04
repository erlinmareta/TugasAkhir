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
                            <h4 class="card-title">Edit Kelas</h4>
                            <form method="post" action="{{ url('/mentor/kelas/'.$item->id) }}"
                                enctype="multipart/form-data">
                                @method('PUT')
                                {{ csrf_field() }}
                                <input type="hidden" name="gambarLama" value="{{ $item->gambar }}">
                                <div class="form-group">
                                    <label class="sr-only" for="kategori_id">Nama Kategori</label>
                                    <select name="kategori_id" class="form-control mb-2 mr-sm-2" id="kategori_id" required="required">
                                        <option value="">-- Pilih Kategori --</option>
                                        @foreach ($kategori as $kategori_item)
                                            <option value="{{ $kategori_item->id }}"
                                                {{ $item->kelas_id == $kategori_item->id ? 'selected' : '' }}>
                                                {{ $kategori_item->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="judul">Judul</label>
                                    <input type="text" class="form-control" id="judul" name="judul"
                                        value="{{ $item->judul }}" required="required">
                                </div>
                                <div class="form-group">
                                    <label for="gambar"> Gambar </label>
                                    <br><br>
                                    <img src="{{ url('/storage/' .$item->gambar)}}" style="width: 10%;"><br><br>
                                    <input type="file" class="form-control" name="gambar" id="gambar">
                                </div>
                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi</label>
                                    <textarea name="deskripsi"  id="deskripsiTextarea" class="form-control" required>{!! $item->deskripsi !!}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select class="form-control" id="status" name="status">
                                        <option value="pending" {{$item->status=="pending"?"selected" : ""}}>
                                    Pending</option>
                                    </select>
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
