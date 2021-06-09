<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset("dist/img/developer.jpeg") }}" style="width: 100px; height: 50px;" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Web Developer</p>
            </div>
        </div>

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">
                <a href="https://github.com/FarhodBegmatov/account">
                    <i class="fa fa-github"></i> <span>Github.com</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.finance.index') }}">
                    <i class="fa fa-dashboard"></i> <span>Домашняя бухгалтерия</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.categories.index') }}">
                    <i class="fa fa-files-o"></i>
                    <span>Категории</span>
                </a>
            </li>

            <li>
                <a href="{{ route('admin.income') }}">
                    <i class="fa fa-table"></i> <span>Доход</span>
                </a>
            </li>

            <li>
                <a href="{{ route('admin.consumption') }}">
                    <i class="fa fa-table"></i> <span>Расход</span>
                </a>
            </li>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
