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
                            <button class="navbar-toggler w-auto mr-16pt d-block rounded-0"
                                    type="button"
                                    data-toggle="sidebar">
                                <span class="material-icons">short_text</span>
                            </button>
                            
                            <ul class="nav navbar-nav d-none d-sm-flex flex justify-content-start ml-8pt">
                                <li class="nav-item active">
                                    <a href="index.html"
                                       class="nav-link">Home</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a href="#"
                                       class="nav-link dropdown-toggle"
                                       data-toggle="dropdown"
                                       data-caret="false">Courses</a>
                                    <div class="dropdown-menu">
                                        <a href="courses.html"
                                           class="dropdown-item">Browse Courses</a>
                                    </div>
                                </li>
                            </ul>

                            <form class="search-form form-control-rounded navbar-search d-none d-lg-flex mr-16pt"
                                  action="index.html"
                                  style="max-width: 230px">
                                <button class="btn"
                                        type="submit"><i class="material-icons">search</i></button>
                                <input type="text"
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