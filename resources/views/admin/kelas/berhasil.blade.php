
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
      <div class="section-header">
        <h1>Table</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        </div>
      </div>
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4>Data Kelas Berhasil di Publish</h4><br>
          <form action="{{ url('admin/kelas/berhasil')}}" method="get">
            <div class="input-group">
              <input type="text" class="form-control" name="search" placeholder="Search" value="{{ $searchQuery }}">
              <div class="input-group-btn">
                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
              </div>
            </div>
          </form>
              </div>
        <div class="card-body p-0">
          <div class="table-responsive">
            <table class="table table-striped" id="sortable-table">
              <thead>
                <tr>
                    <?php $no=1; ?>
                    <th>No</th>
                    <th>Nama Mentor</th>
                    <th>Judul</th>
                    <th>Gambar</th>
                    <th>Deskripsi</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    @if($kelas->count() > 0)
                      @foreach ($kelas as $item )
                  <tr>
                      <td>{{ $kelas->firstItem() + $loop->index }}</td>
                      <td>{{$item->user->name}}</td>
                      <td>{{$item->judul}}</td>
                      <td><img src="{{ url('/storage/' .$item->gambar)}}" style="width:70px" ></td>
                      <td>{{$item->deskripsi}}</td>
                      <td><div class="badge badge-success">{{$item->status}}</div></td>
                      <td>
                        <a class="btn btn-sm btn-success-outline" href="{{ route('admin.kelasDetail', $item->id) }}" title="info"><span class="fa fa-info"></span> Info |</a>
                        <a class="btn btn-sm btn-success-outline" href="{{ route('admin.kelasDetail', $item->id) }}" title="detail"><span class="fa fa-edit"></span> Detail |</a>
                        <a class="btn btn-sm btn-success-outline" href="{{ url('admin/hapus/' .$item->id) }}" title="Hapus"><span class="fa fa-trash"></span> Hapus |</a>
                      </td>
                  </tr>
                  @endforeach
                  @else
                    <tr>
                        <td colspan="7" class="text-center">Data tidak ada</td>
                    </tr>
                @endif
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer text-right">
            <nav class="d-inline-block">
                <ul class="pagination mb-0">
                    {{-- Previous Page Link --}}
                    @if ($kelas->onFirstPage())
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $kelas->previousPageUrl() }}"><i class="fas fa-chevron-left"></i></a>
                        </li>
                    @endif

                    {{-- Page Links --}}
                    @for ($i = 1; $i <= $kelas->lastPage(); $i++)
                        @if ($i == $kelas->currentPage())
                            <li class="page-item active"><span class="page-link">{{ $i }}</span></li>
                        @else
                            <li class="page-item"><a class="page-link" href="{{ $kelas->url($i) }}">{{ $i }}</a></li>
                        @endif
                    @endfor

                    {{-- Next Page Link --}}
                    @if ($kelas->hasMorePages())
                        <li class="page-item">
                            <a class="page-link" href="{{ $kelas->nextPageUrl() }}"><i class="fas fa-chevron-right"></i></a>
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
</div>
</section>
</div>

{{-- footer       --}}
@include('admin.layout.footer')
    </div>
  </div>

{{-- script --}}
@include('admin.layout.script')

@include('sweetalert::alert')

</body>
</html>
