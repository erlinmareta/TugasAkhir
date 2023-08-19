<!DOCTYPE html>
<html lang="en">

<head>
    <title>Upload Berkas Mentor</title>
    @include('mentor.layout.head')
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
</head>

<body>
    <div class="col-10 offset-1 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                @if (empty($getBerkas))
                    <div class="alert alert-success">
                        <h3>Anda Login sebagai Mentor</h3>
                        <h5>Untuk dapat melanjutkan ke halaman dashboard, lengkap persyaratan di bawah ini.</h5>
                    </div>
                    <h4 class="card-title">Upload Prasyarat Berkas</h4>
                    <form action="{{ route('berkas.store') }}" method="POST" enctype="multipart/form-data"
                        class="forms-sample">
                        @csrf
                        <div class="form-group">
                            <label for="nik">Nomor Induk Keluarga (NIK)*</label>
                            <input autocomplete="off" name="nik" type="text" class="form-control" id="nik"
                                placeholder="Masukkan Nomor Induk Keluarga (NIK)" maxlength="16"
                                oninput="this.value=this.value.replace(/[^0-9]/g,'');">
                            <small>Nomor yang di inputkan maksimal 16 nomor</small>
                            <div>
                                @error('nik')
                                    <span role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="file_riwayat_pendidikan">Berkas Riwayat Pendidikan*</label><br>
                            <input type="file" class="form-control" name="file_riwayat_pendidikan"
                                id="file_riwayat_pendidikan" accept=".pdf,.png,.jpg,.jpeg,.jfif" required>
                            <small>.pdf,.png,.jpg,.jpeg,.jfif maks. 2mb</small>
                            <div>
                                @error('file_riwayat_pendidikan')
                                    <span role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="file_keahilan_khusus">Berkas Keahilan Khusus*</label><br>
                            <input type="file" class="form-control" name="file_keahilan_khusus"
                                id="file_keahilan_khusus" accept=".pdf,.png,.jpg,.jpeg,.jfif" required>
                            <small>.pdf,.png,.jpg,.jpeg,.jfif maks. 2mb</small>
                            <div>
                                @error('file_keahilan_khusus')
                                    <span role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="file_prestasi">Berkas File Prestasi*</label><br>
                            <input type="file" class="form-control" name="file_prestasi" id="file_prestasi"
                                accept=".pdf,.png,.jpg,.jpeg,.jfif" required>
                            <small>.pdf,.png,.jpg,.jpeg,.jfif maks. 2mb</small>
                            <div>
                                @error('file_prestasi')
                                    <span role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Kirim Berkas</button>
                    </form>
                @elseif($getBerkas['status'] === 'pending')
                    <div class="alert alert-success">
                        <div class="d-flex">
                            <div style="margin-top: 7px; margin-right:20px">
                                <img src="{{ asset('img/success.svg') }}" alt="success-image" width="35px">
                            </div>
                            <div>
                                <h3>Anda telah melakukan pengiriman berkas.</h3>
                                <h5>Untuk informasi selanjutnya akan dikirimkan melalui email yang terdaftar!
                                    Terimakasih.
                                </h5>
                            </div>
                        </div>
                    </div>
                @elseif($getBerkas['status'] === 'reject')
                    <div class="alert alert-danger">
                        <div class="d-flex">
                            <div style="margin-top: 7px; margin-right:20px">
                                <img src="{{ asset('img/error.svg') }}" alt="success-image" width="35px">
                            </div>
                            <div>
                                <h3>Oops!! Pengajuan ditolak</h3>
                                <h5>Pengajuan Anda ditolak, Anda tidak dapat melanjutkan ke menu lainnya.
                                </h5>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    @if (!$getBerkas === 'pending' || !$getBerkas === 'reject')
        <br>
        <br>
        <br>
        <br>
        @include('mentor.layout.footer')
    @endif
    @include('mentor.layout.script')
</body>

</html>
