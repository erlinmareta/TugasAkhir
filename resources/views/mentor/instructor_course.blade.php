
<!DOCTYPE html>
<html lang="en"
      dir="ltr">

    <head>
   @include('member.layout.head')

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

            @include('member.layout.header2')
            <!-- // END Header -->

            <!-- Header Layout Content -->
            <div class="mdk-header-layout__content page-content ">

                <div class="page-section bg-alt border-bottom-2">
                    <div class="container page__container">

                        <div class="d-flex flex-column flex-lg-row align-items-center">
                            <div class="flex d-flex flex-column align-items-center align-items-lg-start mb-16pt mb-lg-0 text-center text-lg-left">
                                <h1 class="h2 mb-8pt">Manage Courses</h1>
                            </div>
                            <div class="ml-lg-16pt">
                                <a href="{{ url('mentor/instructor_profil') }}"
                                   class="btn btn-light">My Profile</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="page-section">
                    <div class="container page__container">

                        <div class="row">
                            <div class="col-lg-8">
                                <div class="page-separator">
                                    <div class="page-separator__text">My Courses</div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6 col-xl-4">
                                        <div class="card card-sm card--elevated p-relative o-hidden overlay overlay--primary js-overlay mdk-reveal js-mdk-reveal "
                                             data-overlay-onload-show data-popover-onload-show data-force-reveal data-partial-height="44" data-toggle="popover" data-trigger="click">
                                            <a href="instructor-edit-course.html"
                                               class="js-image"
                                               data-position="">
                                                <img src="../learnly/public/images/Lymphoma-bro.png" width="430" height="168"
                                                     alt="course">
                                                <span class="overlay__content align-items-start justify-content-start">
                                                    <span class="overlay__action card-body d-flex align-items-center">
                                                        <i class="material-icons mr-4pt">edit</i>
                                                        <span class="card-title text-white">Edit</span>
                                                    </span>
                                                </span>
                                            </a>
                                            <div class="mdk-reveal__content">
                                                <div class="card-body">
                                                    <div class="d-flex">
                                                        <div class="flex">
                                                            <a class="card-title mb-4pt"
                                                               href="instructor-edit-course.html">Sistem Saraf pada manusia</a>
                                                        </div>
                                                        <a href="instructor-edit-course.html"
                                                           class="ml-4pt material-icons text-20 card-course__icon-favorite">edit</a>
                                                    </div>
                                                    <div class="d-flex">
                                                        <div class="rating flex">
                                                            <span class="rating__item"><span class="material-icons">star</span></span>
                                                            <span class="rating__item"><span class="material-icons">star</span></span>
                                                            <span class="rating__item"><span class="material-icons">star</span></span>
                                                            <span class="rating__item"><span class="material-icons">star</span></span>
                                                            <span class="rating__item"><span class="material-icons">star_border</span></span>
                                                        </div>
                                                        <small class="text-50">6 hours</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="popoverContainer d-none">
                                            <div class="media">
                                                <div class="media-left mr-12pt">
                                                </div>
                                                <div class="media-body">
                                                    <div class="card-title mb-0">Sistem Saraf pada manusia</div>
                                                </div>
                                            </div>

                                            <p class="my-16pt text-70">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    Duis quis viverra enim, vitae porttitor nisl. Praesent rhoncus ligula id
                                    felis blandit congue. Mauris interdum enim vel quam consequat efficitur.
                                    In commodo magna eget augue interdum, at maximus metus lobortis. Integer
                                    at neque sapien. Praesent laoreet elementum maximus.</p>

                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <div class="d-flex align-items-center mb-4pt">
                                                        <span class="material-icons icon-16pt text-50 mr-4pt">play_circle_outline</span>
                                                        <p class="flex text-50 lh-1 mb-0"><small>12 materi</small></p>
                                                    </div>
                                                </div>
                                                <div class="col text-right">
                                                    <a href="{{ url('mentor/edit_course') }}"
                                                       class="btn btn-primary">Edit course</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 col-xl-4">
                                        <div class="card card-sm card--elevated p-relative o-hidden overlay overlay--primary js-overlay mdk-reveal js-mdk-reveal "
                                             data-partial-height="44" data-toggle="popover" data-trigger="click">
                                            <a href="instructor-edit-course.html" class="js-image"
                                               data-position="">
                                                <img src="../learnly/public/images/Lymphoma-bro.png" width="430" height="168"
                                                     alt="course">
                                                <span class="overlay__content align-items-start justify-content-start">
                                                    <span class="overlay__action card-body d-flex align-items-center">
                                                        <i class="material-icons mr-4pt">edit</i>
                                                        <span class="card-title text-white">Edit</span>
                                                    </span>
                                                </span>
                                            </a>
                                            <div class="mdk-reveal__content">
                                                <div class="card-body">
                                                    <div class="d-flex">
                                                        <div class="flex">
                                                            <a class="card-title mb-4pt"
                                                               href="instructor-edit-course.html">Sistem Saraf pada Manusia</a>
                                                        </div>
                                                        <a href=""
                                                           class="ml-4pt material-icons text-20 card-course__icon-favorite">edit</a>
                                                    </div>
                                                    <div class="d-flex">
                                                        <div class="rating flex">
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
                                        <div class="popoverContainer d-none">
                                            <div class="media">
                                                <div class="media-left mr-12pt">
                                                </div>
                                                <div class="media-body">
                                                    <div class="card-title mb-0">Sistem Saraf pada Manusia</div>
                                                </div>
                                            </div>

                                            <p class="my-16pt text-70">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    Duis quis viverra enim, vitae porttitor nisl. Praesent rhoncus ligula id
                                    felis blandit congue. Mauris interdum enim vel quam consequat efficitur.
                                    In commodo magna eget augue interdum, at maximus metus lobortis. Integer
                                    at neque sapien. Praesent laoreet elementum maximus.</p>

                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <div class="d-flex align-items-center mb-4pt">
                                                        <span class="material-icons icon-16pt text-50 mr-4pt">play_circle_outline</span>
                                                        <p class="flex text-50 lh-1 mb-0"><small>12 lessons</small></p>
                                                    </div>
                                                </div>
                                                <div class="col text-right">
                                                    <a href="instructor-edit-course.html"
                                                       class="btn btn-primary">Edit course</a>
                                                </div>
                                            </div>
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


            <!-- // END Footer -->

        </div>
        <!-- // END Header Layout -->

        <!-- Drawer -->

        <div class="mdk-drawer js-mdk-drawer"
             id="default-drawer">
            <div class="mdk-drawer__content">
                <div class="sidebar sidebar-light sidebar-light-dodger-blue sidebar-left"
                     data-perfect-scrollbar>

                    <!-- Sidebar Content -->
                    @include('mentor.sidebar')

                    <!-- // END Sidebar Content -->

                </div>
            </div>
        </div>

        <!-- // END Drawer -->

        <!-- jQuery -->
        @include('member.layout.script')

    </body>

</html>
