@php
    use App\Models\Rating;
@endphp
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>

    @include('layout.head')

</head>

<body class="layout-sticky-subnav layout-learnly ">

    <div class="preloader">
        <div class="sk-chase">
            <div class="sk-chase-dot"></div>
            <div class="sk-chase-dot"></div>
            <div class="sk-chase-dot"></div>
            <div class="sk-chase-dot"></div>
            <div class="sk-chase-dot"></div>
            <div class="sk-chase-dot"></div>
        </div>

        <!-- <div class="sk-bounce">
    <div class="sk-bounce-dot"></div>
    <div class="sk-bounce-dot"></div>
  </div> -->

        <!-- More spinner examples at https://github.com/tobiasahlin/SpinKit/blob/master/examples.html -->
    </div>

    <!-- Header Layout -->
    <div class="mdk-header-layout js-mdk-header-layout">

        <!-- Header -->

        @include('layout.header2')

        <!-- // END Header -->

        <!-- Header Layout Content -->
        <div class="mdk-header-layout__content page-content ">

            <div class="page-section bg-alt border-bottom-2">
                <div class="container page__container">

                    <div class="d-flex flex-column flex-lg-row align-items-center">
                        <div
                            class="d-flex flex-column flex-md-row align-items-center flex mb-16pt mb-lg-0 text-center text-md-left">
                            <div class="avatar mb-16pt mb-md-0 mr-md-16pt">
                            </div>
                            <div class="flex">
                                <h1 class="h2 m-0">{{ ucwords($materi->judul) }}</h1>
                                <div class="rating mb-8pt d-inline-flex">
                                    <div class="rating__item"><i class="material-icons">star</i></div>
                                    <div class="rating__item"><i class="material-icons">star</i></div>
                                    <div class="rating__item"><i class="material-icons">star</i></div>
                                    <div class="rating__item"><i class="material-icons">star</i></div>
                                    <div class="rating__item"><i class="material-icons">star_border</i></div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>

            <div class="page-section">
                <div class="container page__container">

                    <div class="row">
                        <div class="col-lg-8">

                            <div class="js-player card bg-primary embed-responsive embed-responsive-16by9 mb-24pt">
                                <div class="player embed-responsive-item">
                                    <div class="player__content">
                                        <div class="player__image"
                                            style="--player-image: url(public/images/illustration/player.svg)"></div>
                                        <a href="" class="player__play bg-primary">
                                            <span class="material-icons">play_arrow</span>
                                        </a>
                                    </div>
                                    <div class="player__embed d-none">
                                        {{-- <iframe class="" id="aa"
                                            src="{{ url('/storage/' . $materi->isi_materi) }}"
                                        sandbox="allow-same-origin allow-popups allow-forms">
                                        </iframe> --}}
                                        <video src="{{ url('/storage/' . $materi->isi_materi) }}" id="media"
                                            name="media" controls></video>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                @if ($sebelumnya)
                                    <div class="col-md-6">
                                        <a href="{{ url('/member/class_detail/' . $kelas . '/' . $sebelumnya->id) }}">
                                            <div class="mb-24pt">
                                                <span
                                                    class="chip chip-outline-secondary d-inline-flex align-items-center">
                                                    <i class="material-icons icon--left">arrow_back</i>
                                                    Materi Sebelumnya
                                                </span>
                                            </div>
                                        </a>
                                    </div>
                                @endif

                                @if ($selanjutnya)
                                    <div class="col-md-6">
                                        <a href="{{ url('/member/class_detail/' . $kelas . '/' . $selanjutnya->id) }}">
                                            <div class="mb-24pt">
                                                <span
                                                    class="chip chip-outline-secondary d-inline-flex align-items-center">
                                                    Materi Selanjutnya
                                                    <i class="material-icons icon--left">arrow_forward</i>
                                                </span>
                                            </div>
                                        </a>
                                    </div>
                                @endif
                            </div>

                            <p class="lead measure-lead text-70 mb-24pt">{{ $materi->deskripsi }}</p>

                            <div class="accordion js-accordion accordion--boxed " id="parent">

                                <div class="accordion__item open">
                                    <a href="#" class="accordion__toggle" data-toggle="collapse"
                                        data-target="#course-toc-2" data-parent="#parent">
                                        <span class="flex">Daftar Materi</span>
                                        <span class="accordion__toggle-icon material-icons">keyboard_arrow_down</span>
                                    </a>
                                    <div class="accordion__menu collapse show" id="course-toc-2">
                                        @foreach ($materi_all as $item)
                                            @if ($item->id == $materi->id)
                                                <div class="accordion__menu-link active">
                                                @else
                                                    <div class="accordion__menu-link">
                                            @endif
                                            <span
                                                class="icon-holder icon-holder--small icon-holder--dark rounded-circle d-inline-flex icon--left">
                                                <i class="material-icons icon-16pt">play_circle_outline</i>
                                            </span>

                                            <a class="flex"
                                                href="{{ url('/member/class_detail/' . $item->kelas_id . '/' . $item->id) }}">{{ ucwords($item->judul) }}</a>
                                            {{-- <span class="text-muted">8m 42s</span> --}}
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="accordion__item">
                                <div class="accordion__menu collapse" id="course-toc-3">
                                    <div class="accordion__menu-link">
                                    </div>
                                </div>
                            </div>
                            @if ($selanjutnya)
                            @else
                                @php
                                    $rating = Rating::where('materi_id', $materi->id)
                                        ->where('user_id', Auth::user()->id)
                                        ->first();
                                @endphp

                                @if ($rating)
                                    <button type="button" class="btn btn-success">
                                        <i class="fa fa-thumbs-up"></i> Anda Sudah Memberikan Rating Di Kelas Ini
                                    </button>
                                @else
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#staticBackdrop-{{ $materi->id }}">
                                        <i class="fa fa-star"></i> Berikan Rating
                                    </button>
                                @endif
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-4">


                        <div class="page-separator">
                            <div class="page-separator__text">Author</div>
                        </div>
                        <div class="media align-items-center mb-16pt">
                            <span class="media-left mr-16pt">
                                <img src="../learnly/public/images/user.png" width="40" alt="avatar"
                                    class="rounded-circle">
                            </span>
                            <div class="media-body">
                                <a class="card-title m-0" href="{{ url('member/mentor_profil/' . $materi->user->id) }}">
                                    {{ $materi->user->name }}
                                </a>
                                <p class="text-50 lh-1 mb-0">Instructor</p>
                            </div>
                        </div>
                        <p class="text-70">{{ $materi->user->deskripsi }}</p>
                        <div class="flex">
                            <form id="catatanForm" name="catatanForm"
                                action="{{ url('/member/class_detail/' . $kelas . '/' . $materi->id) . '/catatan' }}"
                                method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="timestamp" id="timestamp">

                                <div class="form-group">
                                    <label for="catatan" class="form-label">Add Catatan</label>
                                    <textarea class="form-control" name="catatan" id="catatan" rows="3"
                                        placeholder="Type here to reply to mentor ..." required=""></textarea>
                                </div>
                                <button class="btn btn-outline-secondary" onclick="submitCatatan()">Tambah
                                    Catatan</button>

                            </form>

                        </div>

                        <div class="accordion js-accordion accordion--boxed pt-3" id="parent">

                            <div class="accordion__item open">
                                <a href="#" class="accordion__toggle" data-toggle="collapse"
                                    data-target="#course-toc-2" data-parent="#parent">
                                    <span class="flex">Catatan</span>
                                    <span class="accordion__toggle-icon material-icons">keyboard_arrow_down</span>
                                </a>
                                <div class="accordion__menu collapse show" id="course-toc-2">
                                    @foreach ($catatans as $item)
                                        <div class="accordion__menu-link">
                                            <div class="d-flex mb-3"> <a href=""
                                                    class="avatar avatar-sm mr-12pt">
                                                    <span class="avatar-title rounded-circle">JF</span>
                                                </a>
                                            </div>
                                            <div class="flex username"> <a href=""
                                                    class="text-body"><strong>{{ $item->user->name }}</strong></a>
                                                <br>
                                                <div class="d-flex align-items-center">
                                                    <small
                                                        class="text-50 mr-2">{{ gmdate('i:s', $item->timestamp) }}</small>
                                                </div>
                                                <p class="mt-1 text-70">{{ $item->catatan }}</p>
                                                <div class="d-flex align-items-center">
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container page__container">
            <div class="d-flex mb-8"><a href="" class="avatar avatar-sm mr-12pt"> <span
                        class="avatar-title rounded-circle">LB</span> </a>
                <div class="flex">
                    <form id="commentForm" name="commentForm"
                        action="{{ url('/member/class_detail/' . $kelas . '/' . $materi->id) . '/comment' }}"
                        method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="comment" class="form-label">Your comment</label>
                            <textarea class="form-control" name="comment" id="comment" rows="3"
                                placeholder="Type here to comment {{ $materi->user->name }} ..." required></textarea>
                        </div>
                        <button class="btn btn-outline-secondary" ">Post comment</button>

                            </form>
                        </div>
                    </div>
                    <div class=" pt-3">
                                    <h4>{{ $comments->count() }} Comments</h4>
                                                    @foreach ($comments as $item)
                            <div class="d-flex mb-3"> <a href="" class="avatar avatar-sm mr-12pt">
                                    <!-- <img src="../../public/images/people/256/256_rsz_karl-s-973833-unsplash.jpg" alt="people" class="avatar-img rounded-circle"> -->
                                    <span class="avatar-title rounded-circle">JF</span>
                                </a>
                                <div class="flex username"> <a href=""
                                        class="text-body"><strong>{{ $item->user->name }}</strong></a> <br>
                                    <p class="mt-1 text-70">{{ $item->comment }}</p>
                                    <div class="d-flex align-items-center">
                                    </div>
                                </div>
                            </div>
                            @endforeach
                </div>
            </div>



            <div class="page-section bg-alt">
                <div class="container page__container">
                    <div class="page-separator">
                        <div class="page-separator__text">Feedback</div>
                    </div>

                    <div class="row">
                        @foreach ($ratings as $rating)
                            <div class="col-sm-6 col-md-4">
                                <div class="card card-feedback card-body">
                                    <blockquote class="blockquote mb-0">
                                        <p class="text-70 small mb-0">{{ $rating->ulasan }}</p>
                                    </blockquote>
                                </div>

                                <div class="media ml-12pt">
                                    <div class="media-left mr-12pt">
                                        <a href="student-profile.html" class="avatar avatar-sm">
                                            <!-- <img src="public/images/people/110/guy-.jpg" width="40" alt="avatar" class="rounded-circle"> -->
                                            <span class="avatar-title rounded-circle">UK</span>
                                        </a>
                                    </div>
                                    <div class="media-body media-middle">
                                        <a href="student-profile.html"
                                            class="card-title">{{ $rating->user->name }}</a>
                                        <div class="rating mt-4pt">
                                            {{ $rating->rating }}

                                            @for ($i = 1; $i <= 5; $i++)
                                                @if ($i <= $rating->rating)
                                                    <span class="rating__item"><span
                                                            class="material-icons">star</span></span>
                                                @else
                                                    <span class="rating__item"><span
                                                            class="material-icons">star_border</span></span>
                                                @endif
                                            @endfor

                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
        <!-- // END Header Layout Content -->

        <!-- Footer -->

    </div>
    <!-- // END Header Layout -->

    <!-- Drawer -->

    <div class="mdk-drawer js-mdk-drawer" id="default-drawer">
        <div class="mdk-drawer__content">
            <div class="sidebar sidebar-light sidebar-light-dodger-blue sidebar-left" data-perfect-scrollbar>

                <!-- Sidebar Content -->

                @include('layout.sidebar')

                <!-- // END Sidebar Content -->

            </div>
        </div>
    </div>

    <!-- // END Drawer -->

    <!-- jQuery -->
    <div class="modal fade" id="staticBackdrop-{{ $materi->id }}" data-backdrop="static" data-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Berikan Rating Untuk Kelas ini</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="{{ url('/member/rating/' . $materi->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <input type="radio" name="rating" id="rating"
                                        aria-label="Radio button for following text input" value="1">
                                </div>
                            </div>
                            <div class="ml-2 mt-1">
                                <i class="fa fa-star"></i>
                            </div>
                        </div>
                        <br>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <input type="radio" name="rating" id="rating"
                                        aria-label="Radio button for following text input" value="2">
                                </div>
                            </div>
                            <div class="ml-2 mt-1">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                        </div>
                        <br>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <input type="radio" name="rating" id="rating"
                                        aria-label="Radio button for following text input" value="3">
                                </div>
                            </div>
                            <div class="ml-2 mt-1">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                        </div>
                        <br>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <input type="radio" name="rating" id="rating"
                                        aria-label="Radio button for following text input" value="4">
                                </div>
                            </div>
                            <div class="ml-2 mt-1">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                        </div>
                        <br>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <input type="radio" name="rating" id="rating"
                                        aria-label="Radio button for following text input" value="5">
                                </div>
                            </div>
                            <div class="ml-2 mt-1">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                        </div>
                        <div class="input-group">
                            <div class="flex input-group-text">
                                <textarea class="form-control" name="ulasan" id="ulasan" rows="3"
                                    placeholder="Berikan ulasan terkait kelas ini ..."></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-secondary">
                            Batal
                        </button>
                        <button type="submit" class="btn btn-primary">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
@include('layout.script')

<script>
    let video = document.getElementById("media");
    video.seekable.start();
    video.seekable.end();

    function submitCatatan(e) {
        let timestamp = document.getElementById("timestamp");
        timestamp.value = video.currentTime;
        e.preventDefault();
    }
    $('#commentForm').submit(function(event) {
        event.preventDefault();
    });
</script>

</html>
