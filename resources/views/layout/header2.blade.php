                <div id="header"
                 class="mdk-header js-mdk-header mb-0"
                 data-fixed
                 data-effects="waterfall">
                <div class="mdk-header__content">

                    <div class="navbar navbar-expand navbar-light bg-white navbar-shadow"
                         id="default-navbar"
                         data-primary>
                        <div class="container page__container">

                            <!-- Navbar Brand -->
                            <a href="index.html"
                               class="navbar-brand mr-16pt">
                                <span class="avatar avatar-sm navbar-brand-icon mr-0 mr-lg-8pt">
                            </span>
                                <span class="d-none d-lg-block">IndLearn</span>
                            </a>
                            <!-- Navbar toggler -->
                            @auth

                            <ul class="nav navbar-nav d-none d-sm-flex flex justify-content-start ml-8pt">
                                <li class="nav-item active">
                                    <a href="{{ url('/') }}"
                                       class="nav-link">Home</a>
                                </li>
                                <li class="nav-item active">
                                    <a href="{{ url('member/student_course') }}"
                                       class="nav-link">Kursus Saya</a>
                                </li>
                                <li class="nav-item active">
                                    <a href="{{ url('member/student_dashboard') }}"
                                       class="nav-link">Dashboard</a>
                                </li>
                                @endauth
                            </ul>
                            <form class="search-form form-control-rounded navbar-search d-none d-lg-flex mr-16pt"
                            action="{{ url('/') }}"
                                  style="max-width: 230px">
                                <button class="btn"
                                        type="submit"><i class="material-icons">search</i></button>
                                <input type="text" name="search"
                                       class="form-control"
                                       placeholder="Search ...">
                            </form>

                            <ul class="nav navbar-nav ml-auto mr-0">
                                @auth
                                <li class="nav-item dropdown" data-title="{{ Auth::user()->name }}" data-toggle="tooltip" data-placement="bottom" data-boundary="window">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" data-caret="false">
                                        <i class="material-icons">account_circle</i>
                                    </a>
                                    <div class="dropdown-menu">
                                        <a href="/logout" class="dropdown-item">Logout</a>
                                    </div>
                                </li>
                                @else
                                <li class="nav-item">
                                    <a href="/login"
                                       class="btn btn-outline-secondary">Login</a>
                                </li>

                                <li class="nav-item">
                                    <a href="/registrasi"
                                       class="btn btn-outline-secondary">Registrasi</a>
                                </li>
                                @endauth



                            </ul>

                        </div>
                    </div>

                </div>
            </div>
