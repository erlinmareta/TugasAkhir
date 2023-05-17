
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
                                <h1 class="h2 mb-8pt">Pertanyaan </h1>
                                <div>

                                </div>
                            </div>
                            <div class="ml-lg-16pt">
                                <a href=""
                                   class="btn btn-light">
                                    Pertanyaan
                                    <span class="badge badge-notifications badge-accent icon--right">10</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="page-section border-bottom-2">
                    <div class="container page__container">

                        <div class="row">
                            <div class="col-lg-8">
                                <p class="lead measure-lead text-70 mb-24pt">1. Apakah sistem saraf penting bagi tubuh manusia ?</p>
                                    <div class="page-separator">
                                        <div class="page-separator__text">Jawab</div>
                                    </div>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input id="customCheck01" type="checkbox" class="custom-control-input">
                                        <label for="customCheck01" class="custom-control-label">sangat penting</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input id="customCheck02" type="checkbox" class="custom-control-input" checked="">
                                        <label for="customCheck02" class="custom-control-label">tidak penting</label>
                                    </div>
                                </div>
                                <div class="form-group mb-32pt mb-lg-48pt">
                                    <div class="custom-control custom-checkbox">
                                        <input id="customCheck03" type="checkbox" class="custom-control-input">
                                        <label for="customCheck03" class="custom-control-label">biasa saja</label>
                                    </div>
                                </div>

                                <p class="lead measure-lead text-70 mb-24pt"> 2. Apakah sistem saraf penting bagi tubuh manusia ?</p>
                                    <div class="page-separator">
                                        <div class="page-separator__text">Jawab</div>
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input id="customCheck01" type="checkbox" class="custom-control-input">
                                            <label for="customCheck01" class="custom-control-label">sangat penting</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input id="customCheck02" type="checkbox" class="custom-control-input" checked="">
                                        <label for="customCheck02" class="custom-control-label">tidak penting</label>
                                    </div>
                                </div>
                                <div class="form-group mb-32pt mb-lg-48pt">
                                    <div class="custom-control custom-checkbox">
                                        <input id="customCheck03" type="checkbox" class="custom-control-input">
                                        <label for="customCheck03" class="custom-control-label">biasa saja</label>
                                    </div>
                                </div>

                                <p class="text-50 mb-0">Note: Pilih jawaban yang benar.</p>



                            </div>
                            <div class="col-lg-4">

                                <div class="d-flex flex-column mb-24pt">
                                    <a href="student-quiz-result-details.html" class="btn justify-content-center btn-outline-secondary mb-16pt">Skip Quiz</a>
                                    <a href="student-quiz-result-details.html" class="btn justify-content-center btn-accent ">Selesai<i class="material-icons icon--right">keyboard_arrow_right</i></a>
                                </div>

                                <div class="page-separator">
                                    <div class="page-separator__text">Kelas</div>
                                </div>

                                <a href="student-course.html" class="d-flex flex-nowrap mb-24pt">
                                    <span class="mr-16pt">
                                        <img src="../learnly/public/images/paths/angular_64x64.png" width="40" alt="Angular" class="rounded">
                                    </span>
                                    <span class="flex d-flex flex-column align-items-start">
                                        <span class="card-title">Sistem Saraf pada manusia</span>
                                        <span class="card-subtitle text-50">3 Materi</span>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- // END Header Layout Content -->

            <!-- Footer -->

            <div class="bg-dark border-top-2 mt-auto">
                <div class="container page__container page-section d-flex flex-column">
                    <p class="text-white-70 brand mb-24pt">
                        <img class="brand-icon" src="../../public/images/logo/white-100@2x.png" width="30" alt="Luma"> Luma
                    </p>
                    <p class="measure-lead-max text-white-50 small mr-8pt">Luma is a beautifully crafted user interface for modern Education Platforms, including Courses & Tutorials, Video Lessons, Student and Teacher Dashboard, Curriculum Management, Earnings and Reporting, ERP, HR, CMS, Tasks, Projects, eCommerce and more.</p>
                    <p class="mb-8pt d-flex">
                        <a href=""
                           class="text-white-70 text-underline mr-8pt small">Terms</a>
                        <a href=""
                           class="text-white-70 text-underline small">Privacy policy</a>
                    </p>
                    <p class="text-white-50 small mt-n1 mb-0">Copyright 2019 &copy; All rights reserved.</p>
                </div>
            </div>

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

                    @include('member.layout.sidebar')

                    <!-- // END Sidebar Content -->

                </div>
            </div>
        </div>

        <!-- // END Drawer -->

        <!-- jQuery -->
        @include('member.layout.script')

    </body>

</html>
