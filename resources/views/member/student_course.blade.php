
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
                                <h1 class="h2 mb-8pt">My Courses</h1>
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
                                <div class="card">                                                                                                                                                  
                                    <div class="card-body d-flex align-items-center justify-content-center fullbleed">
                                        <div>                                            
                                            <div class="d-flex align-items-center mb-16pt justify-content-center">
                                                <div class="d-flex align-items-center mr-16pt">                                                   
                                            </div>                                                  
                                        </div>                                        
                                    <div class="d-flex align-items-center justify-content-center">                                                
                                    </div>
                                </div>
                            </div>
                        </div>

                                <div class="page-separator">
                                    <div class="page-separator__text">Kelas Saya</div>
                                </div>

                                <div class="row card-group-row">
                                    <div class="col-sm-6 col-xl-4 card-group-row__col">
                                        <div class="card card-sm card--elevated p-relative o-hidden overlay overlay--primary-dodger-blue js-overlay card-group-row__card undefined"
                                             data-overlay-onload-show data-popover-onload-show data-toggle="popover" data-trigger="click">
                                            <a href="student-take-course.html" class="card-img-top js-image" data-position="" data-height="140">
                                                <img src="../learnly/public/images/Lymphoma-bro.png" alt="course">
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
                                                        <a class="card-title" href="student-take-course.html">Sistem Saraf pada manusia</a>
                                                        <small class="text-50 font-weight-bold mb-4pt">Elijah Murray</small>
                                                    </div>
                                                    <a href="student-take-course.html" data-toggle="tooltip" data-title="Add Favorite" data-placement="top" data-boundary="window"
                                                       class="ml-4pt material-icons text-20 card-course__icon-favorite">favorite_border</a>
                                                </div>
                                                <div class="d-flex">
                                                    <div class="rating flex">
                                                        <span class="rating__item"><span class="material-icons">star</span></span>
                                                        <span class="rating__item"><span class="material-icons">star</span></span>
                                                        <span class="rating__item"><span class="material-icons">star</span></span>
                                                        <span class="rating__item"><span class="material-icons">star</span></span>
                                                        <span class="rating__item"><span class="material-icons">star_border</span></span>
                                                    </div>
                                                    <!-- <small class="text-50">6 hours</small> -->
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <div class="row justify-content-between">
                                                    <div class="col-auto d-flex align-items-center">                                                        
                                                    </div>
                                                    <div class="col-auto d-flex align-items-center">
                                                        <span class="material-icons icon-16pt text-50 mr-4pt">play_circle_outline</span>
                                                        <p class="flex text-50 lh-1 mb-0"><small>12 lessons</small></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="popoverContainer d-none">
                                            <div class="media">
                                                <div class="media-left mr-12pt">                                               
                                                </div>
                                                <div class="media-body">
                                                    <div class="card-title mb-0">Learn Sketch</div>
                                                    <p class="lh-1 mb-0">
                                                        <span class="text-50 small">with</span>
                                                        <span class="text-50 small font-weight-bold">Elijah Murray</span>
                                                    </p>
                                                </div>
                                            </div>

                                            <p class="my-16pt text-70">Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                                    Duis quis viverra enim, vitae porttitor nisl. Praesent rhoncus ligula id 
                                    felis blandit congue. Mauris interdum enim vel quam consequat efficitur. 
                                    In commodo magna eget augue interdum, at maximus metus lobortis. Integer 
                                    at neque sapien. Praesent laoreet elementum maximus.</p>

                                            <div class="mb-16pt">
                                                <div class="d-flex align-items-center">
                                                    <span class="material-icons icon-16pt text-50 mr-8pt">check</span>
                                                    <p class="flex text-50 lh-1 mb-0"><small>Fungsi sistem saraf pada manusia</small></p>
                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <span class="material-icons icon-16pt text-50 mr-8pt">check</span>
                                                    <p class="flex text-50 lh-1 mb-0"><small>Peran sistem saraf pada manusia</small></p>
                                                </div>                                                
                                            </div>

                                            <div class="my-32pt">
                                                <div class="d-flex align-items-center mb-8pt justify-content-center">
                                                    <div class="d-flex align-items-center mr-8pt">
                                                        <span class="material-icons icon-16pt text-50 mr-4pt">access_time</span>
                                                        <p class="flex text-50 lh-1 mb-0"><small>50 minutes left</small></p>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <span class="material-icons icon-16pt text-50 mr-4pt">play_circle_outline</span>
                                                        <p class="flex text-50 lh-1 mb-0"><small>12 lessons</small></p>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-center">
                                                    <a href="student-take-lesson.html"
                                                       class="btn btn-primary mr-8pt">Resume</a>
                                                    <a href="student-take-course.html"
                                                       class="btn btn-outline-secondary ml-0">Start over</a>
                                                </div>
                                            </div>

                                            <div class="d-flex align-items-center">
                                                <small class="text-50 mr-8pt">Your rating</small>
                                                <div class="rating mr-8pt">
                                                    <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                                                    <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                                                    <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                                                    <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                                                    <span class="rating__item"><span class="material-icons text-primary">star_border</span></span>
                                                </div>
                                                <small class="text-50">4/5</small>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 col-xl-4 card-group-row__col">

                                        <div class="card card-sm card--elevated p-relative o-hidden overlay overlay--primary-dodger-blue js-overlay card-group-row__card undefined"
                                             data-toggle="popover"
                                             data-trigger="click">

                                            <a href="student-take-course.html"
                                               class="card-img-top js-image"
                                               data-position=""
                                               data-height="140">
                                                <img src="public/images/paths/flinto_430x168.png"
                                                     alt="course">
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
                                                           href="student-take-course.html">Sistem Saraf pada Manusia</a>
                                                        <small class="text-50 font-weight-bold mb-4pt">Elijah Murray</small>
                                                    </div>
                                                    <a href="student-take-course.html"
                                                       data-toggle="tooltip"
                                                       data-title="Add Favorite"
                                                       data-placement="top"
                                                       data-boundary="window"
                                                       class="ml-4pt material-icons text-20 card-course__icon-favorite">favorite_border</a>
                                                </div>
                                                <div class="d-flex">
                                                    <div class="rating flex">
                                                        <span class="rating__item"><span class="material-icons">star</span></span>
                                                        <span class="rating__item"><span class="material-icons">star</span></span>
                                                        <span class="rating__item"><span class="material-icons">star</span></span>
                                                        <span class="rating__item"><span class="material-icons">star</span></span>
                                                        <span class="rating__item"><span class="material-icons">star_border</span></span>
                                                    </div>
                                                    <!-- <small class="text-50">6 hours</small> -->
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <div class="row justify-content-between">
                                                   
                                                    <div class="col-auto d-flex align-items-center">
                                                        <span class="material-icons icon-16pt text-50 mr-4pt">play_circle_outline</span>
                                                        <p class="flex text-50 lh-1 mb-0"><small>12 lessons</small></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="popoverContainer d-none">
                                            <div class="media">
                                                <div class="media-left mr-12pt">
                                                    <img src="public/images/paths/flinto_40x40@2x.png"
                                                         width="40"
                                                         height="40"
                                                         alt="Angular"
                                                         class="rounded">
                                                </div>
                                                <div class="media-body">
                                                    <div class="card-title mb-0">Learn Flinto</div>
                                                    <p class="lh-1 mb-0">
                                                        <span class="text-50 small">with</span>
                                                        <span class="text-50 small font-weight-bold">Elijah Murray</span>
                                                    </p>
                                                </div>
                                            </div>

                                           <p class="my-16pt text-70">Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                                    Duis quis viverra enim, vitae porttitor nisl. Praesent rhoncus ligula id 
                                    felis blandit congue. Mauris interdum enim vel quam consequat efficitur. 
                                    In commodo magna eget augue interdum, at maximus metus lobortis. Integer 
                                    at neque sapien. Praesent laoreet elementum maximus.</p>

                                            <div class="mb-16pt">
                                                <div class="d-flex align-items-center">
                                                    <span class="material-icons icon-16pt text-50 mr-8pt">check</span>
                                                    <p class="flex text-50 lh-1 mb-0"><small>Fungsi sistem saraf pada manusia</small></p>
                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <span class="material-icons icon-16pt text-50 mr-8pt">check</span>
                                                    <p class="flex text-50 lh-1 mb-0"><small>Peran sistem saraf pada manusia</small></p>
                                                </div>                                                
                                            </div>

                                            <div class="my-32pt">
                                                <div class="d-flex align-items-center mb-8pt justify-content-center">
                                                    <div class="d-flex align-items-center mr-8pt">
                                                        <span class="material-icons icon-16pt text-50 mr-4pt">access_time</span>
                                                        <p class="flex text-50 lh-1 mb-0"><small>50 minutes left</small></p>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <span class="material-icons icon-16pt text-50 mr-4pt">play_circle_outline</span>
                                                        <p class="flex text-50 lh-1 mb-0"><small>12 lessons</small></p>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-center">
                                                    <a href="student-take-lesson.html"
                                                       class="btn btn-primary mr-8pt">Resume</a>
                                                    <a href="student-take-course.html"
                                                       class="btn btn-outline-secondary ml-0">Start over</a>
                                                </div>
                                            </div>

                                            <div class="d-flex align-items-center">
                                                <small class="text-50 mr-8pt">Your rating</small>
                                                <div class="rating mr-8pt">
                                                    <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                                                    <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                                                    <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                                                    <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                                                    <span class="rating__item"><span class="material-icons text-primary">star_border</span></span>
                                                </div>
                                                <small class="text-50">4/5</small>
                                            </div>

                                        </div>

                                    </div>

                                    <div class="col-sm-6 col-xl-4 card-group-row__col">

                                        <div class="card card-sm card--elevated p-relative o-hidden overlay overlay--primary-dodger-blue js-overlay card-group-row__card undefined"
                                             data-toggle="popover"
                                             data-trigger="click">

                                            <a href="student-take-course.html"
                                               class="card-img-top js-image"
                                               data-position=""
                                               data-height="140">
                                                <img src="public/images/paths/photoshop_430x168.png"
                                                     alt="course">
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
                                                        <a class="card-title" href="student-take-course.html">Learn Photoshop</a>
                                                        <small class="text-50 font-weight-bold mb-4pt">Elijah Murray</small>
                                                    </div>
                                                    <a href="student-take-course.html" data-toggle="tooltip" data-title="Add Favorite" data-placement="top" data-boundary="window"
                                                       class="ml-4pt material-icons text-20 card-course__icon-favorite">favorite_border</a>
                                                </div>
                                                <div class="d-flex">
                                                    <div class="rating flex">
                                                        <span class="rating__item"><span class="material-icons">star</span></span>
                                                        <span class="rating__item"><span class="material-icons">star</span></span>
                                                        <span class="rating__item"><span class="material-icons">star</span></span>
                                                        <span class="rating__item"><span class="material-icons">star</span></span>
                                                        <span class="rating__item"><span class="material-icons">star_border</span></span>
                                                    </div>
                                                    <!-- <small class="text-50">6 hours</small> -->
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <div class="row justify-content-between">
                                                    <div class="col-auto d-flex align-items-center">
                                                        <span class="material-icons icon-16pt text-50 mr-4pt">access_time</span>
                                                        <p class="flex text-50 lh-1 mb-0"><small>6 hours</small></p>
                                                    </div>
                                                    <div class="col-auto d-flex align-items-center">
                                                        <span class="material-icons icon-16pt text-50 mr-4pt">play_circle_outline</span>
                                                        <p class="flex text-50 lh-1 mb-0"><small>12 lessons</small></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="popoverContainer d-none">
                                            <div class="media">
                                                <div class="media-left mr-12pt">
                                                    <img src="../learnly/public/images/paths/photoshop_40x40@2x.png" width="40" height="40" alt="Angular" class="rounded">
                                                </div>
                                                <div class="media-body">
                                                    <div class="card-title mb-0">Learn Photoshop</div>
                                                    <p class="lh-1 mb-0">
                                                        <span class="text-50 small">with</span>
                                                        <span class="text-50 small font-weight-bold">Elijah Murray</span>
                                                    </p>
                                                </div>
                                            </div>

                                            <p class="my-16pt text-70">Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                                    Duis quis viverra enim, vitae porttitor nisl. Praesent rhoncus ligula id 
                                    felis blandit congue. Mauris interdum enim vel quam consequat efficitur. 
                                    In commodo magna eget augue interdum, at maximus metus lobortis. Integer 
                                    at neque sapien. Praesent laoreet elementum maximus.</p>

                                            <div class="mb-16pt">
                                                <div class="d-flex align-items-center">
                                                    <span class="material-icons icon-16pt text-50 mr-8pt">check</span>
                                                    <p class="flex text-50 lh-1 mb-0"><small>Fungsi sistem saraf pada manusia</small></p>
                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <span class="material-icons icon-16pt text-50 mr-8pt">check</span>
                                                    <p class="flex text-50 lh-1 mb-0"><small>Peran sistem saraf pada manusia</small></p>
                                                </div>                                                
                                            </div>

                                            <div class="my-32pt">
                                                <div class="d-flex align-items-center mb-8pt justify-content-center">
                                                    <div class="d-flex align-items-center mr-8pt">
                                                        <span class="material-icons icon-16pt text-50 mr-4pt">access_time</span>
                                                        <p class="flex text-50 lh-1 mb-0"><small>50 minutes left</small></p>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <span class="material-icons icon-16pt text-50 mr-4pt">play_circle_outline</span>
                                                        <p class="flex text-50 lh-1 mb-0"><small>12 lessons</small></p>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-center">
                                                    <a href="student-take-lesson.html"
                                                       class="btn btn-primary mr-8pt">Resume</a>
                                                    <a href="student-take-course.html"
                                                       class="btn btn-outline-secondary ml-0">Start over</a>
                                                </div>
                                            </div>

                                            <div class="d-flex align-items-center">
                                                <small class="text-50 mr-8pt">Your rating</small>
                                                <div class="rating mr-8pt">
                                                    <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                                                    <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                                                    <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                                                    <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                                                    <span class="rating__item"><span class="material-icons text-primary">star_border</span></span>
                                                </div>
                                                <small class="text-50">4/5</small>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 col-xl-4 card-group-row__col">

                                        <div class="card card-sm card--elevated p-relative o-hidden overlay overlay--primary-dodger-blue js-overlay card-group-row__card d-xl-none"
                                             data-toggle="popover" data-trigger="click">
                                            <a href="student-take-course.html" class="card-img-top js-image" data-position="" data-height="140">
                                                <img src="../learnly/public/images/paths/mailchimp_430x168.png" alt="course"> <span class="overlay__content">
                                                    <span class="overlay__action d-flex flex-column text-center">
                                                        <i class="material-icons icon-32pt">play_circle_outline</i>
                                                        <span class="card-title text-white">Resume</span>
                                                    </span>
                                                </span>
                                            </a>

                                            <div class="card-body flex">
                                                <div class="d-flex">
                                                    <div class="flex">
                                                        <a class="card-title" href="student-take-course.html">Newsletter Design</a>
                                                        <small class="text-50 font-weight-bold mb-4pt">Elijah Murray</small>
                                                    </div>
                                                    <a href="student-take-course.html" data-toggle="tooltip" data-title="Add Favorite" data-placement="top" data-boundary="window"
                                                       class="ml-4pt material-icons text-20 card-course__icon-favorite">favorite_border</a>
                                                </div>
                                                <div class="d-flex">
                                                    <div class="rating flex">
                                                        <span class="rating__item"><span class="material-icons">star</span></span>
                                                        <span class="rating__item"><span class="material-icons">star</span></span>
                                                        <span class="rating__item"><span class="material-icons">star</span></span>
                                                        <span class="rating__item"><span class="material-icons">star</span></span>
                                                        <span class="rating__item"><span class="material-icons">star_border</span></span>
                                                    </div>
                                                    <!-- <small class="text-50">6 hours</small> -->
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <div class="row justify-content-between">
                                                    <div class="col-auto d-flex align-items-center">
                                                        <span class="material-icons icon-16pt text-50 mr-4pt">access_time</span>
                                                        <p class="flex text-50 lh-1 mb-0"><small>6 hours</small></p>
                                                    </div>
                                                    <div class="col-auto d-flex align-items-center">
                                                        <span class="material-icons icon-16pt text-50 mr-4pt">play_circle_outline</span>
                                                        <p class="flex text-50 lh-1 mb-0"><small>12 lessons</small></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="popoverContainer d-none">
                                            <div class="media">
                                                <div class="media-left mr-12pt">
                                                    <img src="../learnly/public/images/paths/mailchimp_40x40@2x.png" width="40" height="40" alt="Angular" class="rounded">
                                                </div>
                                                <div class="media-body">
                                                    <div class="card-title mb-0">Newsletter Design</div>
                                                    <p class="lh-1 mb-0">
                                                        <span class="text-50 small">with</span>
                                                        <span class="text-50 small font-weight-bold">Elijah Murray</span>
                                                    </p>
                                                </div>
                                            </div>

                                            <p class="my-16pt text-70">Learn the fundamentals of working with Angular and how to create basic applications.</p>

                                            <div class="mb-16pt">
                                                <div class="d-flex align-items-center">
                                                    <span class="material-icons icon-16pt text-50 mr-8pt">check</span>
                                                    <p class="flex text-50 lh-1 mb-0"><small>Fundamentals of working with Angular</small></p>
                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <span class="material-icons icon-16pt text-50 mr-8pt">check</span>
                                                    <p class="flex text-50 lh-1 mb-0"><small>Create complete Angular applications</small></p>
                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <span class="material-icons icon-16pt text-50 mr-8pt">check</span>
                                                    <p class="flex text-50 lh-1 mb-0"><small>Working with the Angular CLI</small></p>
                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <span class="material-icons icon-16pt text-50 mr-8pt">check</span>
                                                    <p class="flex text-50 lh-1 mb-0"><small>Understanding Dependency Injection</small></p>
                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <span class="material-icons icon-16pt text-50 mr-8pt">check</span>
                                                    <p class="flex text-50 lh-1 mb-0"><small>Testing with Angular</small></p>
                                                </div>
                                            </div>

                                            <div class="my-32pt">
                                                <div class="d-flex align-items-center mb-8pt justify-content-center">
                                                    <div class="d-flex align-items-center mr-8pt">
                                                        <span class="material-icons icon-16pt text-50 mr-4pt">access_time</span>
                                                        <p class="flex text-50 lh-1 mb-0"><small>50 minutes left</small></p>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <span class="material-icons icon-16pt text-50 mr-4pt">play_circle_outline</span>
                                                        <p class="flex text-50 lh-1 mb-0"><small>12 lessons</small></p>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-center">
                                                    <a href="student-take-lesson.html"
                                                       class="btn btn-primary mr-8pt">Resume</a>
                                                    <a href="student-take-course.html"
                                                       class="btn btn-outline-secondary ml-0">Start over</a>
                                                </div>
                                            </div>

                                            <div class="d-flex align-items-center">
                                                <small class="text-50 mr-8pt">Your rating</small>
                                                <div class="rating mr-8pt">
                                                    <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                                                    <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                                                    <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                                                    <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                                                    <span class="rating__item"><span class="material-icons text-primary">star_border</span></span>
                                                </div>
                                                <small class="text-50">4/5</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-32pt">
                                    <ul class="pagination justify-content-start pagination-xsm m-0">
                                        <li class="page-item disabled">
                                            <a class="page-link" href="#" aria-label="Previous">
                                                <span aria-hidden="true"
                                                      class="material-icons">chevron_left</span>
                                                <span>Prev</span>
                                            </a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="#" aria-label="Page 1">
                                                <span>1</span>
                                            </a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="#" aria-label="Page 2">
                                                <span>2</span>
                                            </a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="#" aria-label="Next">
                                                <span>Next</span>
                                                <span aria-hidden="true" class="material-icons">chevron_right</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                           
                                
            <!-- // END Header Layout Content -->
        </div>
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