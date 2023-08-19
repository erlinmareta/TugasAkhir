<!DOCTYPE html>
<html lang="en">

<head>

    @include('admin.layout.head')

</head>

<body>

    {{-- navbar --}}
    @include('admin.layout.navbar')

    {{-- sidebar --}}
    @include('admin.layout.sidebar')

    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Table Permintaan Pengguna</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Components</a></div>
                    <div class="breadcrumb-item">Table</div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped" id="sortable-table">
                                    <thead>
                                        <tr>
                                            <?php $no = 1; ?>
                                            <th>No</th>
                                            <th>Pengguna</th>
                                            <th>Berkas Riwayat Pendidikan</th>
                                            <th>Berkas Keahlian Khusus</th>
                                            <th>Berkas Prestasi</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($getBerkas as $item)
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $item->user['name'] }}</td>
                                            <td>
                                                <button class="btn btn-sm btn-success-outline" data-toggle="modal"
                                                    data-target="#riwayat-pendidikan{{ $item->id }}s"><span
                                                        class="fa fa-file"></span></button>
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-success-outline" data-toggle="modal"
                                                    data-target="#keahlian-khusus{{ $item->id }}s"><span
                                                        class="fa fa-file"></span></button>
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-success-outline" data-toggle="modal"
                                                    data-target="#prestasi{{ $item->id }}s"><span
                                                        class="fa fa-file"></span></button>
                                            </td>
                                            <td>
                                                <button
                                                    class="btn btn-sm @if ($item['status'] === 'reject') btn-danger @elseif($item['status'] === 'pending') btn-warning @elseif($item['status'] === 'completed') btn-success @endif">{{ $item['status'] }}</button>
                                            </td>
                                            <td>
                                                @if ($item['status'] === 'pending')
                                                    <button class="btn btn-sm btn-danger"
                                                        onclick="location.href='permintaan-mentor-validate?status=reject&user={{ $item['user_id'] }}'">Tolak</button>
                                                    <button class="btn btn-sm btn-success"
                                                        onclick="location.href='permintaan-mentor-validate?status=completed&user={{ $item['user_id'] }}'">Terima</button>
                                                @elseif($item['status'] === 'reject')
                                                    <button class="btn btn-sm btn-warning"
                                                        onclick="location.href='permintaan-mentor-validate?status=pending&user={{ $item['user_id'] }}'">Pending</button>
                                                    <button class="btn btn-sm btn-success"
                                                        onclick="location.href='permintaan-mentor-validate?status=completed&user={{ $item['user_id'] }}'">Terima</button>
                                                @else
                                                    <button class="btn btn-sm btn-warning"
                                                        onclick="location.href='permintaan-mentor-validate?status=pending&user={{ $item['user_id'] }}'">Pending</button>
                                                    <button class="btn btn-sm btn-danger"
                                                        onclick="location.href='permintaan-mentor-validate?status=reject&user={{ $item['user_id'] }}'">Tolak</button>
                                                @endif
                                            </td>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </section>
    @foreach ($getBerkas as $item)
        {{-- Riwayat pendidikan --}}
        <div class="modal" tabindex="-1" id="riwayat-pendidikan{{ $item->id }}s">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Berkas Pengguna: {{ $item->user['name'] }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @php
                            $extension = pathinfo($item['file_riwayat_pendidikan'], PATHINFO_EXTENSION);
                            $allowedExtensionsImage = ['png', 'jpeg', 'jpg', 'jfif'];
                            $allowedExtensionsPDF = ['pdf'];
                            $isImage = in_array($extension, $allowedExtensionsImage);
                            $isPDF = in_array($extension, $allowedExtensionsPDF);
                        @endphp
                        @if ($isImage || $isPDF)
                            @if ($isPDF)
                                <embed type="application/pdf"
                                    src="{{ asset('storage/' . $item['file_riwayat_pendidikan']) }}" width="450"
                                    height="400"></embed>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
        {{-- Keahlian Khusus --}}
        <div class="modal" tabindex="-1" id="keahlian-khusus{{ $item->id }}s">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Berkas Pengguna: {{ $item->user['name'] }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @php
                            $extension = pathinfo($item['file_keahlian_khusus'], PATHINFO_EXTENSION);
                            $allowedExtensionsImage = ['png', 'jpeg', 'jpg', 'jfif'];
                            $allowedExtensionsPDF = ['pdf'];
                            $isImage = in_array($extension, $allowedExtensionsImage);
                            $isPDF = in_array($extension, $allowedExtensionsPDF);
                        @endphp
                        @if ($isImage || $isPDF)
                            @if ($isPDF)
                                <embed type="application/pdf"
                                    src="{{ asset('storage/' . $item['file_keahlian_khusus']) }}" width="450"
                                    height="400"></embed>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
        {{-- Prestasi --}}
        <div class="modal" tabindex="-1" id="prestasi{{ $item->id }}s">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Berkas Pengguna: {{ $item->user['name'] }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @php
                            $extension = pathinfo($item['file_prestasi'], PATHINFO_EXTENSION);
                            $allowedExtensionsImage = ['png', 'jpeg', 'jpg', 'jfif'];
                            $allowedExtensionsPDF = ['pdf'];
                            $isImage = in_array($extension, $allowedExtensionsImage);
                            $isPDF = in_array($extension, $allowedExtensionsPDF);
                        @endphp
                        @if ($isImage || $isPDF)
                            @if ($isPDF)
                                <embed type="application/pdf" src="{{ asset('storage/' . $item['file_prestasi']) }}"
                                    width="450" height="400"></embed>
                            @elseif($isImage)
                                <img class="mx-auto d-block" src="{{ asset('storage/' . $item['file_prestasi']) }}"
                                    alt="file" width="300px">
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    {{-- footer       --}}
    @include('admin.layout.footer')

    {{-- script --}}
    @include('admin.layout.script')
    @include('sweetalert::alert')

</body>

</html>
