
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
      <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-12">
          <div class="card card-statistic-2">
            <div class="card-stats">
              <div class="card-stats-title">
                <div class="dropdown d-inline">
                </div>
              </div>
              <div class="card-stats-items">
                <div class="card-stats-item">
                  <div class="card-stats-item-count">{{$useradmin}}</div>
                  <div class="card-stats-item-label">Admin</div>
                </div>
                <div class="card-stats-item">
                  <div class="card-stats-item-count">{{$userpeserta}}</div>
                  <div class="card-stats-item-label">Peserta</div>
                </div>
                <div class="card-stats-item">
                  <div class="card-stats-item-count">{{$usermentor}}</div>
                  <div class="card-stats-item-label">Mentor</div>
                </div>
              </div>
            </div>
            <div class="card-icon shadow-primary bg-primary">
              <i class="fas fa-users"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Total User</h4>
              </div>
              <div class="card-body">
                {{$totaluser}}
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
          <div class="card card-statistic-2">
            <div class="card-icon shadow-primary bg-primary">
                <i class='fas fa-file-alt'></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Total Kelas </h4>
              </div>
              <div class="card-body">
                {{$kelasmasuk}}
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
          <div class="card card-statistic-2">
            <div class="card-icon shadow-primary bg-primary">
              <i class="fas fa-shopping-bag"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                {{-- <h4>Total Kelas berhasil hari ini</h4>
              </div>
              <div class="card-body">
                {{$kelasberhasil}} --}}
              </div>
            </div>
          </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Informasi Registrasi mentor</h4>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled list-unstyled-border list-unstyled-noborder">
                            @foreach ($info as $item)
                            <li class="media">
                                <img alt="image" class="mr-3 rounded-circle" width="70" src="assets/img/avatar/avatar-1.png">
                                <div class="media-body">
                                    <div class="media-title text-truncate">{{$item->name}}</div>
                                    <div class="text-time">{{$item->created_at}}</div>
                                    <p class="text-truncate">Telah registrasi sebagai {{$item->level}}</p>
                                    <div class="media-links">
                                        <a href="#">View</a>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                        <div class="dropdown-footer text-center">
                            <a href="#" id="viewAllUsers">View All <i class="fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            document.getElementById('viewAllUsers').addEventListener('click', function(e) {
                e.preventDefault();
                var list = document.querySelector('.list-unstyled-border');
                list.innerHTML = ''; // Clear the list to remove current data
                @foreach ($allUsers as $user)
                var li = document.createElement('li');
                li.className = 'media';
                li.innerHTML = `
                    <img alt="image" class="mr-3 rounded-circle" width="70" src="assets/img/avatar/avatar-1.png">
                    <div class="media-body">
                        <div class="media-title text-truncate">{{$user->name}}</div>
                        <div class="text-time">{{$user->created_at}}</div>
                        <p class="text-truncate">Telah registrasi sebagai {{$user->level}}</p>
                        <div class="media-links">
                            <a href="#">View</a>
                        </div>
                    </div>
                `;
                list.appendChild(li);
                @endforeach
                // Hide the "View All" link
                document.querySelector('.dropdown-footer').style.display = 'none';
            });
        </script>







{{-- footer       --}}
@include('admin.layout.footer')
    </div>
  </div>

{{-- script --}}
@include('admin.layout.script')

</body>
</html>
