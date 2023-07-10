@php
use App\Models\Rating;
use App\Models\History;
use App\Models\Materi;
@endphp

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>

    @include('layout.head')
    <title>Home</title>

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

            <div class="mdk-box mdk-box--bg-white-35 bg-white js-mdk-box mb-0" data-effects="parallax-background blend-background">
                <div class="mdk-box__bg">
                    <div class="mdk-box__bg-front" style="background-image: url(../learnly/public/images/study.jpeg);">
                    </div>
                </div>
                @auth
                <div class="mdk-box__content d-flex align-items-center justify-content-center container page__container text-center py-112pt" style="min-height: 656px;">
                    <div class="card card--transparent mb-0">
                        <div class="card-body px-32pt py-24pt">
                            <h1>Solusi Belajar Mandiri Online </h1>
                            <p class="lead measure-lead mx-auto mb-32pt">Semua solusi dari masalah belajar anda ada
                                disini </p>
                            </div>
                        </div>
                    </div>
                </div>

                @else
                <div class="mdk-box__content d-flex align-items-center justify-content-center container page__container text-center py-112pt" style="min-height: 656px;">
                    <div class="card card--transparent mb-0">
                        <div class="card-body px-32pt py-24pt">
                            <h1>Solusi Belajar Mandiri Online </h1>
                            <p class="lead measure-lead mx-auto mb-32pt">Semua solusi dari masalah belajar anda ada
                                disini </p>
                                <a href="/login" class="btn btn-lg btn-accent btn--raised mb-16pt">yuk mulai </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endauth
                <div class="page-section border-bottom-2">
                    <div class="container page__container">
                        <div class="page-separator">
                            <div class="page-separator__text">Kelas Belajar</div>
                        </div>

                        <div class="row card-group-row">
                            @if ($kelas->count() > 0)
                            @foreach ($kelas as $class)
                            <div class="col-md-6 col-lg-4 col-xl-3 card-group-row__col">
                                <div class="card card-sm card--elevated p-relative o-hidden overlay overlay--primary-dodger-blue js-overlay card-group-row__card" data-toggle="popover" data-trigger="click">
                                    <a href="student-course.html" class="card-img-top js-image" data-position="" data-height="140">
                                        <img width="400" height="210" src="{{ url('/storage/' . $class->gambar) }}" style="width:70px">
                                        <span class="overlay__content">
                                            <span class="overlay__action d-flex flex-column text-center">
                                                <i class="material-icons icon-32pt">play_circle_outline</i>
                                                <span class="card-title text-white">Preview</span>
                                            </span>
                                        </span>
                                    </a>
                                    <div class="card-body flex">
                                        <div class="d-flex">
                                            <div class="flex">
                                                <a class="card-title" href="student-course.html">{{ $class->judul }}</a>
                                                <small class="text-50 font-weight-bold mb-4pt">{{ $class->user->name }}
                                                </small>
                                            </div>
                                            <!-- <a href="student-course.html" data-toggle="tooltip" data-title="Add Favorite" data-placement="top" data-boundary="window" class="ml-4pt material-icons text-20 card-course__icon-favorite">favorite_border</a> -->
                                        </div>
                                        <div class="d-flex">
                                            <div class="rating flex">
                                                @php
                                                $kalkulasi = Rating::where('kelas_id', $class->id)->avg('rating');
                                                $rating = Rating::all();
                                                $bulatkan = floor($kalkulasi * 2) / 2;
                                                @endphp

                                                @if ($bulatkan == 1)
                                                <span class="rating__item">
                                                    <span class="material-icons">star</span>
                                                </span>
                                                <span class="rating__item">
                                                    <span>/{{ $class->rating->count() }}</span>
                                                </span>
                                                @elseif($bulatkan == 1.5)
                                                <span class="rating__item">
                                                    <span class="material-icons">star</span>
                                                </span>
                                                <span class="rating__item">
                                                    <span class="material-icons">star_border</span>
                                                </span>
                                                <span>/{{ $class->rating->count() }}</span>
                                                @elseif($bulatkan == 2)
                                                <span class="rating__item">
                                                    <span class="material-icons">star</span>
                                                </span>
                                                <span class="rating__item">
                                                    <span class="material-icons">star</span>
                                                </span>
                                                <span>/{{ $class->rating->count() }}</span>
                                                @elseif($bulatkan == 2.5)
                                                <span class="rating__item">
                                                    <span class="material-icons">star</span>
                                                </span>
                                                <span class="rating__item">
                                                    <span class="material-icons">star</span>
                                                </span>
                                                <span class="rating__item">
                                                    <span class="material-icons">star_border</span>
                                                </span>
                                                <span>/{{ $class->rating->count() }}</span>
                                                @elseif($bulatkan == 3)
                                                <span class="rating__item">
                                                    <span class="material-icons">star</span>
                                                </span>
                                                <span class="rating__item">
                                                    <span class="material-icons">star</span>
                                                </span>
                                                <span class="rating__item">
                                                    <span class="material-icons">star</span>
                                                </span>
                                                <span>/{{ $class->rating->count() }}</span>
                                                @elseif($bulatkan == 3.5)
                                                <span class="rating__item">
                                                    <span class="material-icons">star</span>
                                                </span>
                                                <span class="rating__item">
                                                    <span class="material-icons">star</span>
                                                </span>
                                                <span class="rating__item">
                                                    <span class="material-icons">star</span>
                                                </span>
                                                <span class="rating__item">
                                                    <span class="material-icons">star_border</span>
                                                </span>
                                                <span>/{{ $class->rating->count() }}</span>
                                                @elseif($bulatkan == 4)
                                                <span class="rating__item">
                                                    <span class="material-icons">star</span>
                                                </span>
                                                <span class="rating__item">
                                                    <span class="material-icons">star</span>
                                                </span>
                                                <span class="rating__item">
                                                    <span class="material-icons">star</span>
                                                </span>
                                                <span class="rating__item">
                                                    <span class="material-icons">star</span>
                                                </span>
                                                <span>/{{ $class->rating->count() }}</span>
                                                @elseif($bulatkan == 4.5)
                                                <span class="rating__item">
                                                    <span class="material-icons">star</span>
                                                </span>
                                                <span class="rating__item">
                                                    <span class="material-icons">star</span>
                                                </span>
                                                <span class="rating__item">
                                                    <span class="material-icons">star</span>
                                                </span>
                                                <span class="rating__item">
                                                    <span class="material-icons">star</span>
                                                </span>
                                                <span class="rating__item">
                                                    <span class="material-icons">star_border</span>
                                                </span>
                                                <span>/{{ $class->rating->count() }}</span>
                                                @elseif($bulatkan == 5)
                                                <span class="rating__item">
                                                    <span class="material-icons">star</span>
                                                </span>
                                                <span class="rating__item">
                                                    <span class="material-icons">star</span>
                                                </span>
                                                <span class="rating__item">
                                                    <span class="material-icons">star</span>
                                                </span>
                                                <span class="rating__item">
                                                    <span class="material-icons">star</span>
                                                </span>
                                                <span class="rating__item">
                                                    <span class="material-icons">star</span>
                                                </span>
                                                <span>/ {{ $class->rating->count() }}</span>
                                                @endif
                                            </div>
                                            <!-- <small class="text-50">6 hours</small> -->
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="row justify-content-between">
                                            <div class="col-auto d-flex align-items-center">
                                                <span class="material-icons icon-16pt text-50 mr-4pt">account_circle</span>
                                                <p class="flex text-50 lh-1 mb-0">
                                                    <small>{{ $class->subscription->count() }} Peserta
                                                    </small>
                                                </p>
                                            </div>
                                            <div class="col-auto d-flex align-items-center">
                                                <span class="material-icons icon-16pt text-50 mr-4pt">play_circle_outline</span>
                                                <p class="flex text-50 lh-1 mb-0"><small>{{ $class->materi->count() }}</small> Materi</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="popoverContainer d-none">
                                    <div class="media">
                                        <div class="media-left mr-12pt">
                                            <img src="{{ url('/storage/' . $class->gambar) }}" style="width:70px" width="40" height="40" alt="Angular" class="rounded">
                                        </div>
                                        <div class="media-body">
                                            <div class="card-title mb-0">{{ $class->judul }}</div>
                                            <div class="card-title mb-0"></div>
                                            <p class="lh-1 mb-0">
                                                <span class="text-50 small">by</span>
                                                <span class="text-50 small font-weight-bold">
                                                    {{ $class->user->name }} </span>
                                                </p>
                                            </div>
                                        </div>

                                        <p class="my-16pt text-70">{{ $class->deskripsi }}. kelas ini dibagi ke
                                            beberapa bab, diantaranya :
                                        </p>

                                        <div class="mb-16pt">
                                            @foreach ($class->materi as $materi)
                                            <div class="d-flex align-items-center">
                                                <span class="material-icons icon-16pt text-50 mr-8pt">check</span>
                                                <p class="flex text-50 lh-1 mb-0">
                                                    <small>{{ $materi->judul }}</small>
                                                </p>
                                            </div>
                                            @endforeach

                                        </div>

                                        <div class="row align-items-center" class="mb-12pt">
                                            <div class="col-auto">
                                            </div>
                                            <div class="col text-right">
                                                @php
                                                    $materi = Materi::where("kelas_id", $class->id)->whereNotIn("id", $history)->first();
                                                @endphp
                                                @if (empty($materi->id))
                                                    @php
                                                        $history = History::where("kelas_id", $class->id)
                                                        ->where("user_id", Auth::user()->id)
                                                        ->latest('materi_id')
                                                        ->first();
                                                    @endphp
                                                    <a href="{{ url('/member/class_detail/' . $class->id . '/' . $history->materi_id ) }}" class="btn btn-primary">
                                                        Lanjutkan Belajar
                                                    </a>
                                                @else
                                                <a href="{{ url('/member/class_detail/' . $class->id . '/' .$materi->id) }}" class="btn btn-primary">
                                                    Mulai Belajar
                                                </a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                @else
                                <div class="alert alert-primary" role="alert">
                                    Belum ada materi!
                                </div>
                                @endif
                            </div>
                        </div>

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

                        @include('layout.script')
                    </body>
                </html>
