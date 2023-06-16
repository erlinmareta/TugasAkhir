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

            <div class="mdk-box mdk-box--bg-white-35 bg-white js-mdk-box mb-0"
                data-effects="parallax-background blend-background">
                <div class="mdk-box__bg">
                    <div class="mdk-box__bg-front" style="background-image: url(../learnly/public/images/study.jpeg);">
                    </div>
                </div>
                <div class="mdk-box__content d-flex align-items-center justify-content-center container page__container text-center py-112pt"
                    style="min-height: 656px;">
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
            <div class="page-section border-bottom-2">
                <div class="container page__container">
                    <div class="page-separator">
                        <div class="page-separator__text">Kelas Belajar</div>
                    </div>

                    <div class="row card-group-row">
                        @if ($kelas->count() > 0)
                        @foreach ($kelas as $item)
                        <div class="col-md-6 col-lg-4 col-xl-3 card-group-row__col">
                            <div class="card card-sm card--elevated p-relative o-hidden overlay overlay--primary-dodger-blue js-overlay card-group-row__card"
                                data-toggle="popover" data-trigger="click">
                                <a href="student-course.html" class="card-img-top js-image" data-position=""
                                    data-height="140">
                                    <img width="400" height="210" src="{{ url('/storage/' .$item->gambar)}}" style="width:70px" >
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
                                            <a class="card-title" href="student-course.html">{{ $item->judul }}</a>
                                            <small class="text-50 font-weight-bold mb-4pt">{{ $item->user->name }}
                                            </small>
                                        </div>
                                        <a href="student-course.html"data-toggle="tooltip" data-title="Add Favorite"
                                            data-placement="top" data-boundary="window"
                                            class="ml-4pt material-icons text-20 card-course__icon-favorite">favorite_border</a>
                                    </div>
                                    <div class="d-flex">
                                        <div class="rating flex">
                                            <span class="rating__item"><span
                                                    class="material-icons">star</span></span>
                                            <span class="rating__item"><span
                                                    class="material-icons">star</span></span>
                                            <span class="rating__item"><span
                                                    class="material-icons">star</span></span>
                                            <span class="rating__item"><span
                                                    class="material-icons">star_border</span></span>
                                            <span class="rating__item"><span
                                                    class="material-icons">star_border</span></span>
                                        </div>
                                        <!-- <small class="text-50">6 hours</small> -->
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="row justify-content-between">
                                        <div class="col-auto d-flex align-items-center">
                                            <span
                                                class="material-icons icon-16pt text-50 mr-4pt">account_circle</span>
                                            <p class="flex text-50 lh-1 mb-0"><small>7 siswa</small></p>
                                        </div>
                                        <div class="col-auto d-flex align-items-center">
                                            <span
                                                class="material-icons icon-16pt text-50 mr-4pt">play_circle_outline</span>
                                            <p class="flex text-50 lh-1 mb-0"><small>12 Materi</small></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="popoverContainer d-none">
                                <div class="media">
                                    <div class="media-left mr-12pt">
                                        <img src="{{ url('/storage/' .$item->gambar)}}" style="width:70px"
                                            width="40" height="40" alt="Angular" class="rounded">
                                    </div>
                                    <div class="media-body">
                                        <div class="card-title mb-0">{{ $item->judul }}</div>
                                        <div class="card-title mb-0"></div>
                                        <p class="lh-1 mb-0">
                                            <span class="text-50 small">by</span>
                                            <span class="text-50 small font-weight-bold">
                                                {{ $item->user->name }} </span>
                                        </p>
                                    </div>
                                </div>

                                <p class="my-16pt text-70">{{ $item->deskripsi }}. kelas ini dibagi
                                    ke
                                    beberapa bab, diantaranya :
                                </p>

                                <div class="mb-16pt">
                                    @foreach ($item->materi as $materi)
                                        <div class="d-flex align-items-center">
                                            <span class="material-icons icon-16pt text-50 mr-8pt">check</span>
                                            <p class="flex text-50 lh-1 mb-0"><small>{{ $item->judul }}</small>
                                            </p>
                                        </div>
                                    @endforeach

                                </div>

                                <div class="row align-items-center">
                                    <div class="col-auto">
                                    </div>
                                    <div class="col text-right">
                                        <a href="{{ url('member/class_detail/' . $item->id) . '/' . $item->materi[0]->id }}"
                                            class="btn btn-primary">Mulai
                                            Belajar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                        @else
                        <div class="alert alert-primary" role="alert">
                            A simple primary alert—check it out!
                          </div>
                        @endif


                        {{-- <div class="col-md-6 col-lg-4 col-xl-3 card-group-row__col">
                            <div class="card card-sm card--elevated p-relative o-hidden overlay overlay--primary-dodger-blue js-overlay card-group-row__card"
                                data-toggle="popover" data-trigger="click">
                                <a href="student-course.html" class="card-img-top js-image" data-position=""
                                    data-height="140">
                                    <img width="400" height="210"
                                        src="../learnly/public/images/Lymphoma-bro.png" alt="course">
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
                                            <a class="card-title" href="student-course.html">Sistem Saraf pada
                                                manusia</a>
                                            <small class="text-50 font-weight-bold mb-4pt">Erlin Maresta</small>
                                        </div>
                                        <a href="student-course.html"data-toggle="tooltip" data-title="Add Favorite"
                                            data-placement="top" data-boundary="window"
                                            class="ml-4pt material-icons text-20 card-course__icon-favorite">favorite_border</a>
                                    </div>
                                    <div class="d-flex">
                                        <div class="rating flex">
                                            <span class="rating__item"><span class="material-icons">star</span></span>
                                            <span class="rating__item"><span class="material-icons">star</span></span>
                                            <span class="rating__item"><span class="material-icons">star</span></span>
                                            <span class="rating__item"><span
                                                    class="material-icons">star_border</span></span>
                                            <span class="rating__item"><span
                                                    class="material-icons">star_border</span></span>
                                        </div>
                                        <!-- <small class="text-50">6 hours</small> -->
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="row justify-content-between">
                                        <div class="col-auto d-flex align-items-center">
                                            <span class="material-icons icon-16pt text-50 mr-4pt">account_circle</span>
                                            <p class="flex text-50 lh-1 mb-0"><small>7 siswa</small></p>
                                        </div>
                                        <div class="col-auto d-flex align-items-center">
                                            <span
                                                class="material-icons icon-16pt text-50 mr-4pt">play_circle_outline</span>
                                            <p class="flex text-50 lh-1 mb-0"><small>12 Materi</small></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="popoverContainer d-none">
                                <div class="media">
                                    <div class="media-left mr-12pt">
                                        <img src="../learnly/public/images/Lymphoma-bro.png" alt="course"
                                            width="40" height="40" alt="Angular" class="rounded">
                                    </div>
                                    <div class="media-body">
                                        <div class="card-title mb-0">Sistem Saraf Pada Manusia</div>
                                        <div class="card-title mb-0"></div>
                                        <p class="lh-1 mb-0">
                                            <span class="text-50 small">by</span>
                                            <span class="text-50 small font-weight-bold">Erlin Maresta</span>
                                        </p>
                                    </div>
                                </div>

                                <p class="my-16pt text-70">Kelas ini berisi tentang materi Sistem Saraf pada
                                    manusia,dari segala kalangan bisa mengikuti kelas ini,
                                    materi belajar yang menarik yang disajikan menggunakan video. kelas ini dibagi ke
                                    beberapa bab, diantaranya :
                                </p>

                                <div class="mb-16pt">
                                    <div class="d-flex align-items-center">
                                        <span class="material-icons icon-16pt text-50 mr-8pt">check</span>
                                        <p class="flex text-50 lh-1 mb-0"><small>peran sistem saraf pada
                                                manusia</small></p>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <span class="material-icons icon-16pt text-50 mr-8pt">check</span>
                                        <p class="flex text-50 lh-1 mb-0"><small>fungsi sistem saraf pada tubuh
                                                manusia</small></p>
                                    </div>
                                </div>

                                <div class="row align-items-center">
                                    <div class="col-auto">
                                    </div>
                                    <div class="col text-right">
                                        <a href="{{ url('member/class_detail/' . $materi->id) }}"
                                            class="btn btn-primary">Mulai
                                            Belajar</a>
                                    </div>
                                </div>
                            </div>
                        </div> --}}

                    </div>
                </div>



                <!-- // END Header Layout Content -->

                <!-- Feedback -->

                @include('layout.feedback')


                <!-- Footer -->

                <!-- // END Footer -->

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
            @include('layout.script')

</body>

</html>
