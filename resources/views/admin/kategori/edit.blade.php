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
                            <h4 class="card-title">Edit Kategori</h4>
                            <form method="post" action="{{ url('/admin/kategori/'.$item->id) }}"
                                enctype="multipart/form-data">
                                @method('PUT')
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="judul">Nama</label>
                                    <input type="text" class="form-control" id="nama" name="nama"
                                        value="{{ $item->nama }}" required="required">
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
