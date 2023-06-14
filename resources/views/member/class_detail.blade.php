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
                        <div class="ml-lg-16pt">
                            <a href="courses.html" class="btn btn-light">Library</a>
                        </div>
                    </div>

                </div>
            </div>

            <div class="page-section border-bottom-2">
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
                                        <iframe class="" src="{{ url('/storage/' . $materi->isi_materi) }}"
                                            sandbox="allow-same-origin allow-popups allow-forms">
                                            <video src="{{ url($materi->isi_materi) }}" controls></video>
                                        </iframe>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-24pt">
                                <span class="chip chip-outline-secondary d-inline-flex align-items-center">Materi
                                    Selanjutnya
                                    <i class="material-icons icon--left">arrow_forward</i>
                                </span>
                            </div>

                            <p class="lead measure-lead text-70 mb-24pt">{{ $materi->deskripsi }}</p>

                            <div class="accordion js-accordion accordion--boxed " id="parent">
                                <div class="accordion__item">
                                    <div class="accordion__menu collapse" id="course-toc-1">
                                        <div class="accordion__menu-link">
                                        </div>
                                    </div>
                                </div>
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
                                                href="{{ url('/member/class_detail/' . $item->id) }}">{{ ucwords($item->judul) }}</a>
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
                            <div class="accordion__item">
                                <div class="accordion__menu collapse"id="course-toc-4">
                                    <div class="accordion__menu-link">
                                    </div>
                                </div>
                            </div>
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
                                <a class="card-title m-0" href="{{ url('member/mentor_profil') }}">Eddie Bryan</a>
                                <p class="text-50 lh-1 mb-0">Instructor</p>
                            </div>
                        </div>
                        <p class="text-70">{{ $materi->deskripsi }}</p>

                        <a href="teacher-profile.html" class="btn btn-white mb-24pt">Follow</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex mb-8"><a href="" class="avatar avatar-sm mr-12pt"> <span
                    class="avatar-title rounded-circle">LB</span> </a>
            <div class="flex">
                <div class="form-group">
                    <label for="comment" class="form-label">Your reply</label>
                    <textarea class="form-control" name="comment" id="comment" rows="3"
                        placeholder="Type here to reply to Matney ..."></textarea>
                </div>
                <button class="btn btn-outline-secondary">Post comment</button>
            </div>
        </div>
        <div class="pt-3">
            <h4>2 Comments</h4>
            <div class="d-flex mb-3"> <a href="" class="avatar avatar-sm mr-12pt">
                    <!-- <img src="../../public/images/people/256/256_rsz_karl-s-973833-unsplash.jpg" alt="people" class="avatar-img rounded-circle"> -->
                    <span class="avatar-title rounded-circle">JF</span>
                </a>
                <div class="flex"> <a href="" class="text-body"><strong>Joseph S.
                            Ferland</strong></a><br>
                    <p class="mt-1 text-70">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero neque
                        magnam modi corrupti in aliquid odit eligendi pariatur! Ad consequatur illo voluptates,
                        dignissimos tenetur odit magni excepturi! Nesciunt, fuga, vel.</p>
                    <div class="d-flex align-items-center">
                        <small class="text-50 mr-2">27 min ago</small>
                        <a href="" class="text-50"><small>Liked</small></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="page-section bg-alt">
            <div class="container page__container">
                <div class="page-separator">
                    <div class="page-separator__text">Feedback</div>
                </div>

                <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <div class="card card-feedback card-body">
                            <blockquote class="blockquote mb-0">
                                <p class="text-70 small mb-0">A wonderful course on how to start. Eddie beautifully
                                    conveys all essentials of a becoming a good Angular developer. Very glad to have
                                    taken this course. Thank you Eddie Bryan.</p>
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
                                <a href="student-profile.html" class="card-title">Umberto Kass</a>
                                <div class="rating mt-4pt">
                                    <span class="rating__item"><span class="material-icons">star</span></span>
                                    <span class="rating__item"><span class="material-icons">star</span></span>
                                    <span class="rating__item"><span class="material-icons">star</span></span>
                                    <span class="rating__item"><span class="material-icons">star</span></span>
                                    <span class="rating__item"><span class="material-icons">star_border</span></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-4">
                        <div class="card card-feedback card-body">
                            <blockquote class="blockquote mb-0">
                                <p class="text-70 small mb-0">A wonderful course on how to start. Eddie beautifully
                                    conveys all essentials of a becoming a good Angular developer. Very glad to have
                                    taken this course. Thank you Eddie Bryan.</p>
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
                                <a href="student-profile.html" class="card-title">Umberto Kass</a>
                                <div class="rating mt-4pt">
                                    <span class="rating__item"><span class="material-icons">star</span></span>
                                    <span class="rating__item"><span class="material-icons">star</span></span>
                                    <span class="rating__item"><span class="material-icons">star</span></span>
                                    <span class="rating__item"><span class="material-icons">star</span></span>
                                    <span class="rating__item"><span class="material-icons">star_border</span></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-4">
                        <div class="card card-feedback card-body">
                            <blockquote class="blockquote mb-0">
                                <p class="text-70 small mb-0">A wonderful course on how to start. Eddie beautifully
                                    conveys all essentials of a becoming a good Angular developer. Very glad to have
                                    taken this course. Thank you Eddie Bryan.</p>
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
                                <a href="student-profile.html" class="card-title">Umberto Kass</a>
                                <div class="rating mt-4pt">
                                    <span class="rating__item"><span class="material-icons">star</span></span>
                                    <span class="rating__item"><span class="material-icons">star</span></span>
                                    <span class="rating__item"><span class="material-icons">star</span></span>
                                    <span class="rating__item"><span class="material-icons">star</span></span>
                                    <span class="rating__item"><span class="material-icons">star_border</span></span>
                                </div>
                            </div>
                        </div>
                    </div>
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
    @include('layout.script')

</body>

</html>
