
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
          <h4>Data Kelas Masuk</h4><br>
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
                    @foreach ($kelas as $item )
                  <tr>
                      <td>{{ $no++ }}</td>
                      <td>{{$item->user->name}}</td>
                      <td>{{$item->judul}}</td>
                      <td><img src="{{ url('/storage/' .$item->gambar)}}" style="width:70px" ></td>
                      <td>{{$item->deskripsi}}</td>
                      <div class="badge badge-success"><td>{{$item->status}}</td>
                      <td>
                        <a class="btn btn-sm btn-success-outline" href="{{ route('admin.kelasDetail', $item->id) }}" title="detail"><span class="fa fa-edit"></span> Detail |</a>
                          <a class="btn btn-sm btn-success-outline" href="{{ url('admin/kelas_masuk/' . $item->id) }}/publish" title="publish"> Publish |</a>
                          <a class="btn btn-sm btn-success-outline" data-toggle="modal" data-target="#myModals{{$item->id}}" title="reject"> Reject |</a>
                        </td>
                  </tr>
                  @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</section>
</div>

{{-- modal  --}}
@foreach ($kelas as $item )
<div class="modal" tabindex="-1" id="myModals{{$item->id}}">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Alasan menolak Kelas ini</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{url ('/admin/index/'.$item->id.'/reject')}}" method="post">
            @csrf
            <div class="modal-body">
                <input type="text" class="form-control phone-number" name="alasan" id="alasan">
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
        </form>
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

@include('sweetalert::alert')

</body>
</html>
