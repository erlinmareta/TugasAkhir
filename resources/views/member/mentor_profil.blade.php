<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>

    @include('layout.head')
    <title>Mentor Profil || Student</title>

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

    @include('layout.header2')

    <!-- // END Header -->

    <!-- Header Layout Content -->
    <div class="mdk-header-layout__content page-content ">

        <div class="page-section bg-alt border-bottom-2">
            <div class="container page__container">

                <div class="d-flex flex-column flex-lg-row align-items-center">
                    <div
                        class="d-flex flex-column flex-md-row align-items-center flex mb-16pt mb-lg-0 text-center text-md-left">
                        <div class="mb-16pt mb-md-0 mr-md-24pt">
                            <img src="{{ url('/learnly/public/images/illustration/teacher/128/black.svg') }}"
                                width="104" alt="teacher">
                        </div>
                        <div class="flex">
                            <h1 class="h2 mb-0">{{ $datamentor->name }}</h1>
                            <div class="rating mb-16pt d-inline-flex">

                            </div>
                            <div>
                                <span class="chip chip-outline-secondary d-inline-flex align-items-center"
                                    data-toggle="tooltip" data-title="Experience IQ" data-placement="bottom">
                                    <i class="material-icons icon--left">opacity</i>
                                    @if ($jumlahsubscribe > 50)
                                        Profesional
                                    @elseif($jumlahsubscribe > 20)
                                        Advance
                                    @else
                                        Beginer
                                    @endif
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="ml-lg-16pt">
                    </div>
                </div>

            </div>
        </div>

        <div class="page-section">
            <div class="container page__container">

                <div class="row">
                    <div class="col-lg-8">


                        <div class="row card-group-row">
                            @if ($datakelas->count() > 0)
                                @foreach ($datakelas as $datakelass)
                                    <div class="col-sm-6 col-xl-4 card-group-row__col">
                                        <div class="card card-sm card--elevated p-relative o-hidden overlay overlay--primary-dodger-
                                        blue js-overlay card-group-row__card undefined"
                                            data-toggle="popover" data-trigger="click">
                                            <a href="{{ url('member/class_detail/' . $datakelass->id) . '/' . $datakelass->materi->first()->id }}"
                                                class="card-img-top js-image" data-position="" data-height="140">
                                                <img src="{{ url('/storage/' . $datakelass->gambar) }}"
                                                    style="width:70px" width="40" height="40" alt="Angular"
                                                    class="rounded">
                                                <span class="overlay__content">
                                                    <span class="overlay__action d-flex flex-column text-center">
                                                        <i class="material-icons icon-32pt">play_circle_outline</i>
                                                        <span class="card-title text-white">Resume</span>
                                                    </span>
                                                </span>
                                            </a>

                                            <div class="card-body flex">
                                                <div class="d-flex">
                                                    <div class="flex">
                                                        <a class="card-title"
                                                            href="{{ url('member/class_detail/' . $datakelass->id) . '/' . $datakelass->materi->first()->id }}">
                                                            {{ $datakelass->judul }}</a>
                                                    </div>

                                                </div>
                                                <div class="d-flex">
                                                    <div class="rating flex">
                                                        @for ($i = 1; $i <= 5; $i++)
                                                            @if ($i <= $datakelass->rating->avg('rating'))
                                                                <span class="rating__item"><span
                                                                        class="material-icons">star</span></span>
                                                            @else
                                                                <span class="rating__item"><span
                                                                        class="material-icons">star_border</span></span>
                                                            @endif
                                                        @endfor
                                                    </div>
                                                    <small
                                                        class="text-muted">{{ floor($datakelass->rating->avg('rating')) }}/5
                                                    </small>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <div class="row justify-content-between">
                                                    <div class="col-auto d-flex align-items-center">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                @endforeach
                            @else
                                <div class="alert alert-primary" role="alert">
                                    Belum ada ada kelas pembelajaran !
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <h4>Tentang Saya</h4>
                        <p class="text-70 mb-24pt">{{ $datamentor->deskripsi }}</p>

                        <div class="page-separator">
                            <div class="page-separator__text"></div>
                        </div>

                        <h4>Riwayat Pendidikan</h4>
                    <ul>
                        @if(isset($pendidikan))
                            @foreach ($pendidikan as $pendidikanItem)
                            @if ($pendidikanItem->sd)
                            <li><i class="fas fa-graduation-cap"></i> SD: {{ $pendidikanItem->sd }}</li>
                        @endif
                        @if ($pendidikanItem->smp)
                            <li><i class="fas fa-graduation-cap"></i> SMP: {{ $pendidikanItem->smp }}</li>
                        @endif
                        @if ($pendidikanItem->sma)
                            <li><i class="fas fa-graduation-cap"></i> SMA: {{ $pendidikanItem->sma }}</li>
                        @endif
                        @if ($pendidikanItem->d1)
                            <li><i class="fas fa-graduation-cap"></i> Diploma 1/D1: {{ $pendidikanItem->d1 }}</li>
                        @endif
                        @if ($pendidikanItem->d2)
                            <li><i class="fas fa-graduation-cap"></i> Diploma 2/D2: {{ $pendidikanItem->d2 }}</li>
                        @endif
                        @if ($pendidikanItem->d3)
                            <li><i class="fas fa-graduation-cap"></i> Diploma 3/D3: {{ $pendidikanItem->smp }}</li>
                        @endif
                        @if ($pendidikanItem->d4)
                            <li><i class="fas fa-graduation-cap"></i> Sarjana/S1: {{ $pendidikanItem->d4 }}</li>
                        @endif
                        @if ($pendidikanItem->s2)
                            <li><i class="fas fa-graduation-cap"></i> Pascasarjana/S2: {{ $pendidikanItem->s2 }}</li>
                        @endif
                        @if ($pendidikanItem->s3)
                            <li><i class="fas fa-graduation-cap"></i> Doctor/S3: {{ $pendidikanItem->s3 }}</li>
                        @endif
                            @endforeach
                        @endif
                    </ul>
                    <div class="page-separator">
                        <div class="page-separator__text"></div>
                    </div>

                    <h4>Contact</h4>
                    <p><i class="fas fa-envelope"></i> <span class="icon-text">Email:</span> {{ $datamentor->email }}</p>
                    <p><i class="fas fa-phone"></i> <span class="icon-text">Phone:</span> {{ $datamentor->nomor_telepon }}</p>
                </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mdk-drawer js-mdk-drawer" id="default-drawer">
        <div class="mdk-drawer__content">
            <div class="sidebar sidebar-light sidebar-light-dodger-blue sidebar-left" data-perfect-scrollbar>

            </div>
        </div>
    </div>

    <!-- jQuery -->
    @include('layout.script')

    </body>
</html>
