
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

            <!-- <div class="sk-bounce">
    <div class="sk-bounce-dot"></div>
    <div class="sk-bounce-dot"></div>
  </div> -->

            <!-- More spinner examples at https://github.com/tobiasahlin/SpinKit/blob/master/examples.html -->
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
                                <h1 class="h2 mb-8pt">My Quizzes</h1>
                                <div>

                                    <span class="chip chip-outline-secondary d-inline-flex align-items-center"
                                          data-toggle="tooltip"
                                          data-title="Experience IQ"
                                          data-placement="bottom">
                                        <i class="material-icons icon--left">opacity</i> 2,300 points
                                    </span>

                                </div>
                            </div>
                            <div class="ml-lg-16pt">
                                <a href="{{ url('member/student_profil') }}"
                                   class="btn btn-light">My Profile</a>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="page-section">
                    <div class="container page__container">

                        <div class="row">
                            <div class="col-lg-8">

                                <div class="d-flex flex-column flex-sm-row align-items-sm-center mb-24pt"
                                     style="white-space: nowrap;">
                                    <small class="flex text-muted text-headings text-uppercase mr-3 mb-2 mb-sm-0">Displaying 4 out of 10 results</small>
                                    <div class="w-auto ml-sm-auto table d-flex align-items-center mb-2 mb-sm-0">
                                        <small class="text-muted text-headings text-uppercase mr-3 d-none d-sm-block">Sort by</small>

                                        <a href="#"
                                           class="sort desc small text-headings text-uppercase">Newest</a>

                                        <a href="#"
                                           class="sort small text-headings text-uppercase ml-2">Popularity</a>

                                    </div>

                                </div>

                                <div class="row card-group-row">

                                    <div class="card-group-row__col col-md-6">

                                        <div class="card card-group-row__card card-sm">
                                            <div class="card-body d-flex align-items-center">
                                                <a href="student-take-quiz.html"
                                                   class="avatar overlay overlay--primary avatar-4by3 mr-12pt">
                                                    <img src="../learnly/public/images/paths/angular_routing_200x168.png"
                                                         alt="Angular Routing In-Depth"
                                                         class="avatar-img rounded">
                                                    <span class="overlay__content"></span>
                                                </a>
                                                <div class="flex mr-12pt">
                                                    <a class="card-title"
                                                       href="student-take-quiz.html">Angular Routing In-Depth</a>
                                                    <div class="card-subtitle text-50">12 min ago</div>
                                                </div>
                                                <div class="d-flex flex-column align-items-center">
                                                    <span class="lead text-headings lh-1">5.8</span>
                                                    <small class="text-50 text-uppercase text-headings">Score</small>
                                                </div>
                                            </div>

                                            <div class="progress rounded-0"
                                                 style="height: 4px;">
                                                <div class="progress-bar bg-primary"
                                                     role="progressbar"
                                                     style="width: 25%;"
                                                     aria-valuenow="25"
                                                     aria-valuemin="0"
                                                     aria-valuemax="100"></div>
                                            </div>

                                            <div class="card-footer">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex mr-2">
                                                        <a href="student-take-quiz.html"
                                                           class="btn btn-light btn-sm">

                                                            <i class="material-icons icon--left">refresh</i> Continue

                                                        </a>
                                                    </div>

                                                    <div class="dropdown">
                                                        <a href="#"
                                                           data-toggle="dropdown"
                                                           data-caret="false"
                                                           class="text-muted"><i class="material-icons">more_horiz</i></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a href="student-take-quiz.html"
                                                               class="dropdown-item">Continue</a>
                                                            <a href="student-quiz-result-details.html"
                                                               class="dropdown-item">View Result</a>
                                                            <div class="dropdown-divider"></div>
                                                            <a href="student-take-quiz.html"
                                                               class="dropdown-item text-danger">Reset Quiz</a>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="card-group-row__col col-md-6">

                                        <div class="card card-group-row__card card-sm">
                                            <div class="card-body d-flex align-items-center">
                                                <a href="student-take-quiz.html"
                                                   class="avatar overlay overlay--primary avatar-4by3 mr-12pt">
                                                    <img src="../learnly/public/images/paths/angular_testing_200x168.png"
                                                         alt="Angular Unit Testing"
                                                         class="avatar-img rounded">
                                                    <span class="overlay__content"></span>
                                                </a>
                                                <div class="flex mr-12pt">
                                                    <a class="card-title"
                                                       href="student-take-quiz.html">Angular Unit Testing</a>
                                                    <div class="card-subtitle text-50">2 days ago</div>
                                                </div>
                                                <div class="d-flex flex-column align-items-center">
                                                    <span class="lead text-headings lh-1">10</span>
                                                    <small class="text-50 text-uppercase text-headings">Score</small>
                                                </div>
                                            </div>

                                            <div class="progress rounded-0"
                                                 style="height: 4px;">
                                                <div class="progress-bar bg-primary"
                                                     role="progressbar"
                                                     style="width: 37%;"
                                                     aria-valuenow="37"
                                                     aria-valuemin="0"
                                                     aria-valuemax="100"></div>
                                            </div>

                                            <div class="card-footer">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex mr-2">
                                                        <a href="student-take-quiz.html"
                                                           class="btn btn-light btn-sm">

                                                            <i class="material-icons icon--left">refresh</i> Continue

                                                        </a>
                                                    </div>

                                                    <div class="dropdown">
                                                        <a href="#"
                                                           data-toggle="dropdown"
                                                           data-caret="false"
                                                           class="text-muted"><i class="material-icons">more_horiz</i></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a href="student-take-quiz.html"
                                                               class="dropdown-item">Continue</a>
                                                            <a href="student-quiz-result-details.html"
                                                               class="dropdown-item">View Result</a>
                                                            <div class="dropdown-divider"></div>
                                                            <a href="student-take-quiz.html"
                                                               class="dropdown-item text-danger">Reset Quiz</a>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="card-group-row__col col-md-6">

                                        <div class="card card-group-row__card card-sm">
                                            <div class="card-body d-flex align-items-center">
                                                <a href="student-take-quiz.html"
                                                   class="avatar overlay overlay--primary avatar-4by3 mr-12pt">
                                                    <img src="../learnly/public/images/paths/typescript_200x168.png"
                                                         alt="Introduction to TypeScript"
                                                         class="avatar-img rounded">
                                                    <span class="overlay__content"></span>
                                                </a>
                                                <div class="flex mr-12pt">
                                                    <a class="card-title"
                                                       href="student-take-quiz.html">Introduction to TypeScript</a>
                                                    <div class="card-subtitle text-50">3 days ago</div>
                                                </div>
                                                <div class="d-flex flex-column align-items-center">
                                                    <span class="lead text-headings lh-1">2.8</span>
                                                    <small class="text-50 text-uppercase text-headings">Score</small>
                                                </div>
                                            </div>

                                            <div class="card-footer">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex mr-2">
                                                        <a href="student-take-quiz.html"
                                                           class="btn btn-light btn-sm">

                                                            <i class="material-icons icon--left">playlist_add_check</i> Reset
                                                            <span class="badge badge-dark badge-notifications ml-2">5</span>

                                                        </a>
                                                    </div>

                                                    <div class="dropdown">
                                                        <a href="#"
                                                           data-toggle="dropdown"
                                                           data-caret="false"
                                                           class="text-muted"><i class="material-icons">more_horiz</i></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a href="student-take-quiz.html"
                                                               class="dropdown-item">Continue</a>
                                                            <a href="student-quiz-result-details.html"
                                                               class="dropdown-item">View Result</a>
                                                            <div class="dropdown-divider"></div>
                                                            <a href="student-take-quiz.html"
                                                               class="dropdown-item text-danger">Reset Quiz</a>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="card-group-row__col col-md-6">

                                        <div class="card card-group-row__card card-sm">
                                            <div class="card-body d-flex align-items-center">
                                                <a href="student-take-quiz.html"
                                                   class="avatar overlay overlay--primary avatar-4by3 mr-12pt">
                                                    <img src="../learnly/public/images/paths/angular_200x168.png"
                                                         alt="Angular Fundamentals"
                                                         class="avatar-img rounded">
                                                    <span class="overlay__content"></span>
                                                </a>
                                                <div class="flex mr-12pt">
                                                    <a class="card-title"
                                                       href="student-take-quiz.html">Angular Fundamentals</a>
                                                    <div class="card-subtitle text-50">3 days ago</div>
                                                </div>
                                                <div class="d-flex flex-column align-items-center">
                                                    <span class="lead text-headings lh-1">3.3</span>
                                                    <small class="text-50 text-uppercase text-headings">Score</small>
                                                </div>
                                            </div>

                                            <div class="card-footer">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex mr-2">
                                                        <a href="student-take-quiz.html"
                                                           class="btn btn-light btn-sm">

                                                            <i class="material-icons icon--left">playlist_add_check</i> Reset
                                                            <span class="badge badge-dark badge-notifications ml-2">5</span>

                                                        </a>
                                                    </div>

                                                    <div class="dropdown">
                                                        <a href="#"
                                                           data-toggle="dropdown"
                                                           data-caret="false"
                                                           class="text-muted"><i class="material-icons">more_horiz</i></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a href="student-take-quiz.html"
                                                               class="dropdown-item">Continue</a>
                                                            <a href="student-quiz-result-details.html"
                                                               class="dropdown-item">View Result</a>
                                                            <div class="dropdown-divider"></div>
                                                            <a href="student-take-quiz.html"
                                                               class="dropdown-item text-danger">Reset Quiz</a>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>

                                <div class="mb-32pt">

                                    <ul class="pagination justify-content-start pagination-xsm m-0">
                                        <li class="page-item disabled">
                                            <a class="page-link"
                                               href="#"
                                               aria-label="Previous">
                                                <span aria-hidden="true"
                                                      class="material-icons">chevron_left</span>
                                                <span>Prev</span>
                                            </a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link"
                                               href="#"
                                               aria-label="Page 1">
                                                <span>1</span>
                                            </a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link"
                                               href="#"
                                               aria-label="Page 2">
                                                <span>2</span>
                                            </a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link"
                                               href="#"
                                               aria-label="Next">
                                                <span>Next</span>
                                                <span aria-hidden="true"
                                                      class="material-icons">chevron_right</span>
                                            </a>
                                        </li>
                                    </ul>                                
                                </div>

                                <div class="card stack">
                                    <div class="list-group list-group-flush">

                                        <div class="list-group-item d-flex flex-column flex-sm-row align-items-sm-center px-12pt">
                                            <div class="flex d-flex align-items-center mr-sm-16pt mb-8pt mb-sm-0">
                                                <a href="instructor-edit-quiz.html"
                                                   class="avatar overlay overlay--primary avatar-4by3 mr-12pt">
                                                    <img src="../learnly/public/images/paths/mailchimp_200x168.png"
                                                         alt="Newsletter Design"
                                                         class="avatar-img rounded">
                                                    <span class="overlay__content"></span>
                                                </a>
                                                <div class="flex">
                                                    <a class="card-title"
                                                       href="instructor-edit-quiz.html">Newsletter Design</a>
                                                    <div class="card-subtitle text-50">12 min ago</div>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-column align-items-center mr-16pt">
                                                <span class="lead text-headings lh-1">5.8</span>
                                                <small class="text-50 text-uppercase text-headings">Score</small>
                                            </div>

                                            <div class="dropdown">
                                                <a href="#"
                                                   data-toggle="dropdown"
                                                   data-caret="false"
                                                   class="text-muted"><i class="material-icons">more_vert</i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a href="student-take-quiz.html"
                                                       class="dropdown-item">Continue</a>
                                                    <a href="student-quiz-result-details.html"
                                                       class="dropdown-item">View Result</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a href="student-take-quiz.html"
                                                       class="dropdown-item text-danger">Reset Quiz</a>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="list-group-item d-flex flex-column flex-sm-row align-items-sm-center px-12pt">
                                            <div class="flex d-flex align-items-center mr-sm-16pt mb-8pt mb-sm-0">
                                                <a href="instructor-edit-quiz.html"
                                                   class="avatar overlay overlay--primary avatar-4by3 mr-12pt">
                                                    <img src="../learnly/public/images/paths/xd_200x168.png"
                                                         alt="Adobe XD"
                                                         class="avatar-img rounded">
                                                    <span class="overlay__content"></span>
                                                </a>
                                                <div class="flex">
                                                    <a class="card-title"
                                                       href="instructor-edit-quiz.html">Adobe XD</a>
                                                    <div class="card-subtitle text-50">2 days ago</div>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-column align-items-center mr-16pt">
                                                <span class="lead text-headings lh-1">10</span>
                                                <small class="text-50 text-uppercase text-headings">Score</small>
                                            </div>

                                            <div class="dropdown">
                                                <a href="#"
                                                   data-toggle="dropdown"
                                                   data-caret="false"
                                                   class="text-muted"><i class="material-icons">more_vert</i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a href="student-take-quiz.html"
                                                       class="dropdown-item">Continue</a>
                                                    <a href="student-quiz-result-details.html"
                                                       class="dropdown-item">View Result</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a href="student-take-quiz.html"
                                                       class="dropdown-item text-danger">Reset Quiz</a>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="list-group-item d-flex flex-column flex-sm-row align-items-sm-center px-12pt">
                                            <div class="flex d-flex align-items-center mr-sm-16pt mb-8pt mb-sm-0">
                                                <a href="instructor-edit-quiz.html"
                                                   class="avatar overlay overlay--primary avatar-4by3 mr-12pt">
                                                    <img src="../learnly/public/images/paths/invision_200x168.png"
                                                         alt="inVision App"
                                                         class="avatar-img rounded">
                                                    <span class="overlay__content"></span>
                                                </a>
                                                <div class="flex">
                                                    <a class="card-title"
                                                       href="instructor-edit-quiz.html">inVision App</a>
                                                    <div class="card-subtitle text-50">3 days ago</div>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-column align-items-center mr-16pt">
                                                <span class="lead text-headings lh-1">2.8</span>
                                                <small class="text-50 text-uppercase text-headings">Score</small>
                                            </div>

                                            <div class="dropdown">
                                                <a href="#"
                                                   data-toggle="dropdown"
                                                   data-caret="false"
                                                   class="text-muted"><i class="material-icons">more_vert</i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a href="student-take-quiz.html"
                                                       class="dropdown-item">Continue</a>
                                                    <a href="student-quiz-result-details.html"
                                                       class="dropdown-item">View Result</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a href="student-take-quiz.html"
                                                       class="dropdown-item text-danger">Reset Quiz</a>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="list-group-item d-flex flex-column flex-sm-row align-items-sm-center px-12pt">
                                            <div class="flex d-flex align-items-center mr-sm-16pt mb-8pt mb-sm-0">
                                                <a href="instructor-edit-quiz.html"
                                                   class="avatar overlay overlay--primary avatar-4by3 mr-12pt">
                                                    <img src="../learnly/public/images/paths/craft_200x168.png"
                                                         alt="Craft by inVision"
                                                         class="avatar-img rounded">
                                                    <span class="overlay__content"></span>
                                                </a>
                                                <div class="flex">
                                                    <a class="card-title"
                                                       href="instructor-edit-quiz.html">Craft by inVision</a>
                                                    <div class="card-subtitle text-50">3 days ago</div>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-column align-items-center mr-16pt">
                                                <span class="lead text-headings lh-1">3.3</span>
                                                <small class="text-50 text-uppercase text-headings">Score</small>
                                            </div>

                                            <div class="dropdown">
                                                <a href="#"
                                                   data-toggle="dropdown"
                                                   data-caret="false"
                                                   class="text-muted"><i class="material-icons">more_vert</i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a href="student-take-quiz.html"
                                                       class="dropdown-item">Continue</a>
                                                    <a href="student-quiz-result-details.html"
                                                       class="dropdown-item">View Result</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a href="student-take-quiz.html"
                                                       class="dropdown-item text-danger">Reset Quiz</a>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>

                                <ul class="pagination justify-content-start pagination-xsm m-0">
                                    <li class="page-item disabled">
                                        <a class="page-link"
                                           href="#"
                                           aria-label="Previous">
                                            <span aria-hidden="true"
                                                  class="material-icons">chevron_left</span>
                                            <span>Prev</span>
                                        </a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link"
                                           href="#"
                                           aria-label="Page 1">
                                            <span>1</span>
                                        </a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link"
                                           href="#"
                                           aria-label="Page 2">
                                            <span>2</span>
                                        </a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link"
                                           href="#"
                                           aria-label="Next">
                                            <span>Next</span>
                                            <span aria-hidden="true"
                                                  class="material-icons">chevron_right</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            
            <!-- // END Header Layout Content -->

            <!-- Footer -->

            
        <!-- // END Header Layout -->

        <!-- Drawer -->

        <div class="mdk-drawer js-mdk-drawer"
             id="default-drawer">
            <div class="mdk-drawer__content">
                <div class="sidebar sidebar-light sidebar-light-dodger-blue sidebar-left"
                     data-perfect-scrollbar>

                    <!-- Sidebar Content -->

                    @include('member.sidebar')

                    <!-- // END Sidebar Content -->

                </div>
            </div>
        </div>

        <!-- // END Drawer -->

        <!-- jQuery -->
      @include('member.script')

    </body>

</html>