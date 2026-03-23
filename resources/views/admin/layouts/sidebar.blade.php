@if(Auth::user())
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="@if(!empty(Auth::user()->image)) {{ asset('storage/' . Auth::user()->image) }} @else {{ asset('storage/uploads/default.png') }} @endif" class="img-circle" alt="Avatar">
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->lastname }} {{ Auth::user()->firstname }}</p>
                    <a href="#"><i class="fa fa-circle text-success"></i> {{__('Online')}}</a>
                </div>
            </div>
            <!-- search form -->
            <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="{{__('Search Post')}}...">
                    <span class="input-group-btn">
                        <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                </div>
            </form>
            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header" style="text-transform: uppercase;">{{__('Dashboard')}}</li>
                <li>
                    <a href="{{ route('index') }}" target="_blank">
                        <i class="fa fa-home"></i> <span>{{__('Go to homepage')}}</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.dashboard') }}">
                        <i class="fa fa-th"></i> <span>{{__('Dasboard')}}</span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-newspaper-o"></i> <span>{{__('Blog')}}</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('admin.categories.index') }}"><i class="fa fa-circle-o"></i> {{__('Category')}}</a></li>
                        <li><a href="{{ route('admin.posts.index') }}"><i class="fa fa-circle-o"></i> {{__('Blog List')}}</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-paint-brush"></i> <span>{{__('Interface')}}</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span> 
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('admin.banners.index') }}"><i class="fa fa-circle-o"></i> {{__('Banner')}}</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-cogs"></i> <span>{{__('Settings')}}</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('admin.settings.index') }}"><i class="fa fa-circle-o"></i> {{__('Settings')}}</a></li>
                        <li class="treeview">
                            <a href="#"><i class="fa fa-circle-o"></i> {{__('Account')}}
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="{{ route('admin.users.index') }}"><i class="fa fa-circle-o"></i> {{__('Account List')}}</a></li>
                                <li><a href="{{ route('admin.users.reset-password', [Auth::user()->id]) }}"><i class="fa fa-circle-o"></i> {{__('Reset Password')}}</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>
@endif