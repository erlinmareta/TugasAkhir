
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
                            <div class="d-flex flex-column flex-md-row align-items-center flex mb-16pt mb-lg-0 text-center text-md-left">
                                <div class="mb-16pt mb-md-0 mr-md-24pt">
                                    <img src="../learnly/public/images/user.png"
                                         width="104"
                                         alt="student">
                                </div>
                                <div class="flex">
                                    <h1 class="h2 mb-8pt">Laza Bogdan</h1>
                                    <div>
                                        <span class="chip chip-outline-secondary d-inline-flex align-items-center"
                                              data-toggle="tooltip"
                                              data-title="Experience IQ"
                                              data-placement="bottom">
                                            <i class="material-icons icon--left">opacity</i> 2,300 points
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="ml-lg-16pt">
                                <a href=""
                                   class="btn btn-light">Follow</a>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="page-section">
                    <div class="container page__container">

                        <div class="row">
                            <div class="col-lg-8">                                                              
                                <div class="page-separator">
                                    <div class="page-separator__text">Experience IQ</div>
                                </div>

                                <div class="row card-group-row mb-8pt">
                                    <div class="col-md-6 card-group-row__col">

                                        <div class="card card-group-row__card">
                                            <div class="card-header d-flex align-items-center">
                                                <div class="h2 mb-0 mr-3">116</div>
                                                <div class="flex">
                                                    <p class="card-title">Angular</p>
                                                    <p class="card-subtitle text-50">Best score</p>
                                                </div>
                                                <div class="dropdown">
                                                    <a href="#"
                                                       class="btn btn-sm btn-outline-secondary dropdown-toggle"
                                                       data-toggle="dropdown">Popular Topics</a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a href=""
                                                           class="dropdown-item">Popular Topics</a>
                                                        <a href=""
                                                           class="dropdown-item">Web Design</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body p-24pt">
                                                <div class="chart"
                                                     style="height: 250px;">
                                                    <canvas id="topicIqChart"
                                                            class="chart-canvas js-update-chart-line"
                                                            data-chart-hide-axes="true"
                                                            data-chart-points="true"
                                                            data-chart-suffix=" points"
                                                            data-chart-line-border-color="primary"></canvas>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-6 card-group-row__col">

                                        <div class="card card-group-row__card">
                                            <div class="card-header d-flex align-items-center border-0">
                                                <div class="h2 mb-0 mr-3">432</div>
                                                <div class="flex">
                                                    <p class="card-title">Experience IQ</p>
                                                    <p class="card-subtitle text-50">4 days streak this week</p>
                                                </div>
                                                <i class="material-icons text-muted ml-2">trending_up</i>
                                            </div>
                                            <div class="card-body d-flex flex-column align-items-center justify-content-center">
                                                <div class="chart"
                                                     style="height: 200px;">
                                                    <canvas id="iqChart"
                                                            class="chart-canvas js-update-chart-line"
                                                            data-chart-hide-axes="false"
                                                            data-chart-points="true"
                                                            data-chart-suffix="pt"
                                                            data-chart-line-border-color="primary"></canvas>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                            <div class="col-lg-4">

                                <h4>About me</h4>
                                <p class="text-70 mb-24pt">Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                                    Duis quis viverra enim, vitae porttitor nisl. Praesent rhoncus ligula id 
                                    felis blandit congue. Mauris interdum enim vel quam consequat efficitur. 
                                    In commodo magna eget augue interdum, at maximus metus lobortis. Integer 
                                    at neque sapien. Praesent laoreet elementum maximus.</p>

                                <h4>Connect</h4>
                                <p class="text-70">Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                                    Duis quis viverra enim, vitae porttitor nisl. Praesent rhoncus ligula id 
                                    felis blandit congue. Mauris interdum enim vel quam consequat efficitur. 
                                    In commodo magna eget augue interdum, at maximus metus lobortis. Integer 
                                    at neque sapien. Praesent laoreet elementum maximus.</p>
                                <div class="d-flex align-items-center mb-24pt">
                                    <a href=""
                                       class="text-accent fab fa-facebook-square font-size-24pt mr-8pt"></a>
                                    <a href=""
                                       class="text-accent fab fa-twitter-square font-size-24pt mr-8pt"></a>
                                       <a href=""
                                       class="text-accent fab fa-instagram-square font-size-24pt"></a>
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

        <!-- // END Drawer -->

        <!-- jQuery -->
       @include('member.script')

    </body>

</html>

