<!DOCTYPE html>
<html>
<head>
    <base href=""></base>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- <link rel="shortcut icon" href="public/images/templates/favicon.png" /> -->
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="{{ url('public/admin/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ url('public/admin/css/font-awesome.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ url('public/admin/css/ionicons.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ url('public/admin/css/AdminLTE.css') }}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
    folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ url('public/admin/css/_all-skins.min.css') }}">
    <!--   <link rel="stylesheet" href="public/css/style.css"> -->
    <script src="{{ url('public/admin/js/loader.js') }}"></script>
    <script src="{{ url('public/admin/ckeditor/ckeditor.js') }}"></script>
    <style>
        .content-header h1, th, label{
        color: #333;
    }
    label{font-weight: 600 !important;}
    .maudo{color: red}
    </style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
    <!-- Vung Header -->
    <header class="main-header">
        <a href="admin" class="logo">
            <span class="logo-mini"><b>P</b>S</span>
            <span class="logo-lg">Quản trị hệ thống</span>
        </a>
        <nav class="navbar navbar-static-top" style="height: 52px">
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav" style="height: 52px;  padding: 1px">
                    <li style="height: 52px">
                        <a href="">
                            <span class="glyphicon glyphicon-home"></span>
                            <span>Website</span>
                        </a>
                    </li>

                    <li class="dropdown user user-menu" style="height: 52px; padding: 0px">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="{!! url('resources/upload/useradmin/')!!}/{!! Session::get('hoa_avatar') !!}" class="user-image" alt="User Image">
                            <span class="hidden-xs"><br></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="user-header">
                                <img src="{!! url('resources/upload/useradmin/')!!}/{!! Session::get('hoa_avatar') !!}" class="img-circle" alt="User Image">
                                <p><small> <?php echo Session::get('hoalogin') ?></small></p>
                            </li>
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="{!! route('admin.user.getEdit', Session::get('hoa_login')) !!}" class="btn btn-default btn-flat">Chi tiết</a>
                                </div>
                                <div class="pull-right">
                                    <a href="{!! route('admin.dangxuat') !!}" class="btn btn-default btn-flat">Thoát</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- ./Vung Header -->
    <aside class="main-sidebar">

        <section class="sidebar">
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{!! url('resources/upload/useradmin/')!!}/{!! Session::get('hoa_avatar') !!}" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p><?php echo Session::get('hoalogin') ?></p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Trực tuyến</a>
                </div>
            </div>
            <ul class="sidebar-menu">
                <li class="header">CHỨC NĂNG</li>
                <li class="treeview">
                    <a href="admin">
                        <i class="fa fa-bar-chart"></i> <span>Thống kê</span>
                    </a>
                </li>

                <li class="treeview">
                    <a href="admin/contact">
                        <i class="fa fa-envelope"></i> <span>Liên hệ</span>
                    </a>
                </li>
                <li class="header">QUẢN LÝ DANH MỤC</li>
                <li class="treeview">
                    <a href="{{route('admin.cate.index')}}">
                        <i class="fa fa-indent"></i><span>Loại sản phẩm</span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="admin/producer">
                        <i class="fa fa-gift"></i><span>Nhà cung cấp</span>
                    </a>
                </li>
                <li class="header">QUẢN LÝ CỬA HÀNG</li>
                <li>
                    <a href="{{route('admin.product.index')}}">
                        <i class="fa fa-leaf"></i> Sản phẩm
                    </a>
                </li>
                <li >
                    <a href="admin/content">
                        <i class="glyphicon glyphicon-list"></i> Tin tức
                    </a>
                </li>
                <li>
                    <a href="admin/orders">
                        <i class="fa fa-shopping-cart"></i> Đơn hàng
                    </a>
                </li>
                <li class="treeview">
                    <a href="admin/customer">
                        <i class="fa fa-user"></i><span>Khách hàng</span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="admin/province">
                        <i class="fa fa-globe"></i><span>Địa điểm</span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-align-justify"></i><span>Giao diện</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="active">
                            <a href="{!! route('admin.slider.index') !!}">
                                <i class="fa fa-cogs"></i> Sliders
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="header">CÀI ĐẶT</li>
                <li class="treeview">
                    <a href="#">
                        <i class="glyphicon glyphicon-cog"></i><span>Hệ thống</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="active">
                            <a href="admin/configuration/update">
                                <i class="fa fa-cogs"></i> Cấu hình
                            </a>
                        </li>

                        <li>
                            <a href='admin/group'>
                                <i class='fa fa-lock'></i> Nhóm người dùng
                            </a>
                        </li>
                        

                        <li>
                            <a href="{!! route('admin.user.index') !!}">
                                <i class="fa fa-users"></i> Thành viên
                            </a>
                        </li>
                    </ul>
                </li>
                <li><a href="admin/user/logout.html"><i class="fa fa-sign-out text-red"></i> <span>Thoát</span></a></li>
                <li><a href="#"><i class="fa fa-question-circle text-yellow"></i> <span>Trợ giúp</span></a></li>
            </ul>

        </section>
        <!-- /.sidebar -->
    </aside>
    <!-- Content Wrapper. Contains page content -->
    @yield('content')
    <footer class="main-footer">
     <div class="pull-right hidden-xs"><b>Version</b> 1.0.0</div>
     <p class="text-center">Copyright &copy; 2017 <a href="http://facebook.com/hoa.nguyenvan.4">Hòa Nguyễn</a>.</strong> All rights reserved.
     </footer>

    </div><!-- ./wrapper -->
 <!-- jQuery 2.2.3 -->
    <script src="{{ url('public/admin/js/jquery-2.2.3.min.js') }}"></script>
 <!-- jQuery UI 1.11.4 -->
    <script src="{{ url('public/admin/js/jquery-ui.min.js') }}"></script>
 <!-- Bootstrap 3.3.6 -->
    <script src="{{ url('public/admin/js/bootstrap.js') }}"></script>
 <!-- AdminLTE App -->
    <script src="{{ url('public/admin/js/app.min.js') }}"></script>
    <script>
    $("div.alert").delay(3000).slideUp();
    
    function xacnhanxoa (msg) {
        if(window.confirm(msg)) {
            return true;
        }
        return false;
    }
</script>
</body>
</html>

