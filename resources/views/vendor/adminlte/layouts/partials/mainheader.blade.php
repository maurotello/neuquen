
<!-- Main Header -->
<header class="main-header">

    <!-- Logo -->
    <!--
    <a href="{{ url('/home') }}" class="logo">
        <span class="logo-mini"><b>Sistema</b></span>
        <span class="logo-lg"><b>Sistema</b></span>
    </a>
-->

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->

        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">{{ trans('adminlte_lang::message.togglenav') }}</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- Messages: style can be found in dropdown.less-->
                <!--
                <li class="dropdown messages-menu">
                   
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-envelope-o"></i>
                        <span class="label label-success">4</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">{{ trans('adminlte_lang::message.tabmessages') }}</li>
                        <li>
                            <ul class="menu">
                                <li>
                                    <a href="#">
                                        <div class="pull-left">
                                        
                                            @if(Auth::user()->profile)
                                              <img src="{{ asset(Auth::user()->profile->avatar) }}" width="50" class="img-circle" alt="Imagen de Perfil"/>
                                            @else
                                              <img src="{{ Gravatar::get($user->email) }}" class="img-circle" alt="Imagen de Perfil"/>
                                            @endif
                                        </div>
                                     
                                        <h4>
                                            {{ trans('adminlte_lang::message.supteam') }}
                                            <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                        </h4>
                                      
                                        <p>{{ trans('adminlte_lang::message.awesometheme') }}</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="footer"><a href="#">c</a></li>
                    </ul>
           

                </li>
                     -->

                            <!-- Notifications Menu --
                            <li class="dropdown notifications-menu">
                            
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-bell-o"></i>
                                    <span class="label label-warning">10</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="header">{{ trans('adminlte_lang::message.notifications') }}</li>
                                    <li>
                                      
                                        <ul class="menu">
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-users text-aqua"></i> {{ trans('adminlte_lang::message.newmembers') }}
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="footer"><a href="#">{{ trans('adminlte_lang::message.viewall') }}</a></li>
                                </ul>
                            </li>

                            -->
                            

                            <!-- Tasks Menu --
                            <li class="dropdown tasks-menu">
                                
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-flag-o"></i>
                                    <span class="label label-danger"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="header">{{ trans('adminlte_lang::message.tasks') }}</li>
                                    <li>
                                        <ul class="menu">
                                            <li>
                                                <a href="#">
                                                    <h3>
                                                        {{ trans('adminlte_lang::message.tasks') }}
                                                        <small class="pull-right"></small>
                                                    </h3>
                                                   
                                                    <div class="progress xs">
                                                        
                                                        <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                            <span class="sr-only"> {{ trans('adminlte_lang::message.complete') }}</span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="footer">
                                        <a href="#">{{ trans('adminlte_lang::message.alltasks') }}</a>
                                    </li>
                                </ul>
                            </li>

                        -->


                @if (Auth::guest())
                    <li><a href="{{ url('/register') }}">{{ trans('adminlte_lang::message.register') }}</a></li>
                    <li><a href="{{ url('/login') }}">{{ trans('adminlte_lang::message.login') }}</a></li>
                @else
                    <!-- User Account Menu -->
                    <li class="dropdown user user-menu">
                        <!-- Menu Toggle Button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <!-- The user image in the navbar-->

                            @if(Auth::user()->profile)
                                @if(Auth::user()->profile->avatar)
                                    <img src="{{ asset(Auth::user()->profile->avatar) }}" width="50" class="user-image" alt="Imagen de Perfil"/>
                                @else
                                    <img src="{{ asset('img/avatar.png') }}" class="user-image" alt="Imagen de Perfil"/>
                                @endif
                              <!--<img src="{{ Gravatar::get($user->email) }}" class="user-image" alt="Imagen de Perfil"/>-->
                            @endif

                            <!-- hidden-xs hides the username on small devices so only the image appears. -->
                            <span class="hidden-xs">{{ Auth::user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- The user image in the menu -->
                            <li class="user-header">
                            @if(Auth::user()->profile)
                                @if(Auth::user()->profile->avatar)
                                    <img src="{{ asset(Auth::user()->profile->avatar) }}" width="50" class="user-image" alt="Imagen de Perfil"/>
                                @else
                                    <img src="{{ asset('img/avatar.png') }}" class="user-image" alt="Imagen de Perfil"/>
                                @endif
                              <!--<img src="{{ Gravatar::get($user->email) }}" class="user-image" alt="Imagen de Perfil"/>-->
                            @endif
                                <p>
                                    {{ Auth::user()->name }}
                                    <small>{{ Auth::user()->email }}</small>
                                </p>

                            </li>
                            <!-- Menu Body -->

                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    @if (Auth::user()->profile)
                                        <a href="{{ route('profile.edit', Auth::user()->profile)  }}" class="btn btn-default btn-flat">Perfil</a>
                                    @endif
                                </div>
                                <div class="pull-right">
                                    <a href="{{ url('/logout') }}" class="btn btn-default btn-flat"
                                       onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        Salir
                                    </a>

                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                        <input type="submit" value="logout" style="display: none;">
                                    </form>

                                </div>
                            </li>
                        </ul>
                    </li>
                @endif

                <!-- Control Sidebar Toggle Button
                <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li>
            -->
            </ul>
        </div>
    </nav>
</header>
