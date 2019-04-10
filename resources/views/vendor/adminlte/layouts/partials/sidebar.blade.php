@push('styles')
.user-image {
    float: left;
    width: 25px;
    height: 25px;
    border-radius: 50%;
    margin-right: 10px;
    margin-top: -2px;
}
@endpush
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel" style="height: 65px">
                <div class="pull-left image">
                  @if(Auth::user()->profile)
                        @if(Auth::user()->profile->avatar)
                            <img src="{{ asset(Auth::user()->profile->avatar) }}" width="50" class="user-image" alt="Imagen de Perfil"/>
                        @else
                            <img src="{{ asset('img/avatar.png') }}" class="user-image" alt="Imagen de Perfil"/>
                        @endif
                      <!--<img src="{{ Gravatar::get($user->email) }}" class="user-image" alt="Imagen de Perfil"/>-->
                    @endif
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('adminlte_lang::message.online') }}</a>
                </div>
            </div>
        @endif


        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">{{ trans('adminlte_lang::message.header') }}</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="active"><a href="{{ url('home') }}"><i class='fa fa-link'></i> <span>{{ trans('adminlte_lang::message.home') }}</span></a></li>
            <li class="active"><a href="{{ url('proyecto/listado') }}"><i class='fa fa-link'></i> <span>PROYECTOS</span></a></li>

            <li class="treeview">
                <a href="#"><i class='fa fa-link'></i> <span>Tablas Anexas</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">

                    <li><a href="{{url('banco')}}">Bancos</a></li>
                    <li><a href="{{ route('sucursal.index') }}">Sucursales</a></li>
                    <li><a href="{{url('estado')}}">Estados</a></li>
                    <li><a href="{{url('estadoInterno')}}">Estados Internos</a></li>
                    <li><a href="{{url('estadoCivil')}}">Estados Civiles</a></li>
                    <li><a href="{{url('destinoCredito')}}">Destino Créditos</a></li>
                    <li><a href="{{url('figuraLegal')}}">Figuras Legales</a></li>
                    <li><a href="{{url('garantia')}}">Garantías</a></li>
                    <li><a href="{{url('periodicidad')}}">Periodicidades</a></li>
                    <li><a href="{{url('provincia')}}">Provincias</a></li>
                    <li><a href="{{url('sector')}}">Sectores</a></li>
                    <li><a href="{{url('zona')}}">Zonas</a></li>
                    <li><a href="{{ route('lineacredito.index') }}">Líneas de Crédito</a></li>
                    <li><a href="{{ route('alerta.index') }}">Alertas</a></li>
                    <li><a href="{{ route('localidad.index') }}">Localidades</a></li>
                    <li><a href="{{ route('columnasview.index') }}">Columnas Proyectos</a></li>

                </ul>
            </li>


            <li class="treeview">
                <a href="#"><i class='fa fa-link'></i> <span>Usuarios y Roles</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                  <li><a href="{{ route('users.index') }}">Usuarios</a></li>
                  <li><a href="{{ route('roles.index') }}">Roles</a></li>
                  <li><a href="{{ route('permisos.index') }}">Permisos</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#"><i class='fa fa-link'></i> <span>Informes</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                  <li><a target="_blank" href="{{ route('informeLocalidades') }}">Proyectos por Localidad</a></li>
                  <li><a target="_blank" href="{{ route('informeEstados') }}">Proyectos por Estado</a></li>
                  <li><a target="_blank" href="{{ route('informeSectores') }}">Proyectos por Sector</a></li>
                 
                </ul>
            </li>
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
