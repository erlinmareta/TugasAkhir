
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
                {{$kelasberhasil}}
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
                <h4>Total Kelas Masuk hari ini</h4>
              </div>
              <div class="card-body">
                {{ $totalDataKelasmasukPerHari}}
              </div>
            </div>
          </div>
        </div>

        <div class="row">
            <div class="col-md-7 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title mb-0">Info Kelas Masuk Hari ini</h4>
                  <div class="table-responsive">
                    <table class="table table-striped table-borderless">
                      <thead>
                        <tr>
                            <?php $no=1; ?>
                          <th>No</th>
                          <th>Nama Kelas</th>
                          <th>Nama Mentor</th>
                          <th>Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($infokelasToday as $item)
                        <tr>
                            <td>{{ $no++ }}</td>
                          <td class="font-weight-bold">{{$item->judul}}</td>
                          <td>{{$item->user->name}}</td>
                          <td class="font-weight-medium"><div class="badge badge-warning">{{$item->status}}</div></td>
                        </tr>
                      </tbody>
                        @endforeach
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-5 grid-margin stretch-card">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">Info Registrasi User</h4>
						    <ul class="list-unstyled list-unstyled-border list-unstyled-noborder">
                            @foreach ($info as $item)
                            <li class="media">
                            <img alt="image" class="mr-3 rounded-circle" width="70" src="assets/img/avatar/avatar-1.png">
                            <div class="media-body">
                                <div class="media-title text-truncate">{{$item->name}}</div>
                                <div class="text-time">{{$item->created_at}}</div>
                                <p class="text-truncate">Telah registrasi sebagai {{$item->level}}</p>
                                    <div class="media-links"><a href="#">View</a>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                    <div class="card-footer text-right">
                        <nav class="d-inline-block">
                            <ul class="pagination mb-0">
                                {{-- Previous Page Link --}}
                                @if ($info->onFirstPage())
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
                                    </li>
                                @else
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $info->previousPageUrl() }}"><i class="fas fa-chevron-left"></i></a>
                                    </li>
                                @endif

                                {{-- Page Links --}}
                                @for ($i = 1; $i <= $info->lastPage(); $i++)
                                    @if ($i == $info->currentPage())
                                        <li class="page-item active"><span class="page-link">{{ $i }}</span></li>
                                    @else
                                        <li class="page-item"><a class="page-link" href="{{ $info->url($i) }}">{{ $i }}</a></li>
                                    @endif
                                @endfor

                                {{-- Next Page Link --}}
                                @if ($info->hasMorePages())
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $info->nextPageUrl() }}"><i class="fas fa-chevron-right"></i></a>
                                    </li>
                                @else
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                                    </li>
                                @endif
                            </ul>
                        </nav>
                    </div>
                </div>
			</div>
        </div>

{{-- footer       --}}
@include('admin.layout.footer')
    </div>
  </div>

{{-- script --}}
@include('admin.layout.script')

</body>
</html>
