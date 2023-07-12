                    <a href="index.html"
                       class="sidebar-brand ">
                        <!-- <img class="sidebar-brand-icon" src="../../public/images/illustration/student/128/white.svg" alt="Luma"> -->
                        <span class="avatar avatar-xl sidebar-brand-icon h-auto">
                            @auth
                            <span class="avatar-title rounded bg-primary"><img src="{{ url('/storage/'.Auth::user()->foto) }}"
                                     class="img-fluid" alt="logo" /></span>
                        </span>
                        <span>{{ Auth::user()->email }}</span>


                    </a>

                    <div class="sidebar-heading">{{ Auth::user()->name }}</div>
                    <ul class="sidebar-menu">
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button"
                               href="{{ url('browse_course') }}">
                                <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">home</span>
                                <span class="sidebar-menu-text">Home</span>
                            </a>
                        </li>

                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button"
                               href="{{ url('member/student_dashboard') }}">
                                <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">account_box</span>
                                <span class="sidebar-menu-text"> Dashboard</span>
                            </a>
                        </li>

                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button"
                               href="{{ url('member/student_course') }}">
                                <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">class</span>
                                <span class="sidebar-menu-text">Kelas Saya</span>
                            </a>
                        </li>
                    </ul>
                    @endauth
