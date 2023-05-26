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
                            <form method="post" action="{{ url('/mentor/kelas/'.$item->id) }}"
                                enctype="multipart/form-data">
                                @method('PUT')
                                {{ csrf_field() }}
                                <input type="hidden" name="gambarLama" value="{{ $item->gambar }}">
                                <div class="form-group">
                                    <label for="judul">Judul</label>
                                    <input type="text" class="form-control" id="judul" name="judul"
                                        value="{{ $item->judul }}" required="required">
                                </div>
                                <div class="form-group">
                                    <label for="gambar"> Gambar </label>
                                    <br><br>
                                    <img src="{{ url('/storage/' .$item->gambar)}}" style="width: 35%;"><br><br>
                                    <input type="file" class="form-control" name="gambar" id="gambar">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">Deskripsi</label>
                                    <input name="deskripsi" id="deskripsi" type="text" class="form-control" value="{{ $item->deskripsi }}" required="required">
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
    <!-- End custom js for this page-->
</body>

</html>
