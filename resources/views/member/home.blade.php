
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

            @include('member.layout.browse_course')

            <!-- // END Header Layout Content -->

            <!-- Feedback -->

            @include('member.layout.feedback')


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
