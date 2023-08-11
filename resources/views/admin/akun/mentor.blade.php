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
        <div class="section-header-breadcrumb">
        </div>
      </div>
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h2>Data Mentor</h2>
          <form action="{{ url('admin/akun/mentor')}}" method="get">
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
                  <th>Nama</th>
                  <th>Email</th>
                  <th>No Telepon</th>
                  <th>Level</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @if($user->count() > 0)
                @foreach ($user as $item )
                <tr>
                  <td>{{ $no++ }}</td>
                  <td>{{$item->name}}</td>
                  <td>{{$item->email}}</td>
                  <td>{{$item->nomor_telepon}}</td>
                  <td>{{$item->level }}</td>
                  <td>
                    <a class="btn btn-sm btn-success-outline" href="{{ url('admin/akun/hapus/' .$item->id) }}" title="Hapus"><span class="fa fa-trash"></span> Hapus |</a>
                    <button class="btn btn-sm btn-success-outline" data-toggle="modal" data-target="#myModal{{ $item->id }}s" ><span class="fa fa-info-circle"></span></button>
                </td>
                </tr>
                <tr>
              </tbody>
              @php
                  $id = $item->id;
              @endphp
              @endforeach
              @else
              <tr>
                  <td colspan="7" class="text-center">Data tidak ada</td>
              </tr>
          @endif
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</section>
</div>
@foreach ($user as $item)
<div class="modal" tabindex="-1" id="myModal{{ $item->id }}s">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">{{$item->name}}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          @if ($item->foto)
          <img src="{{ url('/storage/'.$item->foto) }}" style="width: 150px; height:150px"
          class="img-thumbnail rounded-circle mx-auto d-block">
          @else
            <img src="{{ asset('img/90x90.jpg') }}" alt="Placeholder Image" style="width: 150px; height:150px"
            class="img-thumbnail rounded-circle mx-auto d-block">
          @endif
          <p>Alamat : {{$item->alamat}}</p>
          <p>Jenis Kelamin : {{$item->jenis_kelamin}}</p>
          <p>Nomor Telepon : {{$item->nomor_telepon}}</p>
          <p>Pekerjaan : {{$item->pekerjaan}}</p>
          <p>Deskripsi : {{$item->deskripsi}}</p>
          <p>Riwayat Pendidikan :</p>
          <ul>
            @if(isset($pendidikan[$item->id]))
            @foreach ($pendidikan[$item->id] as $pendidikanItem)
            @if ($pendidikanItem->sd)
                <li>SD: {{ $pendidikanItem->sd }}</li>
            @endif
            @if ($pendidikanItem->smp)
                <li>SMP: {{ $pendidikanItem->smp }}</li>
            @endif
            @if ($pendidikanItem->sma)
                <li>SMA: {{ $pendidikanItem->sma }}</li>
            @endif
            @if ($pendidikanItem->d1)
                <li>Diploma 1/D1: {{ $pendidikanItem->d1 }}</li>
            @endif
            @if ($pendidikanItem->d2)
                <li>Diploma 2/D2: {{ $pendidikanItem->d2 }}</li>
            @endif
            @if ($pendidikanItem->d3)
                <li>Diploma 3/D3: {{ $pendidikanItem->smp }}</li>
            @endif
            @if ($pendidikanItem->d4)
                <li>Sarjana/S1: {{ $pendidikanItem->d4 }}</li>
            @endif
            @if ($pendidikanItem->s2)
                <li>Pascasarjana/S2: {{ $pendidikanItem->s2 }}</li>
            @endif
            @if ($pendidikanItem->s3)
                <li>Doctor/S3: {{ $pendidikanItem->s3 }}</li>
            @endif

            @endforeach
        @endif
        </ul>
        </div>
        <div class="modal-footer">
        </div>
      </div>
    </div>
</div>
@endforeach
{{-- footer       --}}
@include('admin.layout.footer')
    </div>
  </div>

{{-- script --}}
@include('admin.layout.script')

</body>
</html>
