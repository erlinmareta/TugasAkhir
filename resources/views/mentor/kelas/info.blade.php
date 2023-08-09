
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Dashboard Mentor</title>
    @include('mentor.layout.head')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <style>
        /* Pagination Styles */
        .pagination-container {
            margin-top: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .pagination {
            display: flex;
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .pagination li {
            margin: 0 2px;
        }

        .pagination li a,
        .pagination li span {
            display: block;
            padding: 6px 12px;
            text-decoration: none;
            color: #333;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        .pagination li a:hover {
            background-color: #f5f5f5;
        }

        .pagination li.active span {
            background-color: #007bff;
            color: #fff;
            border-color: #007bff;
        }

        .pagination li.disabled span {
            color: #ddd;
        }

        /* Optional: Center the pagination on small screens */
        @media (max-width: 576px) {
            .pagination-container {
                justify-content: center;
            }
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
      <div class="col-md-4 stretch-card grid-margin">
        <div class="card">
            <div class="card-body">
                <h2>{{ $kelas->judul }}</h2>
                <h3>Telah Diikuti oleh: {{ count($kelas->subscription) }} Peserta</h3>
                <div class="class-rating">
                    @if ($kelas->subscription->count() > 0)
                        @for ($i = 1; $i <= 5; $i++)
                            @if ($i <= $kelas->rating->avg('rating'))
                                <span class="rating__item"><span class="material-icons">star</span></span>
                            @else
                                <span class="rating__item"><span class="material-icons">star_border</span></span>
                            @endif
                        @endfor
                    @else
                        <span class="rating__item">Belum Memiliki Rating.</span>
                    @endif
                </div>

            <br>
            <hr>
            <div class="col-md-16 stretch-card grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4>Daftar Rating Peserta</h4>
                        <ul class="icon-data-list">
                            @foreach ($rating as $item)
                            <li class="d-flex mb-3">
                                @if ($item->user->foto)
                                <img src="{{ url('/storage/'.$item->user->foto) }}" style="width: 50px; height:50px"
                                class="img-thumbnail rounded-circle mx-auto d-block">
                                @else
                                  <img src="{{ asset('img/user.jpg') }}" alt="Placeholder Image" style="width: 50px; height:50px"
                                  class="img-thumbnail rounded-circle mx-auto d-block">
                                @endif
                                <div class="ml-3">
                                    <p class="text-info mb-1">{{$item->user->name}} / {{ $item->rating }}</p>
                                    <p class="mb-0">{{$item->kelas->judul}}</p>
                                    <p>{{$item->ulasan}}</p>
                                    <small>{{$item->created_at}}</small>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <div class="pagination-container">
                <ul class="pagination">
                    <!-- Anggap $kelas adalah objek pagination dari controller -->
                    {!! $rating->links('pagination.bootstrap-4') !!}
                </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  @include('mentor.layout.script')

  @include('sweetalert::alert')
  <!-- End custom js for this page-->
</body>

</html>
