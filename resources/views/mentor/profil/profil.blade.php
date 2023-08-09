
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Dashboard Mentor</title>
    @include('mentor.layout.head')
    <style>
        .form-group {
            display: ;
            flex-direction: row;
            align-items: center;
        }

        #signatureCanvas {
            border: 1px solid black;
            margin: 10px;
        }

        #signaturePreview {
            border: 1px solid black;
            margin: 10px;
            width: 150px;
            height: 150px;
        }
    </style>
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
      <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Informasi Data Diri</h4>
            <form class="form-horizontal" action="{{url('/mentor/profil')}}" method="post" enctype="multipart/form-data">
                @method('put')
                @csrf
                @if (Auth::user()->foto == null)
                @else
                <input type="hidden" name="gambarLama" value="{{ Auth::user()->foto }}">
                @endif
              <div class="form-group">
                <label for="exampleInputName1">Nama Lengkap</label>
                <input autocomplete="off" type="text" name="name"  class="form-control" id="name" placeholder="Nama Lengkap" value="{{ old('name', Auth::user()->name) }}">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail3">Email</label>
                <input autocomplete="off" type="email" name="email" class="form-control" id="email" placeholder="Email" value="{{ old('email', Auth::user()->email) }}">
              </div>
              {{-- <div class="form-group">
                <label for="exampleInputPassword4">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword4" placeholder="Password" value="{{ old('password', Auth::user()->password) }}">
              </div> --}}
              <div class="form-group">
                <label for="exampleSelectGender">Gender</label>
                  <select name="jenis_kelamin" class="form-control" id="jenis_kelamin">
                    <option selected>Pilih jenis kelamin</option>
                            <option value="Laki-Laki" {{Auth::user()->jenis_kelamin=="Laki-Laki"?"selected" : ""}}>Laki-Laki</option>
                            <option value="Perempuan" {{Auth::user()->jenis_kelamin=="Perempuan"?"selected" : ""}}>Perempuan</option>
                  </select>
                </div>
              <div class="form-group">
                <label for="exampleInputCity1">Nomor Telepon</label>
                <input autocomplete="off" type="text" name="nomor_telepon" class="form-control" id="nomor_telepon" placeholder="Nomor Telepon" value="{{ old('nomor_telepon', Auth::user()->nomor_telepon) }}">
              </div>
              <div class="form-group">
                <label for="exampleInputCity1">Alamat</label>
                <input autocomplete="off" type="text" name="alamat" class="form-control" id="alamat" placeholder="Alamat lengkap" value="{{ old('alamat', Auth::user()->alamat) }}">
              </div>
              <div class="form-group">
                <label for="exampleInputCity1">Tempat Lahir</label>
                <input autocomplete="off" type="text" name="tempat_lahir" class="form-control" id="tempat_lahir" placeholder="Tempat Lahir" value="{{ old('tempat_lahir', Auth::user()->tempat_lahir) }}">
              </div>
              <div class="form-group">
                <label for="exampleInputCity1">Tanggal Lahir</label>
                <input autocomplete="off" type="date" name="tanggal_lahir" class="form-control" id="tanggal_lahir" value="{{ old('tanggal_lahir', Auth::user()->tanggal_lahir) }}">
              </div>
              <div class="form-group">
                <label for="exampleInputCity1">Pekerjaan</label>
                <input autocomplete="off" type="text" name="pekerjaan" class="form-control" id="pekerjaan" placeholder="Pekerjaan" value="{{ old('pekerjaan', Auth::user()->pekerjaan) }}">
              </div>
              <div class="form-group">
                <label for="exampleTextarea1">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" class="form-control" id="deskripsi" rows="4" >{{ old('deskripsi', Auth::user()->deskripsi) }}</textarea>
              </div>
              <div class="form-group">
                <label>File upload</label>
                @if (Auth::user()->foto == null)
                 @else
                <img src="{{ url('/storage/'.Auth::user()->foto) }}" alt="foto" width="90px" height="90px">
                @endif
                <br>
                <input type="file" name="foto" id="foto" accept="image/*">
              </div>
              <div class="form-group">
                <label>Tanda Tangan </label><br>
                <canvas id="signatureCanvas" width="400" height="200"
                        style="border: 1px solid black;"></canvas>
                    <div class="modal-footer">
                        <button onclick="clearCanvas()" class="mx-auto btn btn-danger btn-rounded ml-2">Clear
                            Canvas</button>
                        <button type="button" onclick="checkSignature()" class="mx-auto btn btn-primary btn-rounded ml-2">Simpan Tanda
                            Tangan</button>
              </div>
              </div>
                  <div class="form-group">
                      <label>Hasil Tanda Tangan</label>
                    <div id="signaturePreview">
                    @if (Auth::user()->signature == null)
                    <img src="{{ asset('img/90x90.jpg') }}" alt="Placeholder Image" style="width: 150px; height:150px">
                    @else
                    <img src="{{ url('/storage/'.Auth::user()->signature) }}" style="width: 150px; height:150px">
                    @endif
                    <br>
                  </div>
              </div>

              <button type="submit" class="btn btn-primary mr-2">Submit</button>
            </form>
          </div>
        </div>
      </div>
  </div>

  @include('mentor.layout.script')

    <script>
        $('#current-data').modal('show'); // Menampilkan modal saat halaman dimuat

        var canvas = document.getElementById('signatureCanvas');
        var ctx = canvas.getContext('2d');
        var isDrawing = false;
        var lastX = 0;
        var lastY = 0;

        canvas.addEventListener('mousedown', (e) => {
            isDrawing = true;
            [lastX, lastY] = [e.offsetX, e.offsetY];
        });

        canvas.addEventListener('mousemove', draw);

        canvas.addEventListener('mouseup', () => isDrawing = false);
        canvas.addEventListener('mouseout', () => isDrawing = false);

        function draw(e) {
            if (!isDrawing) return;

            ctx.beginPath();
            ctx.moveTo(lastX, lastY);
            ctx.lineTo(e.offsetX, e.offsetY);
            ctx.stroke();

            [lastX, lastY] = [e.offsetX, e.offsetY];
        }

        function clearCanvas() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
        }

        function saveSignature() {
            var dataURL = canvas.toDataURL(); // Mendapatkan data gambar dalam format base64
            // Kirim dataURL ke server menggunakan Ajax atau bentuk lainnya untuk disimpan atau diproses di sisi server
            // Contoh menggunakan Ajax:
            $.ajax({
                type: 'POST',
                url: '{{route("profil-signature.upload")}}',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                data: {
                    signature: dataURL
                },
                success: function(response) {
                    alert(response.message);
                    clearCanvas();
                },
                error: function(xhr, status, error) {
                    // Display the error message
                    alert(xhr.responseJSON.message);

                    // Perform any other actions you want (e.g., clearing the canvas)
                    clearCanvas();
                }
            });
        }

        // ... Kode JavaScript Anda ...
    function checkSignature() {
        var imageData = ctx.getImageData(0, 0, canvas.width, canvas.height).data;
        var isSignatureEmpty = true;

        // Memeriksa setiap pixel di canvas untuk melihat apakah ada gambar yang telah digambar
        for (var i = 0; i < imageData.length; i += 4) {
            // Jika ada piksel yang tidak transparan, berarti ada gambar yang telah digambar
            if (imageData[i + 3] !== 0) {
                isSignatureEmpty = false;
                break;
            }
        }

        if (isSignatureEmpty) {
            // Jika tanda tangan kosong, tampilkan pemberitahuan
            alert('Tanda tangan masih kosong. Harap menggambar tanda tangan terlebih dahulu.');
        } else {
            // Jika tanda tangan tidak kosong, panggil fungsi saveSignature untuk menyimpan
            saveSignature();
        }
    }
    </script>


  @include('sweetalert::alert')

</body>

</html>


