
<!DOCTYPE html>
<html lang="en"
      dir="ltr">

    <head>
       @include('member.head')

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
        </div>

        <!-- Header Layout -->
        <div class="mdk-header-layout js-mdk-header-layout">

            <!-- Header -->
            @include('member.header2')

            <!-- // END Header -->

            <!-- Header Layout Content -->
            <div class="mdk-header-layout__content page-content ">

                <div class="page-section bg-alt border-bottom-2">
                    <div class="container page__container">

                        <div class="d-flex flex-column flex-lg-row align-items-center">
                            <div class="flex d-flex flex-column align-items-center align-items-lg-start mb-16pt mb-lg-0 text-center text-lg-left">
                                <h1 class="h2 mb-8pt">Manage Quizzes</h1>
                                <div>
                                </div>
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
                                    </div>
                                </div>

                                <div class="row card-group-row">
                                    <div class="card-group-row__col col-md-6">
                                        <div class="card card-group-row__card card-sm">
                                            <div class="card-body d-flex align-items-center">
                                                <a href="{{ url('mentor/edit_quiz') }}"
                                                   class="avatar overlay overlay--primary avatar-4by3 mr-12pt">
                                                    <img src="../learnly/public/images/lymphoma-bro.png"
                                                         alt="Angular Routing In-Depth"
                                                         class="avatar-img rounded">
                                                    <span class="overlay__content"></span>
                                                </a>
                                                <div class="flex">
                                                    <a class="card-title"
                                                       href="instructor-edit-quiz.html">Sistem Saraf pada Manusia</a>
                                                    <div class="card-subtitle text-50">15 completed</div>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex mr-2">                                                       
                                                    </div>

                                                    <div class="dropdown">
                                                        <a href="#"
                                                           data-toggle="dropdown"
                                                           data-caret="false"
                                                           class="text-muted"><i class="material-icons">more_horiz</i></a>
                                                        <div class="dropdown-menu dropdown-menu-right">                                                        
                                                               class="dropdown-item">Edit Quiz</a>
                                                            <div class="dropdown-divider"></div>
                                                            <a href="javascript:void(0)"
                                                               class="dropdown-item text-danger">Delete Quiz</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-group-row__col col-md-6">
                                        <div class="card card-group-row__card card-sm">
                                            <div class="card-body d-flex align-items-center">
                                                <a href="instructor-edit-quiz.html"
                                                   class="avatar overlay overlay--primary avatar-4by3 mr-12pt">
                                                    <img src="../learnly/public/images/Lymphoma-bro.png"
                                                         alt="Angular Unit Testing"
                                                         class="avatar-img rounded">
                                                    <span class="overlay__content"></span>
                                                </a>
                                                <div class="flex">
                                                    <a class="card-title"
                                                       href="instructor-edit-quiz.html">Sistem Saraf pada Manusia</a>
                                                    <div class="card-subtitle text-50">15 completed</div>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex mr-2">                                                        
                                                    </div>

                                                    <div class="dropdown">
                                                        <a href="#"
                                                           data-toggle="dropdown"
                                                           data-caret="false"
                                                           class="text-muted"><i class="material-icons">more_horiz</i></a>
                                                        <div class="dropdown-menu dropdown-menu-right">                                                            
                                                            <a href="instructor-edit-quiz.html"
                                                               class="dropdown-item">Edit Quiz</a>
                                                            <div class="dropdown-divider"></div>
                                                            <a href="javascript:void(0)"
                                                               class="dropdown-item text-danger">Delete Quiz</a>
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
       @include('member.script')

    </body>

</html>