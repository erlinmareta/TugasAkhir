<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    @include('member.layout.head')

</head>

<body class="layout-sticky-subnav layout-learnly ">

    <div class="preloader">
        <div class="sk-chase">
            <div class="sk-chase-dot"></div>
            <div class="sk-chase-dot"></div>
            <div class="sk-chase-dot"></div>
            <div class="sk-chase-dot"></div>
            <div class="sk-chase-dot"></div>
            <div class="sk-chase-dot"></div>
        </div>

        <!-- <div class="sk-bounce">
            <div class="sk-bounce-dot"></div>
            <div class="sk-bounce-dot"></div>
        </div> -->

        <!-- More spinner examples at https://github.com/tobiasahlin/SpinKit/blob/master/examples.html -->
    </div>

    <!-- Header Layout -->
    <div class="mdk-header-layout js-mdk-header-layout">

        <!-- Header -->

        @include('member.layout.header2')

        <!-- // END Header -->

        <!-- Header Layout Content -->
        <div class="mdk-header-layout__content page-content ">

            <div class="page-section bg-alt border-bottom-2">
                <div class="container page__container">

                    <div class="d-flex flex-column flex-lg-row align-items-center">
                        <div
                        class="d-flex flex-column flex-md-row align-items-center flex mb-16pt mb-lg-0 text-center text-md-left">
                        <div class="mb-16pt mb-md-0 mr-md-24pt">
                            @if (Auth::user()->foto == null)
                            <img src="{{ asset('img/90x90.jpg') }}" alt=""
                            style="width: 150px; height:150px"
                            class="img-thumbnail rounded-circle mx-auto d-block">
                            @else
                            <img src="{{ url('/storage/'.Auth::user()->foto) }}" alt=""
                            style="width: 150px; height:150px"
                            class="img-thumbnail rounded-circle mx-auto d-block">
                            @endif

                        </div>
                        <div class="flex">
                            <h1 class="h2 mb-8pt">{{ Auth::user()->name }}</h1>

                        </div>
                    </div>
                    <div class="ml-lg-16pt">
                        <a href="" class="btn btn-light">Follow</a>
                    </div>
                </div>

            </div>
        </div>

        <div class="page-section">
            <div class="container page__container">

                <div class="row">
                    <div class="col-lg-8">
                        <div class="page-separator">
                            <div class="page-separator__text">data</div>
                        </div>

                        <div>
                            <div>
                                <form action="{{url('/member/student_profil')}}" method="post" enctype="multipart/form-data">
                                    @method('put')
                                    @csrf
                                    @if (Auth::user()->foto == null)

                                    @else
                                    <input type="hidden" name="gambarLama" value="{{ Auth::user()->foto }}">
                                    @endif
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Nama Lengkap</label>
                                        <input type="text" name="name" class="form-control"
                                        placeholder="Masukkan nama"
                                        value="{{ old('name', Auth::user()->name) }}">
                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Tempat Lahir</label>
                                        <input type="text" name="tempat_lahir" class="form-control"
                                        placeholder="Masukkan tempat lahir"
                                        value="{{ old('tempat_lahir', Auth::user()->tempat_lahir) }}">
                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Tanggal Lahir</label>
                                        <input type="date" name="tanggal_lahir" class="form-control"
                                        placeholder="Masukkan Tanggal Lahir"
                                        value="{{ old('tanggal_lahir', Auth::user()->tanggal_lahir) }}">
                                    </div>

                                    <div class="mb-3">
                                        <label for="">jenis kelamin</label>
                                        <select class="form-select form-control form-select-sm" aria-label=".form-select-sm example" name="jenis_kelamin">
                                            <option selected>Pilih jenis kelamin</option>
                                            <option value="Laki-Laki" {{Auth::user()->jenis_kelamin=="Laki-Laki"?"selected" : ""}}>Laki-Laki</option>
                                            <option value="Perempuan" {{Auth::user()->jenis_kelamin=="Perempuan"?"selected" : ""}}>Perempuan</option>

                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Email</label>
                                        <input type="email" name="email" class="form-control" placeholder="Masukkan email"
                                        value="{{ old('email', Auth::user()->email) }}">
                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">No.Telepon</label>
                                        <input type="text" name="nomor_telepon" class="form-control"
                                        placeholder="Masukkan Nomor Telepon"
                                        value="{{ old('nomor_telepon', Auth::user()->nomor_telepon) }}">
                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Alamat</label>
                                        <input type="text" name="alamat" class="form-control"
                                        placeholder="Masukkan Alamat"
                                        value="{{ old('alamat', Auth::user()->alamat) }}">
                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Pekerjaan</label>
                                        <input type="text" name="pekerjaan" class="form-control"
                                        placeholder="Masukkan Pekerjaan"
                                        value="{{ old('pekerjaan', Auth::user()->pekerjaan) }}">
                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Deskripsi</label>
                                        <input type="text" name="deskripsi" class="form-control"
                                        value="{{ old('deskripsi', Auth::user()->deskripsi) }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="foto">Foto Diri</label><br>
                                        @if (Auth::user()->foto == null)

                                        @else
                                        <img src="{{ url('/storage/'.Auth::user()->foto) }}" alt="foto" width="90px" height="90px">
                                        @endif
                                        <br>
                                        <input type="file" name="foto" id="foto" accept="image/*">
                                    </div>

                                    <button type="submit" class="btn btn-primary" >Submit</button>
                                </form>
                                <div>
                                </div>

                            </div>
                            <div class="col-md-6 card-group-row__col">
                                <div>
                                    <div class="card-header d-flex align-items-center border-0">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">

                        <h4>About me</h4>
                        <p class="text-70 mb-24pt">{{ old('deskripsi', Auth::user()->deskripsi) }}</p>

                        <h4>Connect</h4>
                        <p class="text-70">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            Duis quis viverra enim, vitae porttitor nisl. Praesent rhoncus ligula id
                            felis blandit congue. Mauris interdum enim vel quam consequat efficitur.
                            In commodo magna eget augue interdum, at maximus metus lobortis. Integer
                            at neque sapien. Praesent laoreet elementum maximus.</p>
                            <div class="d-flex align-items-center mb-24pt">
                                <a href=""
                                class="text-accent fab fa-facebook-square font-size-24pt mr-8pt"></a>
                                <a href="" class="text-accent fab fa-twitter-square font-size-24pt mr-8pt"></a>
                                <a href="" class="text-accent fab fa-instagram-square font-size-24pt"></a>
                            </div>


                            <!-- // END Header Layout -->

                            <!-- Drawer -->

                            <div class="mdk-drawer js-mdk-drawer" id="default-drawer">
                                <div class="mdk-drawer__content">
                                    <div class="sidebar sidebar-light sidebar-light-dodger-blue sidebar-left"
                                    data-perfect-scrollbar>

                                    <!-- Sidebar Content -->

                                    @include('member.layout.sidebar')

                                    <!-- // END Drawer -->

                                    <!-- jQuery -->
                                    @include('member.layout.script')

                                </body>
                                </html>
