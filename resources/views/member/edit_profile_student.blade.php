
<!DOCTYPE html>
<html lang="en"
      dir="ltr">

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



            <!-- // END Header -->

            <!-- Header Layout Content -->
            <div class="mdk-header-layout__content page-content ">

                <div class="page-section bg-alt border-bottom-2">
                    <div class="container page__container">

                        <div class="d-flex flex-column flex-lg-row align-items-center">
                            <div class="d-flex flex-column flex-md-row align-items-center flex mb-16pt mb-lg-0 text-center text-md-left">

                        </div>

                    </div>
                </div>

                <div class="page-section">
                    <div class="container page__container">

                        <div class="row">
                            <div class="col-lg-8">
                                <div >
                                    <div>
                                    <form action="{{ Route('profile.update', $user->id) }}" method="post" enctype="multipart/form-data">
                                      @method('patch')
                                        @csrf
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Nama Lengkap</label>
                                            <input type="text" name="name" class="form-control" placeholder="Masukkan nama" value="{{ $user->name }}">
                                        </div>

                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Tempat Lahir</label>
                                            <input type="text" name="tempat_lahir" class="form-control" placeholder="Masukkan tempat lahir" value="{{ $user->tempat_lahir }}">
                                        </div>

                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Tanggal Lahir</label>
                                            <input type="date" name="tanggal_lahir" class="form-control" placeholder="Masukkan Tanggal Lahir" value="{{ $user->tanggal_lahir }}">
                                        </div>

                                        <div class="mb-3">
                                            <label for="">jenis kelamin</label>
                                        <select class="form-select form-control form-select-sm" aria-label=".form-select-sm example">
                                            <option selected>Pilih jenis kelamin</option>
                                            <option value="Laki-Laki">Laki-Laki</option>
                                            <option value="Peremuan">Perempuan</option>

                                        </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Email</label>
                                            <input type="email" class="form-control" placeholder="Masukkan email" value="{{ $user->email }}">
                                        </div>

                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">No.Telepon</label>
                                            <input type="text" name="nomor_telepon" class="form-control" placeholder="Masukkan Nomor Telepon" value="{{ $user->nomor_telepon }}">
                                        </div>

                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Alamat</label>
                                            <input type="text" name="alamat" class="form-control" placeholder="Masukkan Alamat" value="{{ $user->alamat }}">
                                        </div>

                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Pekerjaan</label>
                                            <input type="text" name="pekerjaan" class="form-control"  placeholder="Masukkan Pekerjaan" value="{{ $user->pekerjaan }}">
                                        </div>

                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Deskripsi</label>
                                            <textarea class="form-control" name="deskripsi" rows="3" value="{{ $user->deskripsi }}"></textarea>
                                        </div>

                                        <div class="form-group">
                                        <label for="foto">Foto Diri</label><br>
                                        <img src="{{ asset('storage/photo/'.$user->foto) }}" alt="" style="width: 20%;" class="img-thumbnail rounded mx-auto d-block">
                                        <input type="file" name="foto" id="foto" accept="image/*">
                                    </div>

                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        </form>
                                        <div>
                                            <div >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 card-group-row__col">
                                        <div >
                                            <div class="card-header d-flex align-items-center border-0">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
        <!-- // END Header Layout -->

        <!-- Drawer -->

        <div class="mdk-drawer js-mdk-drawer"
             id="default-drawer">
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

