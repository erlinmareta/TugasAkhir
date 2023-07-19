
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
              <i class="fas fa-dollar-sign"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Total kelas masuk hari ini</h4>
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
                <h4>Total Kelas berhasil hari ini</h4>
              </div>
              <div class="card-body">
                {{$kelasberhasil}}
              </div>
            </div>
          </div>
        </div>



      </div>
    </section>
  </div>


{{-- footer       --}}
@include('admin.layout.footer')
    </div>
  </div>

{{-- script --}}
@include('admin.layout.script')

</body>
</html>
