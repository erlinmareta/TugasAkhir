
<!DOCTYPE html>
<html lang="en"
      dir="ltr">

    <head>
       
    @include('layouts.head')

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

           @include('layouts.header')

            <!-- // END Header -->

            <!-- Header Layout Content -->
            <div class="mdk-header-layout__content page-content ">

                <div class="page-section bg-alt border-bottom-2">
                    <div class="container page__container">

                        <div class="d-flex flex-column flex-lg-row align-items-center">
                            <div class="d-flex flex-column flex-md-row align-items-center flex mb-16pt mb-lg-0 text-center text-md-left">
                                <div class="avatar avatar mb-16pt mb-md-0 mr-md-16pt">                                    
                            </div>
                                <div class="flex">
                                    <h1 class="h2 m-0">Sistem Saraf pada Manusia</h1>
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
                                <a href="courses.html"
                                   class="btn btn-light">Library</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="page-section border-bottom-2">
                    <div class="container page__container">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="js-player card bg-primary text-center embed-responsive embed-responsive-16by9 mb-24pt">
                                    <div class="player embed-responsive-item">
                                        <div class="player__content align-items-center justify-content-center">
                                            <div class="d-flex flex-column flex-sm-row align-items-center justify-content-center">
                                                <a href="student-lesson.html"
                                                   class="btn btn-outline-white">Watch trailer <i class="material-icons icon--right">play_circle_outline</i></a>
                                            </div>
                                        </div>
                                        <div class="player__embed d-none">
                                            <iframe class="embed-responsive-item"
                                                    src="https://player.vimeo.com/video/97243285?title=0&amp;byline=0&amp;portrait=0"
                                                    allowfullscreen=""></iframe>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-24pt">
                                    <span class="chip chip-outline-secondary d-inline-flex align-items-center">Materi selanjutnya
                                        <i class="material-icons icon--right">arrow_forward</i></span>
                                </div>

                                <div class="row mb-24pt">
                                    <div class="col-md-7">
                                        <div class="page-separator">
                                            <div class="page-separator__text">Tentang Kelas ini</div>
                                        </div>
                                        <p class="text-70">Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                                            Pellentesque id elit a tortor posuere maximus ut ac dolor. Mauris rutrum 
                                            orci at augue viverra maximus id at nisi. Maecenas eleifend nibh vel lorem 
                                            consectetur sollicitudin a ut arcu. Ut sed aliquet lacus. Quisque euismod 
                                            tellus id turpis feugiat, sed accumsan magna consectetur.</p>
                                        <p class="text-70 mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                                            Pellentesque id elit a tortor posuere maximus ut ac dolor. Mauris rutrum orci 
                                            at augue viverra maximus id at nisi. Maecenas eleifend nibh vel lorem consectetur 
                                            sollicitudin a ut arcu. Ut sed aliquet lacus. Quisque euismod tellus id turpis feugiat, 
                                            sed accumsan magna consectetur.</p>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="page-separator">
                                            <div class="page-separator__text ">What you’ll learn</div>
                                        </div>
                                        <ul class="list-unstyled">
                                            <li class="d-flex align-items-center">
                                                <span class="material-icons text-50 mr-8pt">check</span>
                                                <span class="text-70">Fundamentals of working with Angular</span>
                                            </li>
                                            <li class="d-flex align-items-center">
                                                <span class="material-icons text-50 mr-8pt">check</span>
                                                <span class="text-70">Create complete Angular applications</span>
                                            </li>
                                            <li class="d-flex align-items-center">
                                                <span class="material-icons text-50 mr-8pt">check</span>
                                                <span class="text-70">Working with the Angular CLI</span>
                                            </li>
                                            <li class="d-flex align-items-center">
                                                <span class="material-icons text-50 mr-8pt">check</span>
                                                <span class="text-70">Understanding Dependency Injection</span>
                                            </li>
                                            <li class="d-flex align-items-center">
                                                <span class="material-icons text-50 mr-8pt">check</span>
                                                <span class="text-70">Testing with Angular</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="page-separator">
                                    <div class="page-separator__text">Student Feedback</div>
                                </div>
                                <div class="row mb-32pt">
                                    <div class="col-md-3 mb-32pt mb-md-0">
                                        <div class="display-1">4.7</div>
                                        <div class="rating rating-24">
                                            <span class="rating__item"><span class="material-icons">star</span></span>
                                            <span class="rating__item"><span class="material-icons">star</span></span>
                                            <span class="rating__item"><span class="material-icons">star</span></span>
                                            <span class="rating__item"><span class="material-icons">star</span></span>
                                            <span class="rating__item"><span class="material-icons">star_border</span></span>
                                        </div>
                                        <p class="text-muted mb-0">20 ratings</p>
                                    </div>
                                    <div class="col-md-9">

                                        <div class="row align-items-center mb-8pt" data-toggle="tooltip" data-title="75% rated 5/5" data-placement="top">
                                            <div class="col-md col-sm-6">
                                                <div class="progress" style="height: 8px;">
                                                    <div class="progress-bar bg-secondary" role="progressbar" aria-valuenow="75" style="width: 75%" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-auto col-sm-6 d-none d-sm-flex align-items-center">
                                                <div class="rating">
                                                    <span class="rating__item"><span class="material-icons">star</span></span>
                                                    <span class="rating__item"><span class="material-icons">star</span></span>
                                                    <span class="rating__item"><span class="material-icons">star</span></span>
                                                    <span class="rating__item"><span class="material-icons">star</span></span>
                                                    <span class="rating__item"><span class="material-icons">star</span></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row align-items-center mb-8pt" data-toggle="tooltip" data-title="16% rated 4/5" data-placement="top">
                                            <div class="col-md col-sm-6">
                                                <div class="progress"
                                                     style="height: 8px;">
                                                    <div class="progress-bar bg-secondary" role="progressbar" aria-valuenow="16" style="width: 16%" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-auto col-sm-6 d-none d-sm-flex align-items-center">
                                                <div class="rating">
                                                    <span class="rating__item"><span class="material-icons">star</span></span>
                                                    <span class="rating__item"><span class="material-icons">star</span></span>
                                                    <span class="rating__item"><span class="material-icons">star</span></span>
                                                    <span class="rating__item"><span class="material-icons">star</span></span>
                                                    <span class="rating__item"><span class="material-icons">star_border</span></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row align-items-center mb-8pt" data-toggle="tooltip" data-title="12% rated 3/5" data-placement="top">
                                            <div class="col-md col-sm-6">
                                                <div class="progress"
                                                     style="height: 8px;">
                                                    <div class="progress-bar bg-secondary" role="progressbar" aria-valuenow="12" style="width: 12%" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-auto col-sm-6 d-none d-sm-flex align-items-center">
                                                <div class="rating">
                                                    <span class="rating__item"><span class="material-icons">star</span></span>
                                                    <span class="rating__item"><span class="material-icons">star</span></span>
                                                    <span class="rating__item"><span class="material-icons">star</span></span>
                                                    <span class="rating__item"><span class="material-icons">star_border</span></span>
                                                    <span class="rating__item"><span class="material-icons">star_border</span></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row align-items-center mb-8pt" data-toggle="tooltip" data-title="9% rated 2/5" data-placement="top">
                                            <div class="col-md col-sm-6">
                                                <div class="progress"
                                                     style="height: 8px;">
                                                    <div class="progress-bar bg-secondary" role="progressbar" aria-valuenow="9" style="width: 9%" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-auto col-sm-6 d-none d-sm-flex align-items-center">
                                                <div class="rating">
                                                    <span class="rating__item"><span class="material-icons">star</span></span>
                                                    <span class="rating__item"><span class="material-icons">star</span></span>
                                                    <span class="rating__item"><span class="material-icons">star_border</span></span>
                                                    <span class="rating__item"><span class="material-icons">star_border</span></span>
                                                    <span class="rating__item"><span class="material-icons">star_border</span></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row align-items-center mb-8pt"
                                             data-toggle="tooltip"
                                             data-title="0% rated 0/5"
                                             data-placement="top">
                                            <div class="col-md col-sm-6">
                                                <div class="progress"
                                                     style="height: 8px;">
                                                    <div class="progress-bar bg-secondary" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-auto col-sm-6 d-none d-sm-flex align-items-center">
                                                <div class="rating">
                                                    <span class="rating__item"><span class="material-icons">star</span></span>
                                                    <span class="rating__item"><span class="material-icons">star_border</span></span>
                                                    <span class="rating__item"><span class="material-icons">star_border</span></span>
                                                    <span class="rating__item"><span class="material-icons">star_border</span></span>
                                                    <span class="rating__item"><span class="material-icons">star_border</span></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="pb-16pt mb-16pt border-bottom row">
                                    <div class="col-md-3 mb-16pt mb-md-0">
                                        <div class="d-flex">
                                            <a href="student-profile.html"
                                               class="avatar avatar-sm mr-12pt">
                                                <!-- <img src="LB" alt="avatar" class="avatar-img rounded-circle"> -->
                                                <span class="avatar-title rounded-circle">LB</span>
                                            </a>
                                            <div class="flex">
                                                <p class="small text-muted m-0">2 days ago</p>
                                                <a href="student-profile.html"
                                                   class="card-title">Laza Bogdan</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="rating mb-8pt">
                                            <span class="rating__item"><span class="material-icons">star</span></span>
                                            <span class="rating__item"><span class="material-icons">star</span></span>
                                            <span class="rating__item"><span class="material-icons">star</span></span>
                                            <span class="rating__item"><span class="material-icons">star</span></span>
                                            <span class="rating__item"><span class="material-icons">star_border</span></span>
                                        </div>
                                        <p class="text-70 mb-0">A wonderful course on how to start. Eddie beautifully conveys all essentials of a becoming a good Angular developer. Very glad to have taken this course. Thank you Eddie Bryan.</p>
                                    </div>
                                </div>

                                <div class="pb-16pt mb-16pt border-bottom row">
                                    <div class="col-md-3 mb-16pt mb-md-0">
                                        <div class="d-flex">
                                            <a href="student-profile.html"
                                               class="avatar avatar-sm mr-12pt">
                                                <!-- <img src="UK" alt="avatar" class="avatar-img rounded-circle"> -->
                                                <span class="avatar-title rounded-circle">UK</span>
                                            </a>
                                            <div class="flex">
                                                <p class="small text-muted m-0">2 days ago</p>
                                                <a href="student-profile.html"
                                                   class="card-title">Umberto Klass</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="rating mb-8pt">
                                            <span class="rating__item"><span class="material-icons">star</span></span>
                                            <span class="rating__item"><span class="material-icons">star</span></span>
                                            <span class="rating__item"><span class="material-icons">star</span></span>
                                            <span class="rating__item"><span class="material-icons">star</span></span>
                                            <span class="rating__item"><span class="material-icons">star_border</span></span>
                                        </div>
                                        <p class="text-70 mb-0">This course is absolutely amazing, Bryan goes* out of his way to really expl*ain things clearly I couldn&#39;t be happier, so glad I made this purchase!</p>
                                    </div>
                                </div>

                                <div class="pb-16pt mb-24pt row">
                                    <div class="col-md-3 mb-16pt mb-md-0">
                                        <div class="d-flex">
                                            <a href="student-profile.html"
                                               class="avatar avatar-sm mr-12pt">
                                                <!-- <img src="AD" alt="avatar" class="avatar-img rounded-circle"> -->
                                                <span class="avatar-title rounded-circle">AD</span>
                                            </a>
                                            <div class="flex">
                                                <p class="small text-muted m-0">2 days ago</p>
                                                <a href="student-profile.html"
                                                   class="card-title">Adrian Demian</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="rating mb-8pt">
                                            <span class="rating__item"><span class="material-icons">star</span></span>
                                            <span class="rating__item"><span class="material-icons">star</span></span>
                                            <span class="rating__item"><span class="material-icons">star</span></span>
                                            <span class="rating__item"><span class="material-icons">star</span></span>
                                            <span class="rating__item"><span class="material-icons">star_border</span></span>
                                        </div>
                                        <p class="text-70 mb-0">This course is absolutely amazing, Bryan goes* out of his way to really expl*ain things clearly I couldn&#39;t be happier, so glad I made this purchase!</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                               
                                <div class="page-separator">
                                    <div class="page-separator__text">Author</div>
                                </div>

                                <div class="media align-items-center mb-16pt">
                                    <span class="media-left mr-16pt">
                                        <img src="../../learnly/public/images/user.png" width="40" alt="avatar" class="rounded-circle">
                                    </span>
                                    <div class="media-body">
                                        <a class="card-title m-0"
                                           href="teacher-profile.html">Eddie Bryan</a>
                                        <p class="text-50 lh-1 mb-0">Instructor</p>
                                    </div>
                                </div>
                                <p class="text-70">Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                                    Pellentesque id elit a tortor posuere maximus ut ac dolor. Mauris rutrum 
                                    orci at augue viverra maximus id at nisi. Maecenas eleifend nibh vel lorem 
                                    consectetur sollicitudin a ut arcu. Ut sed aliquet lacus. Quisque euismod 
                                    tellus id turpis feugiat, sed accumsan magna consectetur.</p>

                                <a href="teacher-profile.html"
                                   class="btn btn-white mb-24pt">Follow</a>

                                <div class="page-separator">
                                    <div class="page-separator__text">Materi</div>
                                </div>
                                                               
                                <div class="list-group list-group-flush">
                                    <div class="list-group-item px-0">
                                        <a href="student-course.html"
                                           class="card-title mb-4pt">Fungsi Sistem Saraf pada manusia</a>
                                        <p class="lh-1 mb-0">                                           
                                            <small class="text-muted">18 Maret 2023</small>
                                        </p>
                                    </div>
                                    <div class="list-group-item px-0">
                                        <a href="student-course.html"
                                           class="card-title mb-4pt">Materi kedua</a>
                                        <p class="lh-1 mb-0">                                            
                                            <small class="text-muted">18 Maret 2023</small>
                                        </p>
                                    </div>                                    
                                </div>
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

                    @include('layouts.sidebar')

                    <!-- // END Sidebar Content -->

                </div>
            </div>
        </div>

        <!-- // END Drawer -->

        <!-- jQuery -->
        @include('layouts.script')

    </body>

</html>