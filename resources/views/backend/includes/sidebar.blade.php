<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li class="sidebar-search">
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                </div>
                <!-- /input-group -->
            </li>
            <li>
                <a href="{{ url('/admin') }}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-file-text-o"></i> Posts<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ url('/admin/post/create') }}">Nuevo Post</a>
                    </li>
                    <li>
                        <a href="{{ url('/admin/post') }}">Todos los Posts</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="{{ url('admin/comments') }}"><i class="fa fa-comments"></i> Todos los Comentarios</a>
            </li>
            <li>
                <a href="{{ url('admin/tags') }}"><i class="fa fa-list"></i>List de Tags (todavía en construcción)</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Encuestas (Todavía en construcción)<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ url('/admin/survey/add') }}">Nueva Encuesta</a>
                    </li>
                    <li>
                        <a href="{{ url('/admin/survey') }}">Todas las Encuestas</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="{{ url('/admin/messages') }}"><i class="fa fa-weixin"></i> Todos los Mensajes (En construcción)</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-wrench fa-fw"></i> Configuración<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ url('/admin/users/add') }}">Nuevo Usuario</a>
                    </li>
                    <li>
                        <a href="{{ url('/admin/users') }}">Todos los Usuarios</a>
                    </li>
                    <li>
                        <a href="{{ url('/admin/parameters') }}">Parámetros</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->

