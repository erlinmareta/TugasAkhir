
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
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">Welcome {{ Auth::user()->name }} !</h3>
                </div>
                <div class="col-12 col-xl-4">
                 <div class="justify-content-end d-flex">
                  <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                  </div>
                 </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card tale-bg">
                <div >

                  <div class="weather-info">
                    <div class="d-flex">

                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="container">
                <div class="row">
                  <div class="col-md-3 mb-4 stretch-card transparent">
                    <div class="card card-tale">
                      <div class="card-body">
                        <p class="mb-4">Data Member</p>
                        <p class="fs-30 mb-2">{{$totalstudent}}</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3 mb-4 stretch-card transparent">
                    <div class="card card-dark-blue">
                      <div class="card-body">
                        <p class="mb-4">Data Materi</p>
                        <p class="fs-30 mb-2">{{$materi}}</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3 mb-4 stretch-card transparent">
                    <div class="card card-light-blue">
                      <div class="card-body">
                        <p class="mb-4">Data Kelas</p>
                        <p class="fs-30 mb-2">{{$kelas}}</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3 mb-4 stretch-card transparent">
                    <div class="card card-light-danger">
                      <div class="card-body">
                        <p class="mb-4">Data Kelas Berhasil</p>
                        <p class="fs-30 mb-2">{{$kelasberhasil}}</p>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="card">
                      <div class="card-body">
                        <p class="card-title">Notifikasi</p>
                        <ul class="icon-data-list">
                            @foreach ($infomember as $item)
                            <li>
                                <div class="d-flex">
                                    <img src="{{ asset('/img/user.jpg')}}" alt="user">
                                    <div>
                                        <p class="text-info mb-1"><b>{{ $item->name }}</b></p>
                                        <p class="mb-0">Telah mengikuti Kelas <b>{{$item->judul}}</b></p>
                                        <small>{{ \Carbon\Carbon::parse($item->created_at)->format('h:i A')}}</small>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                      </div>
                    </div>




                </div>
              </div>


      <!-- content-wrapper ends -->

      <!-- partial:partials/_footer.html -->
      @include('mentor.layout.footer')
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  @include('mentor.layout.script')
  <!-- End custom js for this page-->
</body>

</html>

