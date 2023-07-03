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
                            <h4 class="card-title">Basic Table</h4>
                            <a href="{{ url('mentor/materi/tambah') }}" class="btn btn-light">Tambah</a>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <?php $no = 1; ?>
                                            <th>No</th>
                                            <th>Judul</th>
                                            <th>Kelas</th>
                                            <th>Isi Materi</th>
                                            <th>Deskripsi</th>
                                            <th>Urutan</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            @foreach ($materi as $item)
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $item->judul }}</td>
                                                <td>{{ $item->kelas->judul }}</td>
                                                <td>
                                                    <video id="video{{ $item->id }}" width="350" height="190"
                                                        controls autoplay>
                                                        <source src="{{ url('/storage/' . $item->isi_materi) }}"
                                                            type="video/mp4">
                                                    </video>
                                                </td>
                                                <td>{{ $item->deskripsi }}</td>
                                                <td>{{ $item->urutan }}</td>
                                                <td>
                                                    <a class="btn btn-sm btn-success-outline" href="{{ url('mentor/materi/edit/' . $item->id) }}" title="Edit"><label class="badge badge-info">Edit |</label></a>
                                                    <a class="btn btn-sm btn-success-outline" href="{{ url('mentor/hapus/' . $item->id) }}" data-confirm-delete="true"><label class="badge badge-warning">Hapus |</label></a>
                                                </td>
                                        </tr>
                                    </tbody>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- page-body-wrapper ends -->
            </div>
            <!-- container-scroller -->

            @include('mentor.layout.script')

            @include('sweetalert::alert')

            <!-- End custom js for this page-->
</body>

</html>
