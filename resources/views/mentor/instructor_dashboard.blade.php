
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
                                <h1 class="h2 mb-8pt">Dashboard</h1>
                                <div>

                                    <span class="chip chip-outline-secondary d-inline-flex align-items-center"
                                          data-toggle="tooltip"
                                          data-title="Earnings"
                                          data-placement="bottom">
                                        <i class="material-icons icon--left">trending_up</i> &dollar;12.3k
                                    </span>
                                    <span class="chip chip-outline-secondary d-inline-flex align-items-center"
                                          data-toggle="tooltip"
                                          data-title="Sales"
                                          data-placement="bottom">
                                        <i class="material-icons icon--left">receipt</i> 264
                                    </span>

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

                                <div class="mb-24pt">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="card border-1 border-left-3 border-left-accent text-center mb-lg-0">
                                                <div class="card-body">
                                                    <h4 class="h2 mb-0">&dollar;1,569.00</h4>
                                                    <div>Earnings this month</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="card text-center mb-lg-0">
                                                <div class="card-body">
                                                    <h4 class="h2 mb-0">&dollar;3,917.80</h4>
                                                    <div>Account Balance</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="card text-center mb-lg-0">
                                                <div class="card-body">
                                                    <h4 class="h2 mb-0">&dollar;10,211.50</h4>
                                                    <div>Total Sales</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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

                    @include('mentor.sidebar')
        <!-- // END Drawer -->

        <!-- jQuery -->
        @include('member.script')

    </body>

</html>