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
          <div class="breadcrumb-item">Table</div>
        </div>
      </div>
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h2>Data Admin</h2><br>
          <a href="{{ url('admin/akun/tambah') }}" class="btn btn-outline-primary">Tambah</a>
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
                  <th>Level</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($user as $item )
                <tr>
                  <td>{{ $no++ }}</td>
                  <td>{{$item->name}}</td>
                  <td>{{$item->email}}</td>
                  <td>{{$item->level }}</td>
                  <td>
                    <a class="btn btn-sm btn-success-outline" href="{{ url('admin/akun/edit/' .$item->id) }}" title="Edit"><span class="fa fa-edit"></span> Edit |</a>
                    <button class="btn btn-sm btn-success-outline" data-toggle="modal" data-target="#myModal{{ $item->id }}s" ><span class="fa fa-info-circle"></span></button>
                </td>
                </tr>
                <tr>
              </tbody>
              @php
                  $id = $item->id;
              @endphp
              @endforeach
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
          <img src="{{ url('/storage/'.Auth::user()->foto) }}" style="width: 150px; height:150px"
          class="img-thumbnail rounded-circle mx-auto d-block">
          @else
            <img src="{{ asset('img/90x90.jpg') }}" alt="Placeholder Image" style="max-width: 100%;">
          @endif
          <p>Alamat : {{$item->alamat}}</p>
          <p>Jenis Kelamin : {{$item->jenis_kelamin}}</p>
          <p>Nomor Telepon : {{$item->nomor_telepon}}</p>
          <p>Pekerjaan : {{$item->pekerjaan}}</p>
          <p>Deskripsi : {{$item->deskripsi}}</p>
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
