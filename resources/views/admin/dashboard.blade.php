
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
                  <div class="card-stats-item-count">24</div>
                  <div class="card-stats-item-label">Admin</div>
                </div>
                <div class="card-stats-item">
                  <div class="card-stats-item-count">12</div>
                  <div class="card-stats-item-label">Peserta</div>
                </div>
                <div class="card-stats-item">
                  <div class="card-stats-item-count">23</div>
                  <div class="card-stats-item-label">Instruktor</div>
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
                59
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
                67
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
                <h4>Total Kelas Gagal hari ini</h4>
              </div>
              <div class="card-body">
                29
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
