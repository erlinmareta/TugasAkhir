<!DOCTYPE html>
<html lang="en">
<head>
  {{-- Include the head content --}}
  @include('admin.layout.head')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
  {{-- Include the navbar --}}
  @include('admin.layout.navbar')

  {{-- Include the sidebar --}}
  @include('admin.layout.sidebar')

  <!-- Main Content -->
  <div class="main-content">
    <section class="section">
      <div class="section-header">
        <div class="section-header-breadcrumb">
          {{-- You can add breadcrumb content here --}}
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h2>{{ $kelas->judul }}</h2>
              </div>
            <div class="class-rating">
              @if ($kelas->subscription->count() > 0)
                @for ($i = 1; $i <= 5; $i++)
                  @if ($i <= $kelas->rating->avg('rating'))
                    <span class="rating__item"><i class="fas fa-star"></i></span>
                  @else
                    <span class="rating__item"><i class="far fa-star"></i></span>
                  @endif
                @endfor
              @else
                <span class="rating__item">Belum Memiliki Rating.</span>
              @endif

        </div>
            <div class="card-body p-0">
              <p>Telah Diikuti oleh: {{ count($kelas->subscription) }} Peserta</p>
              {{-- You can add content for the card body here --}}
              <div class="table-responsive">
                <ul class="icon-data-list">
                    <h4>Daftar Rating Peserta</h4>
                    @foreach ($rating as $item)
                    <li>
                      <div class="d-flex">
                        <img src="images/faces/face1.jpg" alt="user">
                        <div class="ml-3">
                          <p class="text-info mb-1">{{$item->user->name}} /  {{ $item->rating }}</p>
                          <p class="mb-0">{{$item->kelas->judul}}</p>
                          <p>{{$item->ulasan}}</p>
                          <small>{{$item->created_at}}</small>
                        </div>
                      </div>
                    </li>
                    @endforeach
                  </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  @include('admin.layout.footer')

  </div>
</div>

@include('admin.layout.script')

@include('sweetalert::alert')

</body>
</html>
