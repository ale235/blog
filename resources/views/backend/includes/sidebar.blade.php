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
                        <a href="{{ url('/admin/post/create') }}">New Post</a>
                    </li>
                    <li>
                        <a href="{{ url('/admin/post') }}">All Posts</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="{{ url('admin/comments') }}"><i class="fa fa-comments"></i> All Comments</a>
            </li>
            <li>
                <a href="{{ url('admin/tags') }}"><i class="fa fa-list"></i> Tags List</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Surveys<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ url('/admin/survey/add') }}">New Survey</a>
                    </li>
                    <li>
                        <a href="{{ url('/admin/survey') }}">All Surveys</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="{{ url('/admin/messages') }}"><i class="fa fa-weixin"></i> All Messages</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-wrench fa-fw"></i> Settings<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ url('/admin/users/add') }}">New User</a>
                    </li>
                    <li>
                        <a href="{{ url('/admin/users') }}">All Users</a>
                    </li>
                    <li>
                        <a href="{{ url('/admin/parameters') }}">Parameters</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->

