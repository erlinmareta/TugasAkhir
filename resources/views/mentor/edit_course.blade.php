
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
                                <h1 class="h2 mb-8pt">Edit Course</h1>                                
                            </div>                           
                        </div>
                    </div>
                </div>

                <div class="page-section border-bottom-2">
                    <div class="container page__container">
                        <div class="row">
                            <div class="col-md-8">                               
                                <label class="form-label">Judul Kursus</label>
                                <div class="form-group mb-24pt">
                                    <input type="text"
                                           class="form-control form-control-lg" placeholder="Course title" value="Sistem Saraf pada Manusia">                                
                                </div>

                                <div class="form-group mb-32pt">
                                    <label class="form-label">Deskripsi</label>
                                    <textarea class="form-control" rows="3" placeholder="deskripsi kursus"></textarea>                                  
                                </div>

                                <div class="accordion js-accordion accordion--boxed mb-24pt">
                                    <div class="accordion__item">                                                                                  
                                        <div class="accordion__menu collapse" id="course-toc-1">
                                            <div class="accordion__menu-link">                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion__item open">                                        
                                        <div class="accordion__menu collapse show"
                                             id="course-toc-2">
                                            <div class="accordion__menu-link">
                                                <i class="material-icons text-70 icon-16pt icon--left">drag_handle</i>
                                                <a class="flex"
                                                   href="student-lesson.html">Introduction</a>
                                                <span class="text-muted">8m 42s</span>
                                            </div>
                                            <div class="accordion__menu-link active">
                                                <i class="material-icons text-70 icon-16pt icon--left">drag_handle</i>
                                                <a class="flex"
                                                   href="student-lesson.html">Introduction to TypeScript</a>
                                                <span class="text-muted">50m 13s</span>
                                            </div>
                                            <div class="accordion__menu-link">
                                                <i class="material-icons text-70 icon-16pt icon--left">drag_handle</i>
                                                <a class="flex"
                                                   href="student-lesson.html">Comparing Angular to AngularJS</a>
                                                <span class="text-muted">12m 10s</span>
                                            </div>
                                            <div class="accordion__menu-link">
                                                <i class="material-icons text-70 icon-16pt icon--left">drag_handle</i>
                                                <a class="flex"
                                                   href="student-take-quiz.html">Quiz: Getting Started With Angular</a>
                                            </div>
                                        </div>
                                    </div>
                                   
                                    <div class="accordion__item">                                       
                                        <div class="accordion__menu collapse"
                                             id="course-toc-4">
                                            <div class="accordion__menu-link">                                                                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <a href="#"
                                   class="btn btn-outline-secondary mb-24pt mb-sm-0">Add Section</a>
                            </div>

                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-header text-center">
                                        <a href="#"
                                           class="btn btn-accent">Simpan perubahan</a>
                                    </div>
                                    <div class="list-group list-group-flush">
                                        <div class="list-group-item d-flex">
                                            <a class="flex"
                                               href="#"><strong>Batalkan</strong></a>                                            
                                        </div>
                                        <div class="list-group-item">
                                            <a href="#"
                                               class="text-danger"><strong>Hapus Kursus</strong></a>
                                        </div>
                                    </div>
                                </div>

                                <div class="page-separator">
                                    <div class="page-separator__text">Video</div>
                                </div>

                                <div class="card">
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <iframe class="embed-responsive-item"
                                                src="https://player.vimeo.com/video/97243285?title=0&amp;byline=0&amp;portrait=0"
                                                allowfullscreen=""></iframe>
                                    </div>
                                    <div class="card-body">
                                        <label class="form-label">URL</label>
                                        <input type="text"
                                               class="form-control"
                                               value="https://player.vimeo.com/video/97243285?title=0&amp;byline=0&amp;portrait=0"
                                               placeholder="Enter Video URL">
                                        <small class="form-text text-muted">Enter a valid video URL.</small>
                                    </div>
                                </div>

                                <div class="page-separator">
                                    <div class="page-separator__text">Options</div>
                                </div>

                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label class="form-label">Category</label>
                                            <select name="category"
                                                    class="form-control custom-select">
                                                <option value="vuejs">VueJs</option>
                                                <option value="vuejs">Angular</option>
                                                <option value="vuejs">React</option>
                                            </select>
                                            <small class="form-text text-muted">Select a category.</small>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Price</label>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="input-group form-inline">
                                                        <span class="input-group-prepend"><span class="input-group-text">$</span></span>
                                                        <input type="text"
                                                               class="form-control"
                                                               value="24">
                                                    </div>
                                                </div>
                                            </div>
                                            <small class="form-text text-muted">The recommended price is between &dollar;17 and &dollar;24</small>
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

        <!-- // END Drawer -->

        <!-- jQuery -->
       @include('member.script')

    </body>
</html>